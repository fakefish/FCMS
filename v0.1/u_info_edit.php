<?php include("common/check_login.php");?>
<!DOCTYPE html>
	<head>
		<meta charset="utf-8">
		<title>Fcms</title>
		<link rel="stylesheet" href="css/base.css">
		<link rel="stylesheet" href="css/index.css">
	</head>
	<body>
	<header>
		<?php include("top.php");?>
	</header>
	<section>
	<?php
		include("common/conn.php");
		$uid=$_SESSION['uid'];
		$query="SELECT * FROM `f_user_info` WHERE uid='".$uid."' LIMIT 1";
		$result=$mysqli->query($query);
		if($result->num_rows!==0)
		{
			while($row=$result->fetch_object())
			{
				$email=$row->email;
				$info=$row->info;
			}
		}
	?>
	<fieldset>
		<legend>Edit Your Info</legend>
		<form id="info-edit" name="u_info_edit" method="post" action="u_info_edit.php">
		<textarea id="info" name="info" placeholder="info"></textarea>
		<br>
		<input type="submit" name="submit" value="Save"/>
		</form>
	</fieldset>
	<?php
		if(isset($_POST['info']))
		{
			$info=htmlspecialChars($_POST['info']);
			$query="UPDATE `f_user_info` SET  `info` = '".$info."'
				WHERE  `f_user_info`.`uid` ='".$uid."'";
			if($result=$mysqli->query($query))
			{
				header("Location:uc.php?uid=".$uid);
			}
		}
	?>
	</section>
		<footer>&copy;fakefish</footer>
		<script src="js/index.js"></script>
	</body>
</html>