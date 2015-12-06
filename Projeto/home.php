<?php
	$db = new PDO('sqlite:sql.db');

  	$stmt = $db->prepare('SELECT * FROM Event');
  	$stmt->execute();
  	$result = $stmt->fetchAll();
?>

<html>
	<head>
	</head>
	<body>

		<div id = events>
			Últimos eventos
			<?  foreach( $result as $row) {?>
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
