-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Дек 21 2020 г., 23:10
-- Версия сервера: 5.7.27-30
-- Версия PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `u0959228_4c8d65f`
--

-- --------------------------------------------------------

--
-- Структура таблицы `PEA_ind`
--

CREATE TABLE `PEA_ind` (
  `id` int(11) NOT NULL,
  `fam` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `log` varchar(100) NOT NULL,
  `pas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `PEA_ind`
--

INSERT INTO `PEA_ind` (`id`, `fam`, `name`, `log`, `pas`) VALUES

-- --------------------------------------------------------

--
-- Структура таблицы `PEA_log`
--

CREATE TABLE `PEA_log` (
  `id` int(11) NOT NULL,
  `id_ind` int(11) NOT NULL,
  `id_task` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `PEA_role`
--

CREATE TABLE `PEA_role` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `PEA_role`
--

INSERT INTO `PEA_role` (`id`, `role`) VALUES
(1, 'Администратор'),
(2, 'Исполнитель');

-- --------------------------------------------------------

--
-- Структура таблицы `PEA_role_ind`
--

CREATE TABLE `PEA_role_ind` (
  `id` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_ind` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `PEA_role_ind`
--

INSERT INTO `PEA_role_ind` (`id`, `id_role`, `id_ind`) VALUES

-- --------------------------------------------------------

--
-- Структура таблицы `PEA_task`
--

CREATE TABLE `PEA_task` (
  `id` int(249) NOT NULL,
  `task` varchar(1000) NOT NULL,
  `ready` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `PEA_task`
--

INSERT INTO `PEA_task` (`id`, `task`, `ready`) VALUES

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `PEA_ind`
--
ALTER TABLE `PEA_ind`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `PEA_log`
--
ALTER TABLE `PEA_log`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `PEA_role`
--
ALTER TABLE `PEA_role`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `PEA_role_ind`
--
ALTER TABLE `PEA_role_ind`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `PEA_task`
--
ALTER TABLE `PEA_task`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
