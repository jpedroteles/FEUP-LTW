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
		<link rel="stylesheet" href="maincss.css">
		<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="app.js"></script>
	</head>
	<body>
		<div class="container">
			<h1>Event Manager</h1>
			<nav>
				<ul>
	        		<li><a href="home.php">Home</a></li>
	        		<li><a href="showcalendar.php">Calendar</a></li>
	        		<li>
	      				Events<span class="caret"></span>
	            		<div>
	                		<ul>
	                			<li><a href="events.php">All events</a></li>
				                <li><a href="myevents.php">My events</a></li>
				                <li><a href="eventsimin.php">Events I'm in</a></li>
				                <li><a href="createevent.php">Create an event</a></li>
				            </ul>
	           			</div>
	        		</li>
							<li><a href="searchform.php">Search</a></li>
	    		</ul>
			</nav>

			<div id ="mainwindow">

			</div>
		</div>

		<footer>
			<p>Projecto Final @ FEUP - 2015</p>
		</footer>
	</body>
</html>
