<?php
$deets = $_POST['deets'];

$db = new PDO('sqlite:sql.db');

$events = '';
$query = $db->query('SELECT * FROM Event WHERE startDate = "'.$deets.'"');
$num_rows = $db->query('SELECT Count(*) as numRows FROM Event WHERE startDate = "'.$deets.'"');
$data = $num_rows->fetch(PDO::FETCH_ASSOC);

if($data[numRows] > 0) {
  $events .= '<div id="eventsControl"><button id="close" onMouseDown="overlay()">Close</button><br /><br /><b> ' . $deets . ' </b><br /><br /></div>';

  while($row=$query->fetch(PDO::FETCH_ASSOC)) {
    $desc = $row[description];
    $name = $row[name];
    $image = $row[photo];
    $events .= '<div id = "eventsBody"><a id="name">' . $name . '</a><br /><br /><a id="desc">'. $desc . ' <br /><br /><img src="uploads/' .$row[photo]. '>" <br /><br /><hr><br /></div>';
  }
}
echo $events;
?>
