<html>
<head>
  <meta http-equiv="refresh" content="0; url=index.html">;
</head>
<?php
$host = "localhost";
$username = "stun";
$password = "";
$dbname = "ingognito";
$mysqli = new mysqli($host, $username, $password, $dbname);

$query = "select max(id) from my_table";
$result = $mysqli->query($query); // выполнение запроса
if ($mysqli->connect_errno != 0)
  echo $mysqli->connect_errno;
$new_id = $result->fetch_array(MYSQLI_ASSOC)['max(id)'] + 1;
if ($mysqli->connect_errno != 0)
  echo $mysqli->connect_errno;
if ( $_FILES['image']['error'] != 0 ) 
  exit('error download');
if( !substr($_FILES['image']['type'], 0, 5)=='image' ) 
  exit('no image');
$image = file_get_contents( $_FILES['image']['tmp_name'] );
$image = mysql_escape_string( $image );
$description = $_REQUEST['desk'];
$name = $_REQUEST['name'];
$text_full = $_REQUEST['text_full'];
$query = "INSERT INTO `ingognito`.`my_table` (`id`, `description`, `name`, `text_full`, `image`) 
VALUES (".$new_id.", '".$description."', '".$name."', '".$text_full."', '".$image."');";
$mysqli->query($query);
?>