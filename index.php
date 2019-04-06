<?php
	session_start();
	$_PZDC = "internet_magazin/goods.php";
	include ("internet_magazin/reg.php");
	include ("internet_magazin/log.php");
	if (isset($_POST['logout']))
	{
		session_destroy();
		header('Location: index.php');
	}
	if (isset($_POST['lol']))
			$_PZDC = "internet_magazin/bask.php";
	error_reporting(E_ERROR | E_PARSE);
	$res = $_SESSION['status'] == "admin" ? $_SESSION['page'] : $_PZDC; 
?>
<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="script.js"></script>
	<meta charset="UTF-8">
	<title>Shop</title>
</head>
<body>
	<div id="main" class="shadow">
		<div id="header">
			<div id="profile">
				<?php
				if (isset($_SESSION['login']))
				{
						echo ("<div id='signed' class='profile-top' >Hi, ".$_SESSION['login']."</div>");
						echo ("<div class='profile-bottom'><form name ='lg_out' method = 'POST' action =\"index.php\"><input id='logout' type='submit' name = 'logout' value = 'Logout' ></form></div>");
				}
				else
				{
						echo ("<div id='sign-in' class='profile-top'>Sign In</div>");
						echo ("<div id='sign-up' class='profile-bottom'>Sign Up</div>");
				}
				?> 
			</div>
			<!-- <div id="logo"></div> -->
			<form action="" method="post">
		 <div id="basket"> <button name = "lol" style = "height: 40px; width: 70px; opacity: 0;"> </button></div>
		</form>
		</div>
		<br/>
<iframe id="myIframe" name="myIframe" src="<?php echo($res); ?>" height="400px"width="100%">
		 </iframe>
	</div>
	<div id="sign-up-form"  onSubmit="return checkPw();" class="signing-forms shadow">
		<div id="close-sign-up-form"  class="close-button"  onclick="close_up('sign-up-form')"></div>
		<div class="form-title">Sign Up</div>
		<form class="sign-form" action="index.php" method="POST">
			Username:
			<input class="sign-input" type="text" name="login" required="true" value="" />
			<br />
			<br /> Password:
			<input class="sign-input" type="password" name="pw1" id = "pw1" required="true" value="" />
			<br />
			<br /> Confirm Password:
			<input class="sign-input" type="password" name="pw2" id = "pw2" required="true"  value="" />
			<br />
			<br />
			<input class="sign-submit" type="submit" name="register" value="Sign Up" />
		</form>
	</div>
	<div id="sign-in-form" class="signing-forms shadow">
		<div id="close-sign-in-form" class="close-button" onclick="close_up('sign-in-form')"></div>
		<div class="form-title">Sign In</div>
		<form class="sign-form" action="index.php" method="POST">
			Username:
			<input class="sign-input" type="text" name="login_l" value="" />
			<br />
			<br /> Password:
			<input class="sign-input" type="password" name="passwd_l" value="" />
			<br />
			<br />
			<input class="sign-submit" type="submit" name="sign_in" value="Sign In" />
		</form>
		<div id="error-pass"></div>
	</div>

	<div id="basket-page" class="shadow">
		<div id="close-basket-page" class="close-button"></div>
		<div class="form-title">Basket</div>
	</div>
	<div id="success-order-form" class="signing-forms shadow">
		<div id="close-success-order-form" class="close-button"></div>
		<div class="form-title">Your order has been placed</div>
		<div class="form-text">Your order number is
			<div id="order-nbr-str">1000000</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	function checkPw() 
	{
		var pw1 =  document.getElementById('pw1').value;
		var pw2 = document.getElementById('pw2').value;
		if (pw1 != pw2)
		{
			alert ("\nВы ввели в поле \"Повторить\" пароль отличный от введенного в поле \"Пароль\".")
			return false;
		}
		else return true;
	}
	function close_up(id)
	{
		document.getElementById(id).style.visibility='hidden';
		document.getElementById(id).style.opacity = 0;
	}
</script>
</html>