<?php
/*
Neste ficheiro falta:
		-verificar se o mail inserido já existe na base de dados (de forma a depois podermos recuperar a pass pelo mail)
		-alterar o email que se envia(por exemplo com a nome do user e a pass)
		-alterar a mensagem de 'Passwords don\t match' de forma a aparecer como o erro do login
*/

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

$sql = "SELECT * FROM User WHERE name='$myusername'";
$result = $db->query($sql);
if($result->fetch(PDO::FETCH_NUM > 0))
{
	session_start();
	$_SESSION['invaliduser'] = 1;
	die(header("location:register.php"));
}

if($mypassword1 == $mypassword2)
{
	$sql2 = "SELECT Count(*) as total FROM User";
	$result = $db->query($sql2);
	$data = $result->fetch(PDO::FETCH_ASSOC);
	$id = $data['total'] + 1;
	$hash = crypt("$mypassword1");

	$sql = "INSERT INTO User (id,name,mail,mailValidation,password)
	VALUES('$id','$myusername','$mymail','FALSE','$hash')";

	if($db->query($sql) == TRUE){
		echo 'New account created successfully';
		//envio de email
		$to = $mymail;
		$subject = "Novo registo";
		$message = "Parabens por se ter registado no Event Manager";
		$headers .= 'From: <naoresponder@eventmanager.com>' . "\r\n";
		mail($to,$subject,$message,$headers);
		//redirecionamento
		header( "refresh:2; url=html.php" );							//delay de redirecionamento e pagina para ser redirecionado
	}
	else
		echo 'Error creating account';
}
else
{
	session_start();
	$_SESSION['invalidpassword'] = 1;
	die(header("location:register.php"));
}

?>
