<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Minishop</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="header">
  <a href="#default" class="logo">
  	<?php 
		if (isset($_COOKIE["login"]))
		{
			echo "Hi, ".$_COOKIE["login"];
		}
	?> 
</a>
  <div class="header-right">
	<a href="#">Home</a>
	<?php
		if ($_COOKIE["logged_in"] != "yes")
		{
			echo "<a href='log_page.html'>login</a>";
		}
		else
		{
			echo "<a href='index.php?logout=true'>logout</a>";
		}
	?>
	<a href="bask.php">basket</a>
  </div>
</div>
 <form action="index.php" method="POST" name ="tst">
  <input type="submit" name="phones" value="Phones" class = 'sort'>
  <input type="submit" name="computers" value="Computers">
  <input type="submit" name="tabs" value="Tabs">
  <input type="submit" name="all" value="All">
 </form>
<?php
	require_once('connection.php');
	$sql = "SELECT * FROM `goods`";
	if (isset($_POST['phones']))
	{
		$sql = "SELECT * FROM goods WHERE category = 'phones'";
	}
	if (isset($_POST['computers']))
	{
		$sql = "SELECT * FROM goods WHERE category = 'computers'";
	}
	if (isset($_POST['tabs']))
	{
		$sql = "SELECT * FROM goods WHERE category = 'tablets'";
	}
	if (isset($_POST['all']))
	{
		$sql = "SELECT * FROM goods WHERE 1";
	}
	$res = mysqli_query($connect, $sql);
	$i = 0;
	while ($row = mysqli_fetch_array($res))
	{
		$i++;
		$name = $row["name"];
		printf ("
			<div id='%d' class = 'article'>
			<div class = 'article-title'>%s</div>
			 <div class = 'article-description'>%s</div>
			 <img height =\"200px\" width = '200px' src=\"%s\">	 
			 <form action = '' method = 'post'> 
			 <input type='hidden' name = 'good' value = '%s'>
			 <input type='hidden' name = 'price' value = '%d'>
			 <input type = 'submit'  name = 'submit' class = 'buy' value = '%d₴' onclick = 'itemAdded()'>
			 </form>
			 </div>
			 ", $i ,$row["name"], $row["description"], $row["image"], $row["name"], $row["price"], $row["price"]);
	}
	if (isset($_POST['submit']))
	{
		$value = $_COOKIE["TestCookie"]."/".$_POST['good'];
		setcookie ("TestCookie", $value);
	}
	if (isset($_GET["logout"]))
	{
		setcookie ("logged_in", "", time() - 3600);
		setcookie ("login", "", time() - 3600);
		header('Location: index.php');
	}
?>
<script>
	function itemAdded()
	{
		alert("Товар был успешно добавлен в корзину!");
	}
</script>
</body>
</html>