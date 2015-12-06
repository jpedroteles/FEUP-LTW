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
			<h2>Create an event:</h2>
			<form action="checkcreateevent.php" method="post" enctype="multipart/form-data">
	      			<p><input type="text" name="name" placeholder="Name"></p>
	     			<p><input type="date" name="startdate" placeholder="Date"></p>
	     			<p><input type="time" name="starttime" placeholder="Time"></p>
	     			<p><input type="text" name="local" placeholder="Local"></p>
	     			<p><textarea rows="4" cols="50" name="description" placeholder="Description"></textarea></p>
	                <p><input type="radio" name="private" value="FALSE" checked> Public
					<input type="radio" name="private" value="TRUE"> Private</p>
					<p>Foto do evento: <input type="file" id="fileToUpload" name="fileToUpload" accept="image/*" placeholder="Foto do Evento"></p>
					<p><input type="submit" name="submit" value="Submit"></p>
	   		</form>
		</div>




		<footer>
			<p>Projecto Final @ FEUP - 2015</p>
		</footer>
	</body>
</html>
