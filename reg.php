<?php
    require_once("connection.php");
    if(isset($_POST['register'])) {
        $sql = "INSERT INTO `users`(`login`, `password`, `status`) VALUES (\"".$_POST['login']."\",\"".$_POST['pw1']."\",\"user\")";
        mysqli_query($connect, $sql);
        header('Location: index.php');
    }
?>