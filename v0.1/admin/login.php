<?php
	session_start();
	if(isset($_SESSION['uid'])){
		header("Location:../index.php");
	} 
?>
<!DOCTYPE html>
<head>
	<title>Login-fcms</title>
	<link rel="stylesheet" href="../css/base.css">
	<link rel="stylesheet" href="../css/login.css">
</head>
<body>
	<img src="" id="background">
	<div id="login-form">
		<form name="LoginForm" id="loginForm" method="post" action="login_check.php">
			<div id="main">
				<input id="email" name="email" type="email" placeholder="email" />
				<input id="password" name="password" type="password" placeholder="password" />
			</div>
			<span id="msg"></span>
			
			<input type="submit" id="login" name="submit" value="GO"/>
		</form>
	</div>

	<?php
	if($_GET['action']=="logout")
	{
		unset($_SESSION['uid']);
		unset($_SESSION['username']);
		header("Location:login.php");
	}
	?>
	<script src="../js/utils.js"></script>
	<script src="../js/login.js"></script>
</body>
</html>