<!DOCTYPE HTML>
<html>

<head>
  <title>Список задач </title>
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
">Задачи</h1>
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


if((isset($_GET["new_task"]))&&($_GET["new_task"]=="Добавить"))
	{
		$qn=mysqli_query($Link,"select max(id)+1 as mxid from PEA_task");
		while($qqn[]=mysqli_fetch_array($qn,MYSQLI_ASSOC)){}
		if($qqn[0]["mxid"]=="")$new_id=1;
		   else $new_id=$qqn[0]["mxid"];
		$qn=mysqli_query($Link,"insert into PEA_task
								(id, task)
								VALUES (".$new_id.",'".$_GET["task"]."')
								");
	}
if((isset($_GET["new_task"]))&&($_GET["new_task"]=="Изменить"))
	{
		$qn=mysqli_query($Link,"update PEA_task
								set task='".$_GET["task"]."'
								where id=".$_GET["id"]);

	}
if((isset($_GET["new_task"]))&&($_GET["new_task"]=="Выполнено"))
	{
	$qn2=mysqli_query($Link,"update  PEA_task
								set ready=1
								where id=".$_GET["id"]);		
								
	}
	
	
$q=mysqli_query($Link,"select * from PEA_task where ready =0");	
while ($qq[]=mysqli_fetch_array($q,MYSQLI_ASSOC)){}
echo "<table border=1 style=\"position: absolute;left: 41%;top: 30%;\">";
echo "<td><b>№</b></td>";
		echo "<td><b>Задача</b></td>";
			echo "</tr>";
foreach($qq as $r)
	if($r["task"]!="")
		{

		echo "<tr>
				<td style=\"border-style:solid;border-width:1;\">".$r["id"]."</td>
				<td style=\"border-style:solid;border-width:1;\">".$r["task"]."</td>
				<td><td><button title=Выполнено
			 onclick=\"
						document.getElementById('id').value='".$r["id"]."';
							document.getElementById('task').value='".$r["task"]."';
						document.getElementById('new_task').value='Выполнено';
					\"
					>Выполнено</button><button title=Изменить
			 onclick=\"
						document.getElementById('id').value='".$r["id"]."';
							document.getElementById('task').value='".$r["task"]."';
						document.getElementById('new_task').value='Изменить';
					\"
					>Изменить</button>
	</tr>";
		}
		echo "</table>";

?>
<br>
<h3 style="
    position: absolute;
    left: 3%;
    top: 40%;
"><button title=Добавить
	onclick=" document.getElementById('new_task').value='Добавить';"
	>Добавить новую задачу </button></h3>
<br>

<form action="task.php" method=get style="
    position: absolute;
    left: 3%;
    top: 29%;
">
<p><input name=id id=id></p>
<p><input name=task id=task></p>
<p><input type=submit name=new_task id=new_task value=Действие></p>

</form>

</body>

</html>