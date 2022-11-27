<?php
session_start();
error_reporting(0);
$host="localhost";
$user="root";
$password="";
$db="campus";
$con=mysqli_connect($host,$user,$password);
mysqli_select_db($con,$db);



	
$uname=$_POST['username'];
	$password=$_POST['userpassword'];
	$sql="select *from admina where user_id='".$uname."' AND passworde='".$password."' LIMIT 1";
	$result=mysqli_query($con,$sql);

	if(mysqli_num_rows($result)==1)
	{
		echo "you have succesfully logged in";
$extra="admin.php";//
$_SESSION['alogin']=$_POST['username'];

$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
		exit();
	}
	else
		{
echo "you have succesfully logged in";
$extra="main.html";//
$_SESSION['alogin']=$_POST['username'];

$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
		exit();
	}

?>
