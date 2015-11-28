<?php

$db = new PDO('sqlite:sql.db');

//informa��es de registo
$myusername = $_POST['username'];
$mypassword1 = $_POST['password1'];
$mypassword2 = $_POST['password2'];
$mymail = $_POST['mail'];

if("" == trim($_POST['username']) || "" == trim($_POST['password1']) || "" == trim($_POST['password2']) || "" == trim($_POST['mail']))
{
	echo 'Fill all the blanks.';
	session_start();
	$_SESSION['fillBlanks'] = 1;
	die(header("location:register.php"));
}

if($mypassword1 == $mypassword2)
{
	$sql2 = "SELECT Count(*) as total FROM User";
	$result = $db->query($sql2);
	$data = $result->fetch(PDO::FETCH_ASSOC);
	$id = $data['total'] + 1;
	
	$sql = "INSERT INTO User (id,name,mail,mailValidation,password)
	VALUES('$id','$myusername','$mymail','FALSE','$mypassword1')";

	if($db->query($sql) == TRUE)
		echo 'New account created successfully';
	else
		echo 'Error creating account';
}
else
{
	echo 'Passwords don\t match';
}

?>
