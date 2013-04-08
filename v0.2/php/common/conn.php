<?php
	if($_REQUEST==NULL)
		exit();
	$mysqli = new mysqli("localhost","root","root","fcms");
	if(mysqli_connect_errno()){
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	$mysqli->set_charset("utf8");
	session_start();
?>
