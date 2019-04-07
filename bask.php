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
	$total = 0;
	require_once('connection.php');
	if (isset($_COOKIE["TestCookie"]))
	{
		$goods = explode("/", $_COOKIE["TestCookie"]);
		for ($index = 0; $index < count($goods); $index++)
		{    
			$item = explode("@", $goods[$index]);
   			if (isset($item[0]) && isset($item[1]))
   			{
   				printf("<center>%s %d<br><center>",$item[0], $item[1]);
   				$total += $item[1];
   			}
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
	echo("total: ".$total);
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