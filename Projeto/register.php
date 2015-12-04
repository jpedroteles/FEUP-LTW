<?php
session_start();
if(!isset($_SESSION['fillBlanks'])){
	$_SESSION['fillBlanks'] = 0;
}
?>

<html>
	<head>
		<title>Registration</title>
		<meta charset="UTF-8">
	</head>

	<body>
		<div class="register">
			<h1>Registration</h1>
			<form method="post" action="checkregistration.php">
				<p><input type="text" name="username" placeholder="Username"></p>
				<p><input type="password" name="password1" placeholder="Password"></p>
				<p><input type="password" name="password2" placeholder="Confirm Password"></p>
				<p><input type="email" name="mail" placeholder="Email address"></p>
				<?
			    if($_SESSION['fillBlanks'] == 1){
					echo 'Fill all the blanks';
			    	$_SESSION['fillBlanks'] = 0;
			    }
			  ?>
				<p><input type="submit" value="Register"></p>
			</form>
		</div>
	</body>
</html>
