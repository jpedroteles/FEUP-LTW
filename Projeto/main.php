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
		<script type="text/javascript" src="app.js"></script>
		<script language="javascript" type="text/javascript">
		function registerinevent(eventid)
		{
			var hr = new XMLHttpRequest();
	    var url = "registerinevent.php";
	    var vars = "eventid="+eventid;
	    hr.open("POST", url, true);
	    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	    hr.onreadystatechange = function() {
	      if(hr.readyState == 4 && hr.status == 200) {
	        var return_data = hr.responseText;
	        document.getElementById("events").innerHTML = return_data;
	      }
	    }
	    hr.send(vars);
	    document.getElementById("events").innerHTML = "processing...";
	  }
		</script>
		<script language="javascript" type="text/javascript">
		function attendevent(eventid)
		{
		  var hr = new XMLHttpRequest();
		  var url = "attendevent.php";
		  var vars = "eventid="+eventid;
		  hr.open("POST", url, true);
		  hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		  hr.onreadystatechange = function() {
		    if(hr.readyState == 4 && hr.status == 200) {
		      var return_data = hr.responseText;
		      document.getElementById("eventinformation").innerHTML = return_data;
		    }
		  }
		  hr.send(vars);
		  document.getElementById("eventinformation").innerHTML = "processing...";
		}
		</script>
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
			                <li><a href="events.php#myevents">My events</a></li>
			                <li><a href="events.php#eventsimin">Events I'm in</a></li>
			                <li><a href="createevent.php">Create an event</a></li>
			            </ul>
           			</div>
        		</li>
    		</ul>
		</nav>
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


		<footer>
			<p>Projecto Final @ FEUP - 2015</p>
		</footer>
	</body>
</html>
