<!DOCTYPE html>
	<head>
		<meta charset="utf-8">
		<title>User Center-Fcms</title>
		<link rel="stylesheet" href="css/base.css">
		<link rel="stylesheet" href="css/index.css">
		<link rel="stylesheet" href="css/uc.css">
		<link rel="stylesheet" href="css/commit.css">
		<link rel="stylesheet" href="css/index_select.css">
	</head>
	<body>
	<header>
		<?php 
			include("common/check_login.php");
			include("top.php");
			include("common/conn.php");
			$uid=htmlspecialchars($_GET['uid']);
		?>
	</header>
	<section>
		<article class="fn-left">
			<div id="stream">
				<ul id="streamUl"></ul>
			</div>
		</article>
		<aside class="fn-left">
		<ul>
			<?php
				$query="SELECT * FROM `f_user_info` WHERE uid='".$uid."' LIMIT 1";
				$result=$mysqli->query($query);
				if($result->num_rows!==0)
				{
					while($row=$result->fetch_object())
					{
						$nowuser=$row->uid;
						echo "<li class='ucavatar'><img src='http://www.gravatar.com/avatar/".MD5($row->email)."?s=160'/></li>";
				  		echo "<li><i>UID:</i><span>".$row->uid."</span></li>";
				  		echo "<li><i>Username:</i><span>".$row->username."</span></li>";
						echo "<li><i>Email:</i><span>".$row->email."</span></li>";
						echo "<li><i>Info:</i><span>".$row->info."</span></li>";
					}
					if($nowuser===$_SESSION['uid'])
						// echo "<li><a href='u_info_edit.php'>edit your info</a></li>";
						;
					else
					{
						$query_relation="SELECT * FROM `f_user_relation` 
							WHERE `uid`='".$_SESSION['uid']."' AND `fid`='".$nowuser."' LIMIT 1";
						$result_relation=$mysqli->query($query_relation);
						if($result_relation->num_rows===0)
						{
							echo "<li><a href='u_follow.php?uid=".$nowuser."'>Follow</a></li>";
						}
						else
						{
							echo "<li><a href='u_unfollow.php?uid=".$nowuser."'>unFollow</a></li>";
						}
					}
				}
			?>
		</ul>
		</aside>
	</section>
	<?php include("footer.php");?>
	<script src="js/utils.js"></script>
	<script src="js/json2.js"></script>
	<script src="js/uc.js"></script>
	<script src="js/commit.js"></script>
	<script src="js/editstream.js"></script>
	<script src="js/retweet.js"></script>
	<script src="js/index_select.js"></script>
	<?php include("tmpl.php"); ?>
	</body>
</html>