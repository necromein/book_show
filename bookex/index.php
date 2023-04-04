<!doctype html>
<html lang="ru">
<head>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Электронная выставка</title>
  <link rel="stylesheet" href="stylesheet.css">
</head>
<body>

<section class="menu">
	<h1>Новинки учебной литературы</h1><h2> по специальности "Информационные системы и программирование"</h2>

<div class="menu-container">
<?php
	require_once 'dbconnect.php';
	mysqli_query($connect, "SET NAMES UTF8");
		$query = "SELECT * FROM section";
		$result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect));
		
	if($result)
		$numrows = mysqli_num_rows($result);
		for ($i=0; $i<$numrows; ++$i) {
		
		while($row = mysqli_fetch_array($result))
		{
			$id=$row['id'];
?>



			<?php 
			echo"<form action='binf.php' method='post'><a href='det.php?id=$id' class='et-hero-tab'><br>"?>
			<?php echo "<p>{$row['name']}</p> <br>"?></a>
		 	</form>

			<?php }} ?>

			<?php echo"<form action='binf.php' method='post'><a href='allinf.php' class='et-hero-tab'><br>"?>
			<?php echo "<p>Все книги</p> <br>"?></a>
			</form>
	
		</div>
</section>
</body>
</html>