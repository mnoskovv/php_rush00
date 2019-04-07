<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="header">
  <a href="#default" class="logo">LOGO</a>
  <div class="header-right">
  <a href="index.php">Home</a>
  </div>
</div>
<div class="cart">
<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	$total = 0;
	require_once('connection.php');
	if (isset($_COOKIE["TestCookie"])) {
		printf("<p class=\"headers\">Your total is:</p>");
		$goods = explode("/", $_COOKIE["TestCookie"]);
		$arr = array_count_values($goods);
		foreach ($arr as $key => $value) {	
			$i = explode("@",$key);
    		if ($key != "")
				printf("<p class=\"headers-item\">%s : %d uah    x%d</p>", $i[0], $i[1], $value);	
		}
		for ($index = 0; $index < count($goods); $index++) {    
			$item = explode("@", $goods[$index]);
   			if (isset($item[0]) && isset($item[1])) {
   				$total += $item[1];
   			}
   		}
   		printf("<p class=\"headers\">Тotal cost of the items in the cart is : %d uah.</p>", $total);
	}
	else {
		printf("<p class=\"headers\">Тotal cost of the items in the cart is : %d uah.</p>", $total);
	}
	if (isset($_POST['submit'])) {
		setcookie ("TestCookie", "", time() - 3600);
		header('Location: index.php');
	}
	if (isset($_POST['submit_clear'])) {
		setcookie ("TestCookie", "", time() - 3600);
		header('Location: index.php');
	}
	?>
	<form action="" method="post">
	<?php
	
	if(isset($_COOKIE["TestCookie"])) {
	?>
	<input class="button-with-price" type='submit' value='Clear Cart' name='submit_clear' onclick = "alert('The cart is empty now!')">
	<?php
	}
	if(isset($_COOKIE["TestCookie"]) && isset($_COOKIE["login"])) {
	?>
	 <input class="button-with-price" type='submit' value='Submit' name='submit' onclick = "alert('Thank you for your order! We will contact you soon')">
	</div>
	<?php
	}
	if (!(isset($_COOKIE["login"]))) {
	?>
	<p class="headers">In order to submit please <a href="log_page.html">log in</a> or <a href="reg_page.html">register</a>.</p>
	<?php
	}
	?>
</form>
</body>
</html>