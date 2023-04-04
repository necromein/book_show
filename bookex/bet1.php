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
$string = $_SERVER['QUERY_STRING'];
$string_array = explode("=", $string);

if(isset($_POST["l_c3"])){$l_c3 = $_POST["l_c3"];}
if(isset($_POST["l_send"])){$l_send = $_POST["l_send"];}
if(isset($l_send)){
$result = mysqli_query($connect, "SELECT * FROM books WHERE MATCH (`bo`) AGAINST ('%$l_c3%') " ) or die ("Error : ".mysqli_error());

if(mysqli_num_rows($result)<1)
{echo "<p>По данному запросу ничего не найдено</p>";}
else{
$_SESSION['bo'] = $l_c3;

}

	if($result)
		$numrows = mysqli_num_rows($result);
			for ($i=0; $i<$numrows; ++$i) {
		
				while($row = mysqli_fetch_array($result)){
				$id=$row['id_book'];
?>
				&nbsp; <?php echo "<td> <a href='binf.php?id=$id'><img src=" ?>  
                <?php echo "{$row['small_pic']}"?> 
                <?php echo "width='250' height='350'></a>"?>

                &nbsp; <?php
		
			}
			}
			
}
?>
</form>
</div>
</section>
</main>
</body>
</html> 

