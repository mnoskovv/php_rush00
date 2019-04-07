<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Black Apple</title>
	 <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="header">
  <a href="#" class="logo">
  	<?php 
		if (isset($_COOKIE["login"]))
		{
			echo "Hi there, ".$_COOKIE["login"];
		}
	?> 
</a>
  <div class="header-right">
	<a href="#">Home</a>
	<?php
		if ($_COOKIE["logged_in"] != "yes") {
			echo "<a href='log_page.html'>Log in</a>";
			echo "<a href='reg_page.html'>Registration</a>";
		}
		else {
			echo "<a href='index.php?logout=true'>Log out</a>";
		}
	?>
	<a href="cart.php">Cart</a>

  </div>
</div>
 <form class="categories" action="index.php" method="POST" name ="tst">
	 <input class="button" type="submit" name="all" value="All">
	 <input class="button" type="submit" name="phones" value="Phones" class = 'sort'>
	 <input class="button" type="submit" name="computers" value="Computers">
	 <input class="button" type="submit" name="tabs" value="Tabs">
 </form>

<?php
	require_once('connection.php');
	$sql = "SELECT * FROM `goods`";
	if (isset($_POST['phones'])) {
		$sql = "SELECT * FROM goods WHERE category = 'phones'";
	}
	if (isset($_POST['computers'])) {
		$sql = "SELECT * FROM goods WHERE category = 'computers'";
	}
	if (isset($_POST['tabs'])) {
		$sql = "SELECT * FROM goods WHERE category = 'tablets'";
	}
	if (isset($_POST['all'])) {
		$sql = "SELECT * FROM goods WHERE 1";
	}
	$res = mysqli_query($connect, $sql);
	$i = 0;
	while ($row = mysqli_fetch_array($res)) {
		$i++;
		$name = $row["name"];
		printf (" <div class=\"gallery\">
					<a target=\"_blank\" href=\"%s\">
						<img src=\"%s\" width=\"200\" height=\"200\">
					</a>
				<div class=\"desc\">%s</div>
		  		<form action = '' method = 'post'>
				  <input type='hidden' name = 'good' value = '%s'>
				  <input type='hidden' name = 'price' value = '%d'>
				  <div class=\"desc\"><input class=\"button-with-price\" type = 'submit'  name = 'submit' class = 'buy' value = '%duah' onclick = 'itemAdded()'></div>
				</form>
				</div>"
				, $row["image"], $row["image"], $row["description"], $row["name"], $row["price"], $row["price"]);  
	}
	if (isset($_POST['submit'])) {
		$value = $_COOKIE["TestCookie"]."/".$_POST['good']."@".$_POST['price'];
		setcookie ("TestCookie", $value);
	}
	if (isset($_GET["logout"])) {
		setcookie ("logged_in", "", time() - 3600);
		setcookie ("login", "", time() - 3600);
		setcookie ("TestCookie", "", time() - 3600);
		header('Location: index.php');
	}
?>

<script>
	function itemAdded() {
		alert("Your item has been added to the cart!");
	}
</script>
</body>
</html>
