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
		<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="app.js"></script>
	</head>
	<body>
		<header>
			<h1>Event Manager</h1>
		</header>
		<nav>
			<ul>
        		<li><a href="home.php">Home</a></li>
        		<li><a href="showcalendar.php" onclick="initialCalendar();">Calendar</a></li>
        		<li>
      				<a href="events.php">Events<span class="caret"></span></a>
            		<div>
                		<ul>
			                <li><a href="events.php#myevents">My events</a></li>
			                <li><a href="events.php#eventsimin">Events I'm in</a></li>
			                <li><a href="createevent.php">Create an event</a></li>
			            </ul>
           			</div>
        		</li>
    		</ul>
		</nav>

		<div id ="mainwindow">

		</div>

		<footer>
			<p>Projecto Final @ FEUP - 2015</p>
		</footer>
	</body>
</html>
