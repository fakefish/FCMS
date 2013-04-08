<?php
	include("common/conn.php");
	$uid=htmlspecialchars($_REQUEST['uid']);
	$query="SELECT *
			FROM `f_user_info` P
			WHERE P.`uid`=".$uid."
			";
	if($result=$mysqli->query($query))
	{
		while($row=$result->fetch_object())
		{
			$info=array(
				'uid'=>$row->uid,
				'username'=>$row->username,
				'info'=>$row->info,
				'avatar'=>MD5($row->email),
				// 'bgm'=>$row->bgm,
			);
		}
		echo json_encode($info);
	}
?>