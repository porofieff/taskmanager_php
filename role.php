<!DOCTYPE HTML>
<html>

<head>
  <title>Список ролей</title>
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
    left: 45%;
    top: 3%;
">Роли</h1>
<h3 style="
    position: absolute;
    left: 2%;
    bottom: 2%;
	font-size: 3 pt;
"><a href="index.php">Вернуться на главную страницу</a>
</h3>

<?php
//print_r($_GET);
$Link=mysqli_connect('localhost','u0959228_4c8d65f','Tujh20052002','u0959228_4c8d65f');
if(!$Link)die('Нет подключения к БД!');

@mysqli_query($Link,'SET NAMES utf8 ');
if((isset($_GET["new_role"]))&&($_GET["new_role"]=="Добавить"))
	{
		$qn=mysqli_query($Link,"select max(id)+1 as mxid from PEA_role");
		while($qqn[]=mysqli_fetch_array($qn,MYSQLI_ASSOC)){}
		if($qqn[0]["mxid"]=="")$new_id=1;
		   else $new_id=$qqn[0]["mxid"];
		$qn=mysqli_query($Link,"insert into PEA_role
								(id, role)
								VALUES (".$new_id.",'".$_GET["role"]."')
								");
	}
if((isset($_GET["new_role"]))&&($_GET["new_role"]=="Изменить"))
	{
		$qn=mysqli_query($Link,"update PEA_role
								set role='".$_GET["role"]."'
								where id=".$_GET["id"]);

	}
if((isset($_GET["new_role"]))&&($_GET["new_role"]=="Удалить"))
	{
		$qn=mysqli_query($Link,"delete from PEA_role
								where id=".$_GET["id"]);

	}
$q=mysqli_query($Link,"select * from PEA_role ");
while($qq[]=mysqli_fetch_array($q,MYSQLI_ASSOC)){}
echo "<table border=1 style=\"position: absolute;left: 43%;top: 20%;\">";
foreach($qq as $r)
	if($r["role"]!="")
	{	
		echo "<tr>
				
			<td style=\"border-style:solid;border-width:1;\">".$r["id"]."</td>
			<td style=\"border-style:solid;border-width:1;\">".$r["role"]."</td>
			<td><button title=Изменить
			 onclick=\"
						document.getElementById('id').value='".$r["id"]."';
						document.getElementById('role').value='".$r["role"]."';
						document.getElementById('new_role').value='Изменить';
						\"
			  >И</button><button title=Удалить
			  onclick=\"
						document.getElementById('id').value='".$r["id"]."';
						document.getElementById('role').value='".$r["role"]."';
						document.getElementById('new_role').value='Удалить';
						\"
			  >У</button></td>
			  </tr>";
	}
echo "</table>";
?>

<h3 style="
    position: absolute;
    left: 3%;
    top: 18%;
">Добавление новых ролей</h3>
<form action="role.php" method=get style="
    position: absolute;
    left: 3%;
    top: 21%;
">
<p><input name=id id=id></p>
<p><input name=role id=role></p>
<p><input type=submit name=new_role id=new_role value=Добавить></p>

</form>

</body>

</html>