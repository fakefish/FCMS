<?php
include("common/conn.php");
$uid=$_REQUEST['uid'];
$content=htmlspecialchars($_REQUEST['content']);
$content=mysql_escape_string($content);
$pid=$_REQUEST['pid'];
$create_time=date("Y-m-d H:i:s");
$query="INSERT INTO f_commit(uid,pid,content,create_time)
		VALUES('$uid','$pid','$content','$create_time')";
if($mysqli->query($query)===TRUE){
	$result = array(
		'uid'         => $uid,
		'pid'         => $pid,
		'content'     => $content,
		'username'    => $_SESSION['username'],
		'create_time' => date("H:i:s Y-m-d",strtotime($create_time))
	);
	echo json_encode($result);
}
else
	exit();
?>