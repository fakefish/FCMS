<!DOCTYPE html>
<head>
	<title>Login-fcms</title>
	<link rel="stylesheet" href="../css/base.css">
	<link rel="stylesheet" href="../css/login.css">
</head>
<body>
	<fieldset >
		<legend>REGISTER</legend>
		<form id="reg-form" name="regForm" method="post" action="reg_check.php">
			<input id="username" name="username" type="text" placeholder="username" />
			<br>
			<input id="password" name="password" type="password" placeholder="password" />
			<br>
			<input id="repass" name="repwd" type="password" placeholder="repeat password" />
			<br>
			<input id="email" name="email" type="text" placeholder="email" />
			<br>
			<div id="msg"></div>
			<a href="login.php" id="regLogin">Login</a>
			<input id="regBtn" type="submit" name="submit" value="REGISTER"/>
		</form>
	</fieldset>
	<script src="../js/utils.js"></script>
	<script src="../js/register.js"></script>
</body>
</html>