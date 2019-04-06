<?php
    require_once("connection.php");//подкл БД 
    
    if(isset($_POST['sign_in']))
    {
        $sql_req = "SELECT * FROM `users` WHERE `login` = \"".$_POST['login_l']."\" && `password` = \"".$_POST['passwd_l']."\"";
        $sql = mysqli_query($connect, $sql_req);
        if (mysqli_num_rows($sql) > 0 ) 
        {
            $row = mysqli_fetch_array($sql);
            
            $_SESSION['login'] = $row["login"];
            if ($row["status"] == 'admin')
            {

                $_SESSION['login'] = $row["login"];
                $_SESSION['status'] = $row["status"];
                $_SESSION['page'] = "internet_magazin/admin_page.php";
                
            }
        }
        else
        {
            $_SESSION['bad_pass'] = "yes";
            
        }
        
        header('Location: index.php');
    }
?> 