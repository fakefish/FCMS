<?php
if($_POST===null){
	exit();
}
include("../common/conn.php");
$email=htmlspecialchars($_POST['email']);
$password=md5($_POST['password']);
$query="SELECT * FROM `f_user` 
	WHERE email='$email' AND password='$password' LIMIT 1";
if($result=$mysqli->query($query))
{
	while($row=$result->fetch_object())
	{
		$_SESSION['username']=$row->username;
		$_SESSION['uid']=$row->uid;
	}
	header("Location:../index.php");
}
else
{
	echo "<script>alert('email or password is wrong');history.back();</script>";
}
?>