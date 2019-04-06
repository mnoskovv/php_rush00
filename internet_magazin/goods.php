<!DOCTYPE HTML>
<html>
<head>
<script src="../script.js"></script>
 <meta charset="utf-8">
 <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
 <h1></h1>
 <form action="goods.php" method="POST" name ="tst">
  <input type="submit" name="phones" value="Phones" class = 'sort'>
  <input type="submit" name="computers" value="Computers">
  <input type="submit" name="tabs" value="Tabs">
  <input type="submit" name="all" value="All">
 </form>
 <script>
	 	function ska(name)
		{
			alert(name + " добавлено");
			bask.push(name);
			len = bask.length;
				console.log(len);
			console.log(bask);
		}
	 </script>
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
		 <input type = 'submit'  name = 'submit' class = 'buy' value = '%d₴'>
		 </form>
		 </div>
		 ", $i ,$row["name"], $row["description"], $row["image"], $row["name"], $row["price"], $row["price"]);
}
if (isset($_POST['submit']))
{
	$good = $_POST['good'];
	$price = $_POST['price'];
	$sql = "INSERT basket (`id`, `good`, `price`) VALUES ( null ,\"$good\", \"$price\")";
	$res = mysqli_query($connect, $sql);
}
?>
</body>
</html>