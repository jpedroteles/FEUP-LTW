<html>
	<head>
		<title>Event Manager</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="">
	</head>
	<body>
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
	</body>
</html>
