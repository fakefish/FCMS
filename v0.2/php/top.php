<nav>
	<a href="index.php">FCMS</a>
	<span id="search-form">
		<form name="searchForm" method="get" action="php/search.php" style="display:inline">
		<input class="search" placeholder="search" type="text" name="content">
		<input type="submit" value="search" id="searchBtn">
		</form>	 
	</span>
	<span id="uc">
	<?php
		$uid=$_SESSION['uid'];
		$username=$_SESSION['username'];
		echo "welcome <a href='php/uc.php?uid=".$uid."'>".$username."</a>";
	?>
	<a href="php/login.php?action=logout">LOGIN OUT</a>
	</span>
</nav>