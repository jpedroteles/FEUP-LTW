<?php
session_start();
$db = new PDO('sqlite:sql.db');

// username and password sent from form
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

// To protect MySQL injection (more detail about MySQL injection)

$sql="SELECT * FROM User WHERE name='$myusername'";
$result=$db->query($sql);

// Mysql_num_row is counting table row
// If result matched $myusername and $mypassword, table row must be 1 row
if($result = $result->fetch(PDO::FETCH_ASSOC)){
  $user_pass = $result['password'];
  $teste = crypt($mypassword, $user_pass );
  if ($user_pass == $teste) {
    $sql="SELECT id FROM User WHERE name='$myusername'";
    $result=$db->query($sql);
    $_SESSION['user'] = $result->fetch(PDO::FETCH_NUM)[0];
    header("location:login_success.php");
}
else {
  $_SESSION['loginerror'] = 1;
  die(header("location:html.php"));
}
}
else {
$_SESSION['loginerror'] = 1;
die(header("location:html.php"));

}

?>
