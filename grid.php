<!DOCTYPE html>
<html>
	<head>
		<title>Список элементов</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/menu-main.css">
		<link href="css/grid.css" rel="stylesheet" type="text/css">
		<?php
			$host = "localhost";
			$username = "stun";
			$password = "";
			$dbname = "ingognito";
			$mysqli = new mysqli($host, $username, $password, $dbname);
		?>
	</head>
	<body>
		
		<ul class="menu-main">
      <li><a href="index.html" >Главная</a></li>
      <li><a href="gallery.html" >Галерея</a></li>
      <li><a href="grid.php" class="current" >Список элементов</a></li>
    </ul>
			
		<div class="wrapper">
			<ul>
				<?php
					$query = "select `id`, `name`, `description` from my_table";
					$result = $mysqli->query($query);
					while($row = $result->fetch_array(MYSQLI_ASSOC)) {
						echo'	<li class="product-wrapper">
										<a href="item.php?id='.$row['id'].'" class="product">
											<div class="product-main"> 
												<div class="product-photo">
													<img src="getimage.php?id='.$row['id'].'" alt="Не судьба" />
												</div>
												<div class="product-text">
													<h2 class="product-name">'.$row['name'].'</h2>
													<p>'.$row['description'].'</p>
												</div>
											</div>
										</a>
									</li>';
					}
				?>
			</ul>
		</div>
	</body>
</html>