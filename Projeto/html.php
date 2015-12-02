<?php
session_start();
if(!isset($_SESSION['loginerror']))
{
	$_SESSION['loginerror'] = 0;

}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Event Manager</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>

	
	<div class="container">
  		<div class="login">
   			<h1>Login</h1>
    		<form method="post" action="checklogin.php">
      			  <p><input type="text" name="myusername" placeholder="Username"></p>
     			  <p><input type="password" name="mypassword" placeholder="Password"></p>
			  <? 
			    if($_SESSION['loginerror'] == 1){ 
				echo 'Wrong username or password';
			    	$_SESSION['loginerror'] = 0;
			    }	
			  ?>
                    <p class="remember_me">
       				<label>
         			<label>
         			<input type="checkbox" name="remember_me" id="remember_me">
          			Remember me on this computer
        			</label>
        			</label>
      			</p>
      		<p class="submit"><input type="submit" name="commit" value="Login"></p>
   		</form>
  	</div>
 
 	<div class="login-help">
    	<p>Forgot your password? <a href="#">Click here to reset it</a>.</p>
  	</div>
	</div>

	<div id="footer">
		<p>Projecto Final @ FEUP - 2015</p>
	</div>
</body>
</html>