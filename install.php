 <?php
	$conection_data = mysqli_connect("localhost", "root", "123456");
	$result = "CREATE DATABASE IF NOT EXISTS shop;";
	$request = mysqli_query($conection_data, $result);
	if ($request) {
	  echo "Database created successfully\n";
	} 
	else {
	  echo "Error creating database: " . mysqli_error($conection_data)."\n";
	}
	mysqli_close($conection_data);
	$conection_data = mysqli_connect("localhost", "root", "123456", "shop");
	if (!$conection_data) {
	  die("Connection failed: " . mysqli_connect_error())."\n";
	}
	$my_sql = "SET AUTOCOMMIT = 0";
	if (mysqli_query($conection_data, $my_sql)) {
		echo "pabedaaaaa\n";
	} 
	else {
	  echo "Error" . mysqli_error($conection_data)."\n";
	}
	$my_sql = "START TRANSACTION";
	if (mysqli_query($conection_data, $my_sql)) {
		echo "pabedaaaaa\n";
	} 
	else {
	  echo "Error" . mysqli_error($conection_data)."\n";
	}
	$my_sql = "CREATE TABLE `goods` (\n"

    . "				  `id` int(11) NOT NULL,\n"

    . "				  `name` varchar(40) NOT NULL,\n"

    . "				  `description` varchar(256) NOT NULL,\n"

    . "				  `price` int(6) NOT NULL,\n"

    . "				  `category` varchar(40) NOT NULL,\n"

    . "				  `image` text NOT NULL\n"

		. "				) ENGINE=InnoDB DEFAULT CHARSET=utf8";
		
		if (mysqli_query($conection_data, $my_sql)) {
			echo "goods created successfully";
		}
		else {
			echo "Error creating table: " . mysqli_error($conection_data)."\n";
		}
    $my_sql = "INSERT INTO `goods` (`id`, `name`, `description`, `price`, `category`, `image`) VALUES\n"

    . "				(1, \"Macbook pro15 touchbar\", \"15,1 inch retina touchbar macbook pro\", 76800, \"computers\", \"img/4.jpg\"),\n"
		
    . "				(2, \"Macbook pro13,3\", \"13,3 inch retina macbook pro, without touchbar\", 33700, \"computers\", \"img/3.jpg\"),\n"

    . "				(3, \"iphone 8plus 64gb\", \"64gb, 5,5inch retina display\", 24000, \"phones\", \"img/2.jpeg\")";
		
		if (mysqli_query($conection_data, $my_sql)) {
			echo "goods inserted successfully";
		}
		else {
			echo "Error writing table items: " . mysqli_error($conection_data)."\n";
		}
    $my_sql = "CREATE TABLE `users` (\n"

    . "				  `id` int(11) NOT NULL,\n"

    . "				  `login` varchar(24) NOT NULL,\n"

    . "				  `password` varchar(24) NOT NULL,\n"

    . "				  `status` varchar(5) NOT NULL\n"

    . "				) ENGINE=InnoDB DEFAULT CHARSET=utf8";
		
		if (mysqli_query($conection_data, $my_sql)) {
			echo "Users created successfully";
		}
		else {
		  echo "Error creating table: " . mysqli_error($conection_data)."\n";
		}
		
		$my_sql = "INSERT INTO `users` (`id`, `login`, `password`, `status`) VALUES\n"

    . "				(2, \"root\", \"root\", \"admin\"),\n"

    . "				(8, \"poroh\", \"qwerty\", \"user\"),\n"

    . "				(9, \"the\", \"the\", \"user\")";
    if (mysqli_query($conection_data, $my_sql)) {
			echo "users written successfully";
		} 
		else {
		  echo "Error writing table: " . mysqli_error($conection_data)."\n";
		}
		$my_sql = "ALTER TABLE `goods`\n"

    . "				  ADD PRIMARY KEY (`id`)";
    if (mysqli_query($conection_data, $my_sql)) {
			echo "table created successfully";
		} 
		else {
		  echo "Error creating table: " . mysqli_error($conection_data);
		}
    $my_sql = "ALTER TABLE `users`\n"

    . "				  ADD PRIMARY KEY (`id`)";
    if (mysqli_query($conection_data, $my_sql)) {
			echo "pabedaaaaa\n";
		} 
		else {
		  echo "Error" . mysqli_error($conection_data)."\n";
		}
    $my_sql = "ALTER TABLE `goods`\n"

    . "				  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4";
    if (mysqli_query($conection_data, $my_sql)) {
		echo "pabedaaaaa\n";
		}
		else {
		  echo "Error" . mysqli_error($conection_data)."\n";
		}
    $my_sql = "ALTER TABLE `users`\n"

    . "				  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10";
		if (mysqli_query($conection_data, $my_sql)) {
			echo "pabedaaaaa\n";
		} 
		else {
		  echo "Error" . mysqli_error($conection_data)."\n";
		}
    $my_sql = "COMMIT";
    if (mysqli_query($conection_data, $my_sql)) {
			echo "pabedaaaaa\n";
		} 
		else {
		  echo "Error" . mysqli_error($conection_data)."\n";
		}
		mysqli_close($conection_data);
?>
