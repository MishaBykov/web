<?php
	$host = "localhost";
	$username = "stun";
	$password = "";
	$dbname = "ingognito";
	$mysqli = new mysqli($host, $username, $password, $dbname);
if ( isset( $_GET['id'] ) ) {
  // Здесь $id номер изображения
  $id = (int)$_GET['id'];
  if ( $id > 0 ) {
    $query = "SELECT `image` FROM `my_table` WHERE `id`=".$id;
    // Выполняем запрос и получаем файл
    $res = $mysqli->query($query);
    $row = $res->fetch_array(MYSQLI_ASSOC);
    // Отсылаем браузеру заголовок, сообщающий о том, что сейчас будет передаваться файл изображения
    header("Content-type: image/jpeg");
    // И  передаем сам файл
    echo $row['image'];
  }
  
}
?>