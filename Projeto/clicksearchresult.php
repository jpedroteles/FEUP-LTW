<?
session_start();
$_SESSION['searchevent']=$_POST['eventid'];
echo '<meta http-equiv="refresh" content="0; url=main.php" />';
?>
