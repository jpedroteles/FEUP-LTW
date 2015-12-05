<?php
$deets = $_POST['deets'];

$db = new PDO('sqlite:sql.db');

$events = '';
$query = $db->query('SELECT * FROM Event WHERE startDate = "'.$deets.'"');
$num_rows = $db->query('SELECT Count(*) as numRows FROM Event WHERE startDate = "'.$deets.'"');
$data = $num_rows->fetch(PDO::FETCH_ASSOC);

if($data[numRows] > 0) {
  $events .= '<div id="eventsControl"><button onMouseDown="overlay()">Close</button><br /><br /><b> ' . $deets . ' </b><br /><br /></div>';

  while($row=$query->fetch(PDO::FETCH_ASSOC)) {
    $desc = $row[decription];
    $name = $row[name];
    $image = $row[photo];
    $events .= '<div id = "eventsBody">' . $desc . '<br /> '. $name . ' <br /><img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/><br /><hr><br /></div>';
  }
}
echo $events;
?>
