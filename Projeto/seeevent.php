<?php

session_start();
$eventid = $_POST['eventid'];
$db = new PDO('sqlite:sql.db');

$stmt = $db->prepare("SELECT * FROM comment WHERE event = '$eventid'");
$stmt->execute();
$result = $stmt->fetchAll();

if(sizeof($_SESSION['user']) > 0) {

  $query = $db->query("SELECT * FROM Event WHERE id = $eventid");
  $row = $query->fetch(PDO::FETCH_ASSOC);

  echo '<div id="eventinformation" class="eventinformation">';
    echo '<div class = "eventname">' . $row[name] . '</div>';
    echo '<div class = "eventdate">' . $row[startDate] . '</div>';
    echo '<div class = "eventtime">' . $row[startTime] . '</div>';
    echo '<div class = "eventdescription">' . $row[description] . '</div>';
    echo '<br></ br>';
    echo '<img class = "evetphoto" src="uploads/' .$row[photo].'">';
    echo '<div class = "eventname"> Creator: '.$row[creator];
    echo '<br></ br>';
    echo '<br></ br>';
    echo '<form action="checkcomment.php" method="post" enctype="multipart/form-data">';
    echo '<p><textarea rows="4" cols="50" name="comment" placeholder="Comment"></textarea></p>';
    echo '<p><input type="submit" name="submit" value="Submit"></p>';
    echo '<p><input type="hidden" name="eventid" value="'.$eventid.'"></p>';
    echo '</form>';
  echo '</div>';

  foreach( $result as $row) {
    $creator = $row['user'];
    $sql = "SELECT * FROM User WHERE id = '$creator'";
    $result=$db->query($sql);
    $result=$result->fetch(PDO::FETCH_ASSOC);
    $creator = $result['name'];

    echo $creator;
    echo ': &nbsp';
    echo $row['comment'];
    echo '<br></br>';
   }

}
else {
  echo "You need to be logged in to access this page";
  echo '<meta http-equiv="refresh" content="1; URL=html.php">';
}
?>
