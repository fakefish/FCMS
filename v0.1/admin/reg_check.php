<?php
	include("../common/conn.php");
	$username=htmlspecialchars($_POST['username']);
	$password=md5($_POST['password']);
	$email=htmlspecialchars($_POST['email']);
	$create_time=date("Y-m-d H:i:s");
	$result=$mysqli->query("SELECT * FROM `f_user` where `username`='$username'");
	if($result->num_rows===0)
	{
		if($mysqli->query("INSERT INTO f_user(username,email,password,create_time) VALUES('$username','$email','$password','$create_time')")===TRUE)
		{
			$query_uid="SELECT `uid` FROM `f_user` WHERE `username`='$username'";
			if($result_uid=$mysqli->query($query_uid))
		    {
		        while($row_uid=$result_uid->fetch_object())
		        {
		            $uid=$row_uid->uid;
		        }
		    }
			$query_info="INSERT INTO f_user_info(uid,username,email) 
				VALUES('$uid','$username','$email')";
			if($mysqli->query($query_info)===TRUE)
			{
				echo "<script>alert('success');window.location='../index.php';</script>";
			}
			else
				echo "<script>alert('create user error');history.back();</script>";
		}
		else
		{
			echo "<script>alert('create user error');history.back();</script>";
		}
	}
	else
	{
		echo "<script>alert('username is exists.');history.back();</script>";
	}
?>