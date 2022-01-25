<!DOCTYPE HTML>
<html>

<head>
  <title>Роли пользователей</title>
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
">Роли пользователей </h1>
<h3 style="
    position: absolute;
    left: 2%;
    bottom: 2%;
	font-size: 3 pt;
"><a href="index.php">Вернуться на главную страницу</a>
</h3>

<?php

$Link=mysqli_connect();

if(!$Link)die('Нет подключения к БД!');

@mysqli_query($Link,'SET NAMES utf8');
if(isset($_GET["new_role_ind"]))
	{
		$qn=mysqli_query($Link,"select max(id)+1 as mxid from PEA_role_ind");
		while($qqn[]=mysqli_fetch_array($qn,MYSQLI_ASSOC)){}
		if($qqn[0]["mxid"]=="")$new_id=1;
		   else $new_id=$qqn[0]["mxid"];
		$qn=mysqli_query($Link,"insert into PEA_role_ind
								(id, id_ind, id_role)
								VALUES (".$new_id.",".$_GET["id_ind"].",".$_GET["id_role"].")
								");
	}
$q=mysqli_query($Link,"select PEA_role_ind.*, PEA_ind.fam, PEA_ind.name,PEA_role.role
						from PEA_role_ind left join PEA_ind on PEA_role_ind.id_ind=PEA_ind.id
						left join PEA_role on PEA_role_ind.id_role=PEA_role.id order by role

							");

while ($qq[]=mysqli_fetch_array($q,MYSQLI_ASSOC)){}

echo "<table border=1 style=\"position: absolute;left: 35%;top: 20%;\">";
echo "<tr>";
echo "<td><b>№</b></td>";
		echo "<td><b>Человек</b></td>";	
			echo "<td><b>Роль</b></td>";
				echo "</tr>";
$i=1;
foreach($qq as $r)
	if($r["id_ind"]!="")
		{

	echo "<tr>
					<td style=\"border-style:solid;border-width:1;\">".$i."</td>
					<td style=\"border-style:solid;border-width:1;\">".$r["fam"]." ".$r["name"]." </td>
					<td style=\"border-style:solid;border-width:1;\">".$r["role"]."</td>
				  </tr>";
	$i=$i+1;
		}
echo "</table>";		
?>
<br>
<form action="role_ind.php" method=get style="
    position: absolute;
    left: 3%;
    top: 20%;
">
<p>Добавить роль для человека</p>
<p>Человек<select name="id_ind">
    <option disabled>Выберите человека</option>
 
<?php
$q1=mysqli_query($Link,"select * from PEA_ind order by fam");
while ($qq1[]=mysqli_fetch_array($q1,MYSQLI_ASSOC)){}

foreach($qq1 as $r)
	if($r["id"]!="")
	{
		echo "<option value=".$r["id"].">".$r["fam"]." ".$r["name"]."</option>";
	}

?>
 </select></p>
 
 <p>Роль<select  name="id_role">
    <option disabled>Выберите роль</option>
  
<?php
	$q2=mysqli_query($Link,"select * from PEA_role order by id");

	while ($qq2[]=mysqli_fetch_array($q2,MYSQLI_ASSOC)){}
	foreach($qq2 as $r)
		if($r["id"]!="")
		{
			echo "<option value=".$r["id"].">".$r["role"]." </option>";
		}

?>
   </select></p></p>
 <p><input type=submit name=new_role_ind value=Зарегистрироваться></p>
 
</form>

</body>

</html>
