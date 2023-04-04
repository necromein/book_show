<?php
$kkk = $_GET['id'];
?>
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
<main class="head">

<div class="menu-container--top">


			<?php echo"<form action='' method='post'><a href='index.php' class='et-hero-tab'><br>"?>
			<?php echo "<p>Главная</p> <br>"?></a>
			</form>
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
			echo"<form action='' method='post'><a href='det.php?id=$id' class='et-hero-tab'><br>"?>
			<?php echo "<p>{$row['name']}</p> <br>"?></a>
		 	</form>

			<?php }} ?>

			<?php echo"<form action='' method='post'><a href='allinf.php' class='et-hero-tab'><br>"?>
			<?php echo "<p>Все книги</p> <br>"?></a>
			</form>
	
</div>


<div class='razdel'>    
<!-- <h1>Новинки учебной литературы<br></h1>
<h2>Все книги</h2> -->
</div>

<section class='book-tab'>
<?php

	require_once 'dbconnect.php';
	mysqli_query($connect, "SET NAMES UTF8");
	$string = $_SERVER['QUERY_STRING'];
	$string_array = explode("=", $string);

	$login = $kkk;
?>

<div class="det">

<?php 
	$query = "SELECT book_name, annotation, bo, small_pic, bbk, az from books where id_book=$kkk";
	$result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect));
		
		if($result)
		$numrows = mysqli_num_rows($result);
			for ($i=0; $i<$numrows; ++$i) {
		
				$row = mysqli_fetch_array($result)
	?>
		<table class="card" >
			<thead>
				<tr>	
					<td colspan=3 class="b_title"><?php echo "<h3>{$row['book_name']}</h3>" ?></td>
				</tr>
			</thead>
			<tbody valign="top">
				<tr>
					<td rowspan=2 width="310"><?php echo "<img src=" ?>  <?php echo "{$row['small_pic']}"?> <?php echo "width='300' height='450'>"?><br>
					<!--<a href="#" onclick="history.back();return false;" class='back'>Вернуться назад</a>--></td>
					<td colspan=2 class="bo"><?php echo "<p>{$row['bo']}</p>" ?></td>
				</tr>	

				<tr>
					<td colspan=2><?php echo "<p>{$row['annotation']}</p>
					<span class='bbk'><p>ББК {$row['bbk']}</p><p>{$row['az']}</p></span>" ?></td>
				</tr>
				<tr>
				<td></td>
				<td ><a href="#" onclick="history.back();return false;" class='back'>Вернуться назад</a></td>
				<td width="310"></td>
				</tr>

			</tbody>
					<?php
			}
	?>
		</table>
		</div>
		</section>
		
</div>
</main>
</body>

</html>

