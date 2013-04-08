<?php
include("common/conn.php");
$target=htmlspecialchars($_GET['uid']);
$user=$_SESSION['uid'];
$query="DELETE FROM `f_user_relation` 
	WHERE `fid`='".$target."' AND `uid`='".$user."'";
if($mysqli->query($query)===TRUE)
{
	header("Location:uc.php?uid=".$target);
}
else
	echo "<script>alert('unfollow failed');</script>";
?>