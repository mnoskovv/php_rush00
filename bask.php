<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="header">
  <a href="#default" class="logo">CompanyLogo</a>
  <div class="header-right">
  <a href="index.php">Home</a>
  </div>
</div>
<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);

	require_once('connection.php');
	if (isset($_COOKIE["TestCookie"]))
	{
		$goods = explode("/", $_COOKIE["TestCookie"]);
		for ($index = 0; $index < count($goods); $index++)
		{    
   			printf("<center>%s<br><center>",$goods[$index]);
   		}
	}
	else
	{
		echo "<br>Ваша корзина пуста!"; 
	}
	if (isset($_POST['submit']))
	{
		setcookie ("TestCookie", "", time() - 3600);
		header('Location: index.php');
	}
?>
<form action="" method="post">
	 <?php
		if(isset($_COOKIE["TestCookie"]))
		{
		?>
			 <input type='submit' value='Оформить' name='submit' onclick = "alert('Спасибо за заказ, мы с вами свяжемся!')">
		<?php
		}
	?>
</form>
</body>
</html>