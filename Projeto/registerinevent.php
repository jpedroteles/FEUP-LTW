<?php

session_start();
$eventid = $_POST['eventid'];
$db = new PDO('sqlite:sql.db');

if(sizeof($_SESSION['user']) > 0) {

  $query = $db->query("SELECT * FROM Event WHERE id = $eventid");
  $row = $query->fetch(PDO::FETCH_ASSOC);

  echo '<div id="eventinformation">';
    echo '<div id = "eventname">' . $row[name] . '</div>';
    echo '<div id = "eventdescription">' . $row[description] . '</div>';
    echo '<div id = "attendevent"><input name="attendevent" type="submit" value="Attend Event" onclick="javascript:attendevent('.$row[id].');"></div>';
  echo '</div>';

}
else {
  echo "You need to be logged in to access this page";
}
?>