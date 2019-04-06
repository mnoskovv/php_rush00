<!DOCTYPE html>
<html>
<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);

	require_once('connection.php');
	if (isset($_POST['submit']))
	{
		$sql = "DELETE FROM `basket` WHERE 1";
		$res = mysqli_query($connect, $sql);
		header('Location: goods.php');
	}

	$sql = "SELECT * FROM `basket` WHERE 1";
	$res = mysqli_query($connect, $sql);
	$i = 0;
	while ($row = mysqli_fetch_array($res))
	{
		$i++;
		$name = $row['good'];
		$price = $row['price'];
		printf ("<div id='%d'><b>%s</b> %d</div> <hr>", $i ,$name, $price);
	}

	$sql = "SELECT SUM(price) AS total from basket";	
	$res = mysqli_query($connect, $sql);
	$row = mysqli_fetch_array($res);
	echo "total : ";
	echo $row['total'];
?>
<form action="" method="post">
<input type="submit" value="Оформить" name="submit">
</form>
</html>