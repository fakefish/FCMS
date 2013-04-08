<?php
	include("../common/conn.php");
	$email=htmlspecialchars($_REQUEST['email']);
	$query="SELECT * FROM `f_user` WHERE `email`='$email'";
	$result=$mysqli->query($query);
	if($result->num_rows!==0)
	{
		echo "exits";
	}
	else
	{
		echo "none";
	}
?>