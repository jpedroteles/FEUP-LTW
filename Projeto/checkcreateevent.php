<?php
/*
Neste ficheiro ainda falta:
					- compor o upload das imagens(penso que nao esta a funcionar bem)
					- verificar se já existe um evento com o mesmo nome
					- obter o creador do evento
*/

$db = new PDO('sqlite:sql.db');

//informa��es de registo
$name = $_POST['name'];
$date = $_POST['startdate'];
$time = $_POST['starttime'];
$local = $_POST['local'];
$description = $_POST['description'];
$private = $_POST['private'];
$pic = $_POST['pic'];

if("" == trim($_POST['name']) || "" == trim($_POST['startdate']) || "" == trim($_POST['local']) || "" == trim($_POST['description']) || "" == trim($_POST['private']) || "" == trim($_POST['pic']))
{
	echo 'Fill all the blanks.';
	session_start();
	$_SESSION['fillBlanks'] = 1;
	die(header("location:register.php"));
}

$sql2 = "SELECT Count(*) as total FROM Event";
$result = $db->query($sql2);
$data = $result->fetch(PDO::FETCH_ASSOC);
$id = $data['total'] + 1;
	
$sql = "INSERT INTO Event (id, name, startDate, startTime, local, decription, private, photo, type, creator)
VALUES('$id','$name','$date','$time','$local', '$description', '$private','$pic','1', '1')";

if($db->query($sql) == TRUE)
	echo 'New account created successfully';
else
	echo 'Error creating account';



?>
