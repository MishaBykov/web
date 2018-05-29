<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/menu-main.css">
    <link href="css/list.css" rel="stylesheet" type="text/css">
    <title>Сайт</title>
    <?php
    	$host = "localhost";
    	$username = "stun";
    	$password = "";
    	$dbname = "ingognito";
    	$mysqli = new mysqli($host, $username, $password, $dbname);
	  ?>
  </<head>
  <body>
      
    <ul class="menu-main">
      <li><a href="..\index.html" >Главная</a></li>
      <li><a href="..\gallery.html" >Галерея</a></li>
      <li><a href="..\grid.php" >Список элементов</a></li>
    </ul>
    <?php
      $query = "select `id`, `name`, `description`, `text_full` from my_table
      where id=". $_REQUEST['id'];
			$result = $mysqli->query($query);
			$row = $result->fetch_array(MYSQLI_ASSOC);
    ?>
    
    <div class="wrapper">
    	<div class="product-wrapper">
        <div class="product-main">
	        <div class="product-photo">
		        <img src="getimage.php?id=<?php echo $row['id'] ?>" alt="Не судьба" />
	        </div>
	        <div class="product-text">
		        <h2 class="product-name"><?php echo $row['name'] ?></h2>
		        <p><?php echo $row['text_full'] ?></p>
	        </div>
	      </div>
	    </div>
    </div>
 </body>
</html>
