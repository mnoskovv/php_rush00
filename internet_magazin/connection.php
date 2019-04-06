<?php
	$connect = mysqli_connect("localhost", "root", "000000", "shop");
	if (!$connect) {
	    die("Connection failed: " . mysqli_connect_error());
	}
?>
