<?php
include("common/conn.php");
$pid=htmlspecialchars($_REQUEST['pid']);
$query="SELECT C.pid,C.content,C.uid,U.username,C.create_time
		FROM `fcms`.`f_commit` C
		LEFT JOIN `fcms`.`f_user` U
		ON U.uid=C.uid
		WHERE C.`pid`=".$pid.
		" ORDER BY C.`create_time` ASC";
if($result=$mysqli->query($query))
{
	$len=$result->num_rows;
    while($row=$result->fetch_object())
    {
		$commit[] = array(
			'uid'	      => $row->uid,
			'username'    => $row->username,
			'content'     => $row->content,
			'create_time' => date("H:i:s Y-m-d",strtotime($row->create_time)),
			'len'		  => $len--,
		);
	}
	echo json_encode($commit);
}

?>