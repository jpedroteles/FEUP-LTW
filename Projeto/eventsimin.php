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

$stmt = $db->prepare("SELECT * FROM Attendees WHERE user='$user'");
$stmt->execute();
$eventsimin = $stmt->fetchAll();
?>

<html>
<title>Event Manager</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="">
<body>
  <div id = "eventsimin">
    Events I am in
    <?
      if(sizeof($eventsimin) > 0)
      {
        foreach($eventsimin as $row)
        {
          $id = $row['event'];
          $stmt = $db->prepare("SELECT * FROM Event WHERE id='$id'");
          $stmt->execute();
          $row = $stmt->fetch();
          ?>

          <div>
            <a  href=# onclick="javascript:registerinevent(<?php echo $row['id'] ?>);">
            <h3><?=$row['name']?></h3>
            </a>
            <p><?=$row['startDate']?> .. <?=$row['startTime']?></p>
            <p><?=$row['local']?></p>
          </div>
        <?
        }
      }
      ?>
  </div>
</body>
</html>
