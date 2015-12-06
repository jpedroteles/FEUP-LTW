<?php
session_start();
if(!isset($_SESSION['fillBlanks'])){
	$_SESSION['fillBlanks'] = 0;
}
?>

<html>
	<head>
		<title>Event Manager</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="registercss.css">
	</head>

	<body>
		<div class="container">
			<div class="register">
				<h1>Event Manager</h1>
	   			<h2>Registration</h2>
				<form method="post" action="checkregistration.php">
					<p><input type="text" name="username" placeholder="Username"></p>
					<p><input type="password" name="password1" placeholder="Password"></p>
					<p><input type="password" name="password2" placeholder="Confirm Password"></p>
					<p><input type="email" name="mail" placeholder="Email address"></p>
					<?
					    if($_SESSION['fillBlanks'] == 1){
							echo '<p class="error">Fill all the blanks</p>';
					    	$_SESSION['fillBlanks'] = 0;
								$_SESSION['fillBlanks'] = 0;
					    }
							else {
								if($_SESSION['invaliduser'] == 1){
								echo '<p class="error">Username already taken</p>';
						    	$_SESSION['fillBlanks'] = 0;
						    }
							}
				  	?>
					<p class="submit"><input type="submit" value="Register"></p>
				</form>
			</div>
			<div class="register-help">
		    	<p>Already have an account? <a href="html.php">Click here to login</a>!</p>
		  	</div>
		</div>

		<footer>
			<p>Projecto Final @ FEUP - 2015</p>
		</footer>
	</body>
</html>
