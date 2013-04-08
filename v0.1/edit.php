<?php
// if(!isset($_REQUEST))
// 	exit();
include("common/conn.php");
$pid=$_REQUEST['pid'];
$action=$_REQUEST['action'];
if($action=="edit")
{
	$content=$_REQUEST['content'];
	$query="UPDATE  `fcms`.`f_post` 
			SET  `content` =  '".$content."'
			WHERE  `f_post`.`id`=".$pid;
} else if($action=="delete")
{
	$query="DELETE FROM `fcms`.`f_post` WHERE `f_post`.`id`=".$pid;
}
if($mysqli->query($query)==TRUE)
{
	echo "success";
}
else
{
	echo "failed";
}
?>