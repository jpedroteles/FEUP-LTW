<?
session_start();
$eventid = $_POST['eventid'];
$db = new PDO('sqlite:sql.db');

if(sizeof($_SESSION['user']) > 0) {

  $query = $db->query("SELECT * FROM Event WHERE id = $eventid");
  $row = $query->fetch(PDO::FETCH_ASSOC);

  echo '<div>';
    echo '<h2>Edit Event:</h2>';
    echo '<form action="checkeditevent.php" method="post" enctype="multipart/form-data">';
            echo '<p><input type="text" name="name" placeholder="Name" Value="'.$row['name'].'"></p>';
          echo '<p><input type="date" name="startdate" placeholder="Date" Value="'.$row['startDate'].'"></p>';
          echo '<p><input type="time" name="starttime" placeholder="Time" Value="'.$row['startTime'].'"></p>';
          echo '<p><input type="text" name="local" placeholder="Local" Value="'.$row['local'].'"></p>';
          echo '<p><textarea rows="4" cols="50" name="description" placeholder="Description">'.$row['description'].'</textarea></p>';
          echo '<input type="hidden" name="eventid" Value="'.$row['id'].'" />';
          echo  '<p><input type="radio" name="private" value="FALSE" checked> Public';
        echo '<input type="radio" name="private" value="TRUE"> Private</p>';
        echo '<p>Foto do evento: <input type="file" id="fileToUpload" name="fileToUpload" accept="image/*" placeholder="Foto do Evento"></p>';
        echo '<p><input type="submit" name="submit" value="Submit"></p>';
      echo '</form>';
  echo '</div>';

}
else {
  echo "You need to be logged in to access this page";
}
?>
