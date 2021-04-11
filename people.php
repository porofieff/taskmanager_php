<!DOCTYPE HTML>
<html>

<head>
  <title>Список людей</title>
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
">Люди</h1>
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
@mysqli_query($Link,'SET NAMES utf8');

if((isset($_GET["new_name"]))&&($_GET["new_name"]=="Удалить"))
	{
		$qn=mysqli_query($Link,"delete from PEA_ind
								
								where id=".$_GET["id"]."
								");
	}		
if((isset($_GET["new_name"]))&&($_GET["new_name"]=="Изменить"))
	{
		
		$qn=mysqli_query($Link,"update PEA_ind
								 set fam='".$_GET["fam"]."'
								where id=".$_GET["id"]);
								
	}	
if((isset($_GET["new_name"]))&&($_GET["new_name"]=="Изменить"))
	{
		
		$qn=mysqli_query($Link,"update PEA_ind
								 set name='".$_GET["name"]."'
								where id=".$_GET["id"]);
	}

$q=mysqli_query($Link,"select * from PEA_ind".$str);

while ($qq[]=mysqli_fetch_array($q,MYSQLI_ASSOC)){}
echo "<table border=1 style=\"position: absolute;left: 41%;top: 20%;\">";
echo "<td><b>№</b></td>";
		echo "<td><b>имя</b></td>";
			echo "<td><b>Фамилия</b></td>";
					echo "</tr>";
			
		
foreach($qq as $r)
	if($r["name"]!="")
		{
		echo "<tr>
				<td style=\"border-style:solid;border-width:1;\">".$r["id"]."</td>
				<td style=\"border-style:solid;border-width:1;\">".$r["fam"]."</td>
				<td style=\"border-style:solid;border-width:1;\">".$r["name"]."</td>
				<td><td><button title=Изменить
			 onclick=\"
						document.getElementById('id').value='".$r["id"]."';
							document.getElementById('fam').value='".$r["fam"]."';
							document.getElementById('name').value='".$r["name"]."';
						document.getElementById('new_name').value='Изменить';
						\"
			  >И</button><button title=Удалить
					onclick=\"
						document.getElementById('id').value='".$r["id"]."';
							document.getElementById('fam').value='".$r["fam"]."';
							document.getElementById('name').value='".$r["name"]."';
						document.getElementById('new_name').value='Удалить';
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
">Редактирование пользователей </h3>
<form action="people.php" method=get style="
    position: absolute;
    left: 3%;
    top: 21%;
">
<p><input name=id id=id></p>
<p><input name=fam id=fam></p>
<p><input name=name id=name></p>
<p><input type=submit name=new_name id=new_name value=Изменить></p>
</form>	

</body>

</html>