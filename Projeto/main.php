<?php
	$db = new PDO('sqlite:sql.db');
 
  	$stmt = $db->prepare('SELECT * FROM Event');
  	$stmt->execute();  
  	$result = $stmt->fetchAll();
?>


<html>
	<head>
		<title>Event Manager</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="">
	</head>
	<body>
		<header>
			<h1>Event Manager</h1>
		</header>
		<nav>
			<ul>
        		<li><a href="main.php">Home</a></li>
        		<li><a href="showcalendar.php">Calendar</a></li>
        		<li>
      				<a href="events.php">Events<span class="caret"></span></a>
            		<div>
                		<ul>
			                <li><a href="events.php#my">My events</a></li>
			                <li><a href="events.php#registered">Events I'm in</a></li>
			                <li><a href="createevent.php">Create an event</a></li>
			            </ul>
           			</div>
        		</li>
    		</ul>
		</nav>
		<div>
			Últimos eventos
			<?  foreach( $result as $row) {?>
      			<div>
        			<h3><?=$row['name']?></h3>
        			<p><?=$row['startDate']?> .. <?=$row['startTime']?></p>
        			<p><?=$row['local']?></p>
      			</div>
			<? } ?> 
		</div>


		<footer>
			<p>Projecto Final @ FEUP - 2015</p>
		</footer>
	</body>
</html>