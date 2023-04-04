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
<h1>Новинки учебной литературы<br></h1>
<!-- <h2>Все книги</h2> -->
</div>



    <div class="que">
<form action="bet1.php" method="post" name="1_form">
<table>
                <tr>
                   <td><link rel="preconnect" href="https://fonts.googleapis.com" />
                    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
                    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Source+Code+Pro&display=swap" rel="stylesheet" />
                    <link
                      href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&display=swap"
                      rel="stylesheet"
                    />
                    <link
                      rel="stylesheet"
                      href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
                    />
                
                
                <div class="wrapper">
                <div class="search">
                  <span class="uil uil-search">
                  </span>
                  <input placeholder="Найти книгу" type="text" name="l_c3" class="" required  />
                </div></td> 
                </tr>
        
                <tr>
                    <td colspan="2"> <input type="submit" class="knop" name="l_send">
                </tr>
            </table><br>
</div>
<section class='book-tab'>
<div class="det">
<?php 
	require_once 'dbconnect.php';
	mysqli_query($connect, "SET NAMES UTF8");
		$query = "SELECT id_book, book_name, small_pic from books ";
		$result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect));
		
	if($result)
		$numrows = mysqli_num_rows($result);
			for ($i=0; $i<$numrows; ++$i) {
		
				while($row = mysqli_fetch_array($result)){
				$id=$row['id_book'];
?>
		
				&nbsp; <?php echo "<a href='binf.php?id=$id'><img src=" ?>  <?php echo "{$row['small_pic']}"?> <?php echo "width='250' height='350'></a>"?>
				&nbsp; <?php
		
			}
			
			
}
		?>
	<table>
	</div>
</section>
</main>
</body>
</html>

