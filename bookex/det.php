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
			echo"<form action='binf.php' method='post'><a href='det.php?id=$id' class='et-hero-tab'><br>"?>
			<?php echo "<p>{$row['name']}</p> <br>"?></a>
		 	</form>

			<?php }} ?>

			<?php echo"<form action='binf.php' method='post'><a href='allinf.php' class='et-hero-tab'><br>"?>
			<?php echo "<p>Все книги</p> <br>"?></a>
			</form>
	
		</div>

	<div class='razdel'>
<?php 
	require_once 'dbconnect.php';
	mysqli_query($connect, "SET NAMES UTF8");
		$query = "SELECT `name` from section where id=$kkk";
		$result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect));
		
	if($result)
		$numrows = mysqli_num_rows($result);
			for ($i=0; $i<$numrows; ++$i) {
		
				$row = mysqli_fetch_array($result)
?>					<h1>Новинки учебной литературы</h1>
					<?php echo "<h2>{$row['name']}</h2>" ?>
				<?php
		
			
			}
		?>
	</div>

	<section class='book-tab'>
<?php
	$string = $_SERVER['QUERY_STRING'];
	$string_array = explode("=", $string);
	$login =  $kkk;

?>
	<div class="det">
<?php 
		$query = "SELECT id_book, book_name, small_pic from books where id= $kkk";
		$result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect));
		$r = 4;
		if( $kkk < 4) {
	if($result)
		$numrows = mysqli_num_rows($result);
			for ($i=0; $i<$numrows; ++$i) {
		
				while($row = mysqli_fetch_array($result)){
				$id=$row['id_book'];
?>
		
				<div class="det-el"><?php echo "<a class='glow' href='binf.php?id=$id'><img src=" ?>  <?php echo "{$row['small_pic']}"?> <?php echo "width='250' height='350'></a>"?></div>
				<?php
		
			}
			}
		}
		?>
</div>
</section>
</main>
<footer>

</footer>
</body>
</html>

