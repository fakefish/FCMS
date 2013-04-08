<?php
include("common/conn.php");
$type=htmlspecialchars($_REQUEST['type']);
$uid=$_SESSION['uid'];
$content=htmlspecialchars($_REQUEST['content']);
$content=mysql_escape_string($content);
if(strlen($content)>420){
	exit();
}
$create_time=date("Y-m-d H:i:s");
$checkstate='1';
$query="INSERT INTO f_post(type,uid,content,create_time,checkstate) 
	VALUES('$type','$uid','$content','$create_time','$checkstate')";
$queryId="SELECT P.`id` FROM `f_post` P WHERE `uid`=".$uid." ORDER BY P.`id` DESC LIMIT 1";

if($mysqli->query($query)===TRUE){
	if($pids=$mysqli->query($queryId))
	{
		while($id=$pids->fetch_object())
		{
			$pid=$id->id;
		}	
	}
	$result = array(
		'id'=>$pid,
		'type'=>$type,
		'uid'=>$uid,
		'content'=>$content,
		'create_time'=>date("H:i:s Y-m-d",strtotime($create_time)),
		'editable'=>true
	);
	echo json_encode($result);
}
else
	exit();
?>