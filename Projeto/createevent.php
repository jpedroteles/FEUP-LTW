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
		<div class= "Menu">
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
		</div>

		<div class="container">
			<h2>Create an event:</h2>
			<form method="post" action="checkcreateevent.php">
	      		<p calss= "name"><input type="text" name="name" placeholder="Name"></p>
	     			<p calss= "startdate"<input type="date" name="startdate" placeholder="Date"></p>
	     			<p calss= "starttime"><input type="time" name="starttime" placeholder="Time"></p>
	     			<p calss= "local"><input type="text" name="local" placeholder="Local"></p>
	     			<p class="description"><textarea rows="3" cols="45" name="description" placeholder="Description">Description</textarea></p>
	          <p class="private"><input type="radio" name="private" value="FALSE" checked> Public
					<input type="radio" name="private" value="TRUE"> Private</p>
					<p>Foto do evento: <input type="file" name="pic" accept="image/*" placeholder="Foto do Evento"></p>
					<p class="submit"><input type="submit" name="commit" value="Login"></p>
	   		</form>
		</div>

		<footer>
			<p>Projecto Final @ FEUP - 2015</p>
		</footer>
	</body>
</html>