<!DOCTYPE HTML>
<html>

<head>
  <title>Журнал выполнения задач</title>
  <meta charset="utf-8">
</head>

<body>
<h3 style="
    position: absolute;
    left: 85%;
    bottom: 2%;
">Разработал<br>Порофиев Егор Алексеевич</h3>

<h1 style="
    position: absolute;
    left: 37%;
    top: 3%;
">Выполненые задачи</h1>
<h3 style="
    position: absolute;
    left: 2%;
    bottom: 2%;
	font-size: 3 pt;
"><a href="index.php">Вернуться на главную страницу</a>
</h3>

</h4>
<?php

$Link=mysqli_connect('localhost','u0959228_4c8d65f','Tujh20052002','u0959228_4c8d65f');
if(!$Link)die('Нет подключения к БД!');
@mysqli_query($Link,'SET NAMES utf8');

$q=mysqli_query($Link,"select * from PEA_task where ready =1");
while ($qq[]=mysqli_fetch_array($q,MYSQLI_ASSOC)){}

echo "<table border=1 style=\"position: absolute;left: 40%;top: 20%;\">";
echo "<tr>";
echo "<td><b>№</b></td>";
echo "<td><b>Задача</b></td>";	
echo "</tr>";

foreach($qq as $r)
	if($r["task"]!="")
		{
	echo "<tr>	
				<td style=\"border-style:solid;border-width:1;\">".$r["id"]."</td>
				<td style=\"border-style:solid;border-width:1;\">".$r["task"]."</td>
				  </tr>";
		}
echo "</table>";		
?>

</body>

</html>