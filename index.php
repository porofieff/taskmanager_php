<!DOCTYPE HTML>
<html>

<head>
  <title>Главная страница</title>
  <meta charset="utf-8">
</head>

<body>
<?php
session_start();
if(isset($_GET["exit"]))
	{unset($_SESSION["id"]);
	 unset($_SESSION["fam"]);
	 unset($_SESSION["name"]);
	 unset($_SESSION["roles"]);
	 unset($_SESSION);}
$Link=mysqli_connect();
if(!$Link)die('Нет подключения к БД!');
@mysqli_query($Link,'SET NAMES utf8'); 
if(isset($_GET["new_user"]))
	{
		$qn=mysqli_query($Link,"select max(id)+1 as mxid from PEA_ind");
		while($qqn[]=mysqli_fetch_array($qn,MYSQLI_ASSOC)){}
		if($qqn[0]["mxid"]=="")$new_id=1;
		   else $new_id=$qqn[0]["mxid"];
		$qn=mysqli_query($Link,"insert into PEA_ind
								(id, fam, name, log, pas)
								VALUES (".$new_id.",'".$_GET["fam"]."','".$_GET["name"]."','".$_GET["log"]."','".$_GET["pas"]."')");
	}

$q=mysqli_query($Link,"select *  from PEA_ind
						where log like '".$_GET["log"]."'
							and pas like '".$_GET["pas"]."'
					");

while ($qq[]=mysqli_fetch_array($q,MYSQLI_ASSOC)){}
if($qq[0]["fam"]=='')
	echo "Ведите логин и пароль";
	else {
		  echo "Здравствуйте ".$qq[0]["name"]."!";
		 $_SESSION["fam"]=$qq[0]["fam"];
		 $_SESSION["name"]=$qq[0]["name"];
		 $_SESSION["id"]=$qq[0]["id"];
		
		 $q1=mysqli_query($Link,"select * from  PEA_role_ind 
								where id_ind=".$_SESSION["id"]);
		 while ($qq1[]=mysqli_fetch_array($q1,MYSQLI_ASSOC)){}
		 
		 foreach($qq1 as $r1)
			if($r1["id_role"]!="")
		    $_SESSION["roles"][$r1["id_role"]]=1;
		  }
	
?>
<h3 style="
    position: absolute;
    left: 85%;
    bottom: 2%;
">Разработал<br>Порофиев Егор Алексеевич</h3>

<?php
if(isset($_SESSION["roles"][1]))
	echo "
	<br>
	<br>
	<a href=\"role.php\">Список ролей</a>
	<br>
	<br>
	<a href=\"people.php\">Список людей</a>
	<br>
	<br>
	<a href=\"role_ind.php\">Роли пользователей</a>
	<br>
	<br>
	<a href=\"task.php\">Список задач</a>
	<br>
	<br>
	<a href=\"log.php\">Журнал выполнения задач</a>
	<br>
	<br>
	";
if(isset($_SESSION["roles"][2]))
	echo "
	<br>
	<br>
	<a href=\"task.php\">Список задач</a>
	<br>
	<br>
	<a href=\"log.php\">Журнал выполнения задач</a>
	<br>
	<br>
	";
if(!isset($_SESSION["id"]))
	echo "
	<form action=\"index.php\" method=get>
	<p>Логин<input name=log></p>
	<p>Пароль<input name=pas type=password></p>
	<p><input type=submit value=Войти></p>
    <a href=\"reg.php\">Регистрация</a>
	</form>
	";
	else echo "
	<form action=\"index.php\" method=get>
	<p><input type=submit name=exit value=Выйти></p>
	</form>
	";
//'localhost','itkv','ITkv2020','IT_db'
//'localhost','u0959228_4c8d65f','password','u0959228_4c8d65f'
?>

</body>

</html>
