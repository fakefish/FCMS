<?php 
	session_start();
	if(!isset($_SESSION['uid'])){
		header("Location:./admin/login.php");
		exit();
	} 
?>