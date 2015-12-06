<?

session_start();
$db = new PDO('sqlite:sql.db');
if(sizeof($_SESSION['user']) > 0)
	$user = $_SESSION['user'];
else {
	echo 'Login expired. Please login again.';
  echo'<meta http-equiv="refresh" content="1; URL=html.php">';
	die();
}

$stmt = $db->prepare("SELECT * FROM Event WHERE creator='$user'");
$stmt->execute();
$myevents = $stmt->fetchAll();

?>

<html>
<title>Event Manager</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="event.css"></script>
<script language="javascript" type="text/javascript">
function editevent(eventid) {
  var hr = new XMLHttpRequest();
  var url = "editevent.php";
  var vars = "eventid="+eventid;
  hr.open("POST", url, true);
  hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  hr.onreadystatechange = function() {
    if(hr.readyState == 4 && hr.status == 200) {
      var return_data = hr.responseText;
      document.getElementById("myevents").innerHTML = return_data;
    }
  }
  hr.send(vars);
  document.getElementById("myevents").innerHTML = "processing...";
}
</script>
<body>
  <did id = "myevents">
    <h2>My Events</h2>
    <?  foreach( $myevents as $row) {?>
          <div class="eventos">
            <a  href=# onclick="javascript:editevent(<?php echo $row['id'] ?>);">
            <h3><?=$row['name']?></h3>
            </a>
            <p><?=$row['startDate']?> .. <?=$row['startTime']?></p>
            <p><?=$row['local']?></p>
          </div>
    <? } ?>
  </div>
</body>
</html>
