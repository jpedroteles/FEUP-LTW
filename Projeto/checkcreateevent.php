<?php
/*
Neste ficheiro ainda falta:
					- verificar se já existe um evento com o mesmo nome
					- obter o creador do evento(fazer $_SESSION['user'] dá ID de user)
*/
session_start();
$db = new PDO('sqlite:sql.db');

//informa��es de registo
$name = $_POST['name'];
$date = $_POST['startdate'];
$time = $_POST['starttime'];
$local = $_POST['local'];
$description = $_POST['description'];
$private = $_POST['private'];
$pic = $_FILES["fileToUpload"]["name"];
if(sizeof($_SESSION['user']) > 0) {
	$creator = $_SESSION['user'];
	$sql = "SELECT * FROM User WHERE id = '$creator'";
	$result=$db->query($sql);
	$result=$result->fetch(PDO::FETCH_ASSOC);
	$creator = $result['name'];
}
else {
	echo 'Login expired. Please login again.';
  echo'<meta http-equiv="refresh" content="1; URL=html.php">';
	die();
}

if("" == trim($name) || "" == trim($date) || "" == trim($time) || "" == trim($description) || "" == trim($local) || "" == trim($pic))
{
	echo 'Fill all the blanks.';
	session_start();
	$_SESSION['fillBlanks'] = 1;
	echo'<meta http-equiv="refresh" content="1; URL=main.php">';
	die();
}

$sql2 = "SELECT Count(*) as total FROM Event";
$result = $db->query($sql2);
$data = $result->fetch(PDO::FETCH_ASSOC);
$id = $data['total'] + 1;

$sql = "INSERT INTO Event (id, name, startDate, startTime, local, description, private, photo, type, creator)
VALUES('$id','$name','$date','$time','$local', '$description', '$private','$pic','1', '$creator')";

if($db->query($sql) == TRUE){
	echo '<p>New event created successfully</p>';
	//upload image
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    if($check !== false) {
	        echo "<p>File is an image - " . $check["mime"] . ".</p>";
	        $uploadOk = 1;
	    } else {
	        echo "<p>File is not an image.</p>";
	        $uploadOk = 0;
	    }
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
	    echo "<p>Sorry, your file is too large.</p>";
	    $uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "<p>Sorry, your file was not uploaded.</p>";
			echo '<meta http-equiv="refresh" content="1; URL=main.php">';
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	        echo "<p>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</p>";
					echo '<meta http-equiv="refresh" content="1; URL=main.php">';
	    } else {
	        echo "<p>Sorry, there was an error uploading your file.</p>";
					echo '<meta http-equiv="refresh" content="1; URL=main.php">';
	    }
	}
}
else {
	echo '<p>Error creating event</p>';
	echo'<meta http-equiv="refresh" content="1; URL=main.php">';
	die();
}
?>
