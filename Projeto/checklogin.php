<?php

$db = new PDO('sqlite:sql.db');

// username and password sent from form
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

// To protect MySQL injection (more detail about MySQL injection)

$sql="SELECT * FROM User WHERE name='$myusername' and password='$mypassword'";
$result=$db->query($sql);

// Mysql_num_row is counting table row
// If result matched $myusername and $mypassword, table row must be 1 row
if($result->fetch(PDO::FETCH_NUM > 0)){

// Register $myusername, $mypassword and redirect to file "login_success.php"
header("location:login_success.php");
}
else {
session_start();
$_SESSION['loginerror'] = 1;
die(header("location:html.php"));

}
?>
