 <?php
	$connect = mysqli_connect("localhost", "root", "");   // твой пароль к базе данных
	$result_sql = "CREATE DATABASE IF NOT EXISTS shop;";
	$query = mysqli_query($connect, $result_sql);
	if ($query) 
	{
	  echo "Database created successfully\n";
	} 
	else
	{
	  echo "Error creating database: " . mysqli_error($connect)."\n";
	}
	mysqli_close($connect);
	$connect = mysqli_connect("localhost", "root", "", "shop");  // и тут тоже 
	if (!$connect)
	{
	  die("Connection failed: " . mysqli_connect_error())."\n";
	}
	$sql = "SET AUTOCOMMIT = 0";
	if (mysqli_query($connect, $sql))
	{
		echo "sucess\n";
	} 
	else
	{
	  echo "Error" . mysqli_error($connect)."\n";
	}
	$sql = "START TRANSACTION";
	if (mysqli_query($connect, $sql))
	{
		echo "sucess\n";
	} 
	else
	{
	  echo "Error" . mysqli_error($connect)."\n";
	}
	$sql = "CREATE TABLE `goods` (\n"

    . "				  `id` int(11) NOT NULL,\n"

    . "				  `name` varchar(40) NOT NULL,\n"

    . "				  `description` varchar(256) NOT NULL,\n"

    . "				  `price` int(6) NOT NULL,\n"

    . "				  `category` varchar(40) NOT NULL,\n"

    . "				  `image` text NOT NULL\n"

    . "				) ENGINE=InnoDB DEFAULT CHARSET=utf8";
    if (mysqli_query($connect, $sql))
	{
		echo "goods created successfully";
	} 
	else
	{
	  echo "Error creating table: " . mysqli_error($connect)."\n";
	}
    $sql = "INSERT INTO `goods` (`id`, `name`, `description`, `price`, `category`, `image`) VALUES\n"

    . "				(1, \"Macbook pro13,3\", \"13,3 inch retina macbook pro, without touchbar\", 33700, \"computers\", \"\"),\n"

    . "				(2, \"Macbook pro15 touchbar\", \"15,1 inch retina touchbar macbook pro\", 76800, \"computers\", \"\"),\n"

    . "				(3, \"iphone 8plus 64gb\", \"64gb, 5,5inch retina display\", 24000, \"phones\", \"\")";
    if (mysqli_query($connect, $sql))
	{
		echo "goods inserted successfully";
	} 
	else
	{
	  echo "Error inserting table: " . mysqli_error($connect)."\n";
	}
    $sql = "CREATE TABLE `users` (\n"

    . "				  `id` int(11) NOT NULL,\n"

    . "				  `login` varchar(24) NOT NULL,\n"

    . "				  `password` varchar(24) NOT NULL,\n"

    . "				  `status` varchar(5) NOT NULL\n"

    . "				) ENGINE=InnoDB DEFAULT CHARSET=utf8";
    if (mysqli_query($connect, $sql))
	{
		echo "Users created successfully";
	} 
	else
	{
	  echo "Error creating table: " . mysqli_error($connect)."\n";
	}
    $sql = "INSERT INTO `users` (`id`, `login`, `password`, `status`) VALUES\n"

    . "				(2, \"log\", \"pass\", \"admin\"),\n"

    . "				(8, \"lil pump\", \"qwerty\", \"user\"),\n"

    . "				(9, \"dog doggy\", \"doog\", \"user\")";
    if (mysqli_query($connect, $sql))
	{
		echo "users inserted successfully";
	} 
	else
	{
	  echo "Error inserting table: " . mysqli_error($connect)."\n";
	}
	$sql = "ALTER TABLE `goods`\n"

    . "				  ADD PRIMARY KEY (`id`)";
    if (mysqli_query($connect, $sql))
	{
		echo "created successfully";
	} 
	else
	{
	  echo "Error creating table: " . mysqli_error($connect);
	}
    $sql = "ALTER TABLE `users`\n"

    . "				  ADD PRIMARY KEY (`id`)";
    if (mysqli_query($connect, $sql))
	{
		echo "sucess\n";
	} 
	else
	{
	  echo "Error" . mysqli_error($connect)."\n";
	}
    $sql = "ALTER TABLE `goods`\n"

    . "				  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4";
    if (mysqli_query($connect, $sql))
	{
		echo "sucess\n";
	} 
	else
	{
	  echo "Error" . mysqli_error($connect)."\n";
	}
    $sql = "ALTER TABLE `users`\n"

    . "				  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10";
    if (mysqli_query($connect, $sql))
	{
		echo "sucess\n";
	} 
	else
	{
	  echo "Error" . mysqli_error($connect)."\n";
	}
    $sql = "COMMIT";
    if (mysqli_query($connect, $sql))
	{
		echo "sucess\n";
	} 
	else
	{
	  echo "Error" . mysqli_error($connect)."\n";
	}
		mysqli_close($connect);
	?>
