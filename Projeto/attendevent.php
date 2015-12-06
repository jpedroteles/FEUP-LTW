<?php
session_start();
$eventid = $_POST['eventid'];
$db = new PDO('sqlite:sql.db');
$userid = $_SESSION['user'];

if($db->query("INSERT INTO Attendees(user, event) VALUES('$userid', '$eventid')"))
{
  echo "You are now attending this event.";
}
else {
  echo "There was an error, you are possibly already attending this envent.";
}

?>
