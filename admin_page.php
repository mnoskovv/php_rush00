<?php
require_once 'connection.php';
if (isset($_POST['upload']))
{
    print("upload ");
   $sql = "INSERT INTO `goods`(`name`, `description`, `price`, `category`, `image`) VALUES (\"".$_POST['good']."\",\"".$_POST['desc']."\",".$_POST['price'].",\"".$_POST['category']."\",\"img/".$_POST['image']."\")";
    if (mysqli_query($connect, $sql))
    {
        echo "sucess\n";
    }
    else
        echo "Error\n";
}
?>
<!DOCTYPE>
<html>
<head>
<title>title</title>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="header">
  <a href="#default" class="logo">CompanyLogo</a>
  <div class="header-right">
  <a class="" href="index.php">Home</a>
  </div>
</div>
   <form name="upload_good"      action="admin_page.php" method="post">             
    <input type="text"      name="good" placeholder="название товара" required="true"><br>
    <input type="textfield" name="desc" placeholder="описание товара" required="true"><br>
    <input type="number"    name="price" placeholder="" required="true"><br>
    <select size="1" name="category">
    <option disabled>select category</option>
    <option value="phones">phones</option>
    <option selected value="computers">computers</option>
    <option value="tablets">tablets</option>
   </select>
   <br>
    <input type="file"      name="image"  required=""><br>
    <input type="submit"    name="upload" value="upload">
   </form>
   <hr>
   <form name="delete_good" action="admin_page.php" method="post">
        <select size="1" name="good">
                <option disabled>select good</option>
                <?php 
                    $sql = "SELECT * FROM `goods`";
                    if ($res = mysqli_query($connect, $sql))
                    {
                        while ($row = mysqli_fetch_array($res))
                            printf("<option value=\"%s\">%s</option>", $row['name'],$row['name'] );
                    }
                    if (isset($_POST['delete']))
                    {
                       $sql = "DELETE  FROM `goods` WHERE name = \"".$_POST['good']."\"";
                       mysqli_query($connect, $sql);
                        header("Refresh:0");
                    }
                ?>
        </select>
        <input type="submit" name="delete" value="delete good"> 
   </form>
   <hr>
   <hr>
   <form name="delete_user" action="admin_page.php" method="post">
  <select size="1" name="user_select">
    <?php 
     $sql = "SELECT * FROM `users`";
     if ($res = mysqli_query($connect, $sql))
     {
      while ($row = mysqli_fetch_array($res))
       if($row['status'] == 'admin')
       {
        printf("<option value=\"%s\" disabled>%s</option>", $row['login'],$row['login']);
       }
       else
        printf("<option value=\"%s\">%s</option>", $row['login'],$row['login']);
     }
     if (isset($_POST['delete_usr']))
     {
      $sql = "DELETE  FROM users WHERE login = \"".$_POST['user_select']."\"";
      mysqli_query($connect, $sql);
      header("Refresh:0");
     }
    ?>
  </select>
  <input type="submit" name="delete_usr" value="delete user"> 
   </form>
   <hr>
   <form name="load_good"      action="admin_page.php" method="post">     
       <input type="submit"    name="load" value="load">
   </form>
        <?php 
        if(isset($_POST['load']))
        {
            $sql = "SELECT * FROM `goods`";
            if ($res = mysqli_query($connect, $sql))
            {
                while ($row = mysqli_fetch_array($res))
                    printf ("<b>%s</b> %s %d\n  <img width =\"200px\" src=\"%s\"> <br> <hr>", $row["name"], $row["description"],$row["price"], $row["image"]);
            }
        }
        ?>    
</body>
</html>
