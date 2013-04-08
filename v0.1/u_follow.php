<?php
	include("common/conn.php");
	$target=htmlspecialchars($_GET['uid']);
	$user=$_SESSION['uid'];
	$query="INSERT INTO f_user_relation(uid,fid) 
		VALUES('$user','$target')";
	if($mysqli->query($query)===TRUE)
	{
		header("Location:uc.php?uid=".$target);
	}
	else
		echo "<script>alert('follow failed');</script>";
?>