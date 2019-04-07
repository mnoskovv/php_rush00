<?php
    require_once("connection.php");
    if(isset($_POST['sign_in']))
    {
        $sql_req = "SELECT * FROM `users` WHERE `login` = \"".$_POST['login_l']."\" && `password` = \"".$_POST['passwd_l']."\"";
        $sql = mysqli_query($connect, $sql_req);
        if (mysqli_num_rows($sql) > 0) 
        {
            $row = mysqli_fetch_array($sql);
            if ($row["status"] == 'admin')
            {
                header('Location: admin_page.php');
            }
            else
            {
                setcookie ("logged_in", "yes");
                setcookie ("login", $row["login"]);
                header('Location: index.php');
            }
        }
        else
        {
            header('Location: index.php');
        }
    }
?> 