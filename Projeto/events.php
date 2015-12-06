<?
  session_start();
  $db = new PDO('sqlite:sql.db');
  $user = $_SESSION['user'];

  $stmt = $db->prepare('SELECT * FROM Event');
  $stmt->execute();
  $allevents = $stmt->fetchAll();

  $stmt = $db->prepare("SELECT * FROM Event WHERE creator='$user'");
  $stmt->execute();
  $myevents = $stmt->fetchAll();

  $stmt = $db->prepare("SELECT * FROM Attendees WHERE user='$user'");
  $stmt->execute();
  $eventsimin = $stmt->fetchAll();

?>

<html>
<title>Event Manager</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="">
<body>
  <div id = events>
    All Events
    <?  foreach( $allevents as $row) {?>
          <div>
            <a  href=# onclick="javascript:registerinevent(<?php echo $row['id'] ?>);">
            <h3><?=$row['name']?></h3>
            </a>
            <p><?=$row['startDate']?> .. <?=$row['startTime']?></p>
            <p><?=$row['local']?></p>
          </div>
    <? } ?>
  </div>
  <did id = "myevents">
    My Events
    <?  foreach( $myevents as $row) {?>
          <div>
            <a  href=# onclick="javascript:registerinevent(<?php echo $row['id'] ?>);">
            <h3><?=$row['name']?></h3>
            </a>
            <p><?=$row['startDate']?> .. <?=$row['startTime']?></p>
            <p><?=$row['local']?></p>
          </div>
    <? } ?>
  </div>
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
