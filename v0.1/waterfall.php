<?php
	$count=$_REQUEST['count'];
	$num=$count*4;
	$len=4;
    $action=$_REQUEST['action'];
	include("common/conn.php");
    if($action=="index")
	   $query = "SELECT P.`content`,P.`create_time`,P.`uid`,P.`id`
                FROM `f_post` P 
                WHERE `uid` 
                IN (
                    SELECT R.`fid` 
                    FROM   `f_user_relation` R
                    WHERE  R.`uid`=".$_SESSION['uid']."
                    )
				OR P.`uid`=".$_SESSION['uid']."
                ORDER BY P.`create_time` DESC LIMIT ".$num.",".$len; 
    else if($action=="uc")
    {
        $uid=$_REQUEST['uid'];
        $query="SELECT P.`content`,P.`create_time`,P.`uid`,P.`id` 
                FROM `f_post` P 
                WHERE uid=".$uid."
                ORDER BY P.`create_time` DESC LIMIT ".$num.",".$len; 
    }
    if($result=$mysqli->query($query))
    {
        while($row=$result->fetch_object())
        {
            $query_username = "SELECT * FROM `f_user` WHERE `uid`='".$row->uid."'";
            if($result_username=$mysqli->query($query_username))
            {
                while($row_username=$result_username->fetch_object())
                    $username=$row_username->username;
            }
            $editable=false;
            if($username==$_SESSION['username'])
            {
                $editable=true;
            }
            $temp[]=array(
                'user'=>$username,
                'uid'=>$row->uid,
                'content'=>$row->content,
                'create_time'=>date("H:i:s Y-m-d",strtotime($row->create_time)),
                'id'=>$row->id,
                'editable'=>$editable
            );
        }
        echo json_encode($temp);
    }
    
?>