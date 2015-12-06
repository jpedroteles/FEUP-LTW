<?
  session_start();
  $db = new PDO('sqlite:sql.db');
  if(sizeof($_SESSION['user']) > 0)
  	$creator = $_SESSION['user'];
  else {
  	echo 'Login expired. Please login again.';
    echo'<meta http-equiv="refresh" content="1; URL=html.php">';
  	die();
  }

  $stmt = $db->prepare('SELECT * FROM Event');
  $stmt->execute();
  $allevents = $stmt->fetchAll();

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
</body>
</html>
