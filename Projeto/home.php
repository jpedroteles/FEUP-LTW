<?php
	$db = new PDO('sqlite:sql.db');

  	$stmt = $db->prepare('SELECT * FROM Event WHERE ID = (SELECT MAX(ID)  FROM Event);');
  	$stmt->execute();
  	$result = $stmt->fetchAll();
?>

<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="homecss.css">
	</head>
	<body>

		<div id ="events">
			<h2>Últimos eventos</h2>
			<?  foreach( $result as $row) {?>
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
