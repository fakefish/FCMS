<?php include("common/check_login.php");?>
<!DOCTYPE html>
	<head>
		<meta charset="utf-8">
		<title>Fcms</title>
		<link rel="stylesheet" href="css/base.css">
		<link rel="stylesheet" href="css/index.css">
		<link rel="stylesheet" href="css/commit.css">
		<link rel="stylesheet" href="css/index_select.css">
	</head>
	<body>
		<header>
			<?php include("top.php");?>
		</header>
		<section>
			<article>
				<form name="re-form" method="post" id="re-form">
				<textarea placeholder="Say Something Happy" name="content" id="release-form"></textarea> 
				<span id="msg"></span>
				<span class="btnform">
					<select name="type">
					    <option value="type1">type1</option>
					    <option value="type2">type2</option>
					    <option value="type3">type3</option>
					</select>
					<input type="submit" value="RELEASE" id="releaseBtn">
				</span>
				<div id="remain"></div>
				</form>

				<div id="stream">
					<hr>
					<ul id="streamUl"></ul>
				</div>
			</article>
		</section>
		<?php include("footer.php");?>
		<script src="js/utils.js"></script>
		<script src="js/json2.js"></script>
		<script src="js/index.js"></script>
		<script src="js/release.js"></script>
		<script src="js/commit.js"></script>
		<script src="js/editstream.js"></script>
		<script src="js/retweet.js"></script>
		<script src="js/index_select.js"></script>
		<?php include("tmpl.php"); ?>
	</body>
</html>
