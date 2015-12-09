<?php
	$db = new PDO('sqlite:sql.db');

  	$stmt = $db->prepare('SELECT * FROM Event WHERE ID = (SELECT MAX(ID)  FROM Event);');
  	$stmt->execute();
  	$result1 = $stmt->fetchAll();

		$stmt = $db->prepare('SELECT * FROM Event WHERE ID = (SELECT MAX(ID-1)  FROM Event);');
  	$stmt->execute();
  	$result2 = $stmt->fetchAll();

		$stmt = $db->prepare('SELECT * FROM Event WHERE ID = (SELECT MAX(ID-2)  FROM Event);');
  	$stmt->execute();
  	$result3 = $stmt->fetchAll();
?>

<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="homecss.css">
	</head>
	<body>

		<div id ="events">
			<h2>Last Events Created</h2>
			<?  foreach( $result1 as $row) {?>
      			<div class="ultimoseventos">
					<a  href=# onclick="javascript:registerinevent(<?php echo $row['id'] ?>);">
        				<h3><?=$row['name']?></h3>
					</a>
        			<p><?=$row['startDate']?></p>
      			</div>
			<? } ?>
			<?  foreach( $result2 as $row) {?>
      			<div class="ultimoseventos">
					<a  href=# onclick="javascript:registerinevent(<?php echo $row['id'] ?>);">
        				<h3><?=$row['name']?></h3>
					</a>
        			<p><?=$row['startDate']?></p>
      			</div>
			<? } ?>
			<?  foreach( $result3 as $row) {?>
      			<div class="ultimoseventos">
					<a  href=# onclick="javascript:registerinevent(<?php echo $row['id'] ?>);">
        				<h3><?=$row['name']?></h3>
					</a>
        			<p><?=$row['startDate']?></p>
      			</div>
			<? } ?>
		</div>
	</body>
</html>
