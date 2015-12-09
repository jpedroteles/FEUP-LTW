<?

session_start();
$db = new PDO('sqlite:sql.db');

$comment = $_POST['comment'];
$eventid = $_POST['eventid'];

if(sizeof($_SESSION['user']) > 0) {
	$user = $_SESSION['user'];
}
else {
	echo 'Login expired. Please login again.';
  echo'<meta http-equiv="refresh" content="1; URL=html.php">';
	die();
}

if("" == trim($comment))
{
  echo 'You did not write a thing on the comment box!';
  echo'<meta http-equiv="refresh" content="1; URL=main.php">';
	die();
}

$sql2 = "SELECT Count(*) as total FROM comment";
$result = $db->query($sql2);
$data = $result->fetch(PDO::FETCH_ASSOC);
$id = $data['total'] + 1;

$sql = "INSERT INTO comment (id, commentDate, comment, user, event)
VALUES('$id', '1', '$comment', '$user', '$eventid')";

if($db->query($sql) == TRUE) {
  echo 'Comment added';
  echo'<meta http-equiv="refresh" content="1; URL=main.php">';
  die();
}
else {
  echo 'There was an error submitting your comment';
  echo'<meta http-equiv="refresh" content="1; URL=main.php">';
	die();
}

?>
