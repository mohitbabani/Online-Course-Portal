<?php
session_start();
error_reporting(0);
include('config.php');

if(strlen($_SESSION['blogin'])==0)
    {   
header('location:index.php');
}
?>
<!Doctype html>
<html>
<head>
<link rel="stylesheet" href="css/cus.css">
<link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
<title>
Student
</title>

</head>

<body>
<?php include('header.php');?>
  <!-- LOGO HEADER END-->
 	<?php $query=mysqli_query($conn,"SELECT * FROM student WHERE roll='".$_SESSION['blogin']."' and verify='1' "); 

$num=mysqli_fetch_array($query);
if($num>0)
{  include('menu.php');
}
else
{
	$_SESSION['errmsg']="admin approval pending";
}
?>
<span style="color:red;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
</body>
  <?php include('footer.php');?>
 </html>

