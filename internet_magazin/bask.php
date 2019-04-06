<!DOCTYPE html>
<html>
<meta charset="utf-8">
<button onclick="window.location.href='goods.php'">На главную</button>
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
		header('Location: goods.php');
	}
?>
<form action="" method="post">
<input type="submit" value="Оформить" name="submit" onclick='alert("Спасибо за заказ, мы с вами свяжемся!")'>
</form>
</html>