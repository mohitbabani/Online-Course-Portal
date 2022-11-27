<?php
session_start();
error_reporting(0);
include('config.php');

if(strlen($_SESSION['clogin'])==0)
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
 <?php include('menu.php');?>


<span style="color:red;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
</body>
  <?php include('footer.php');?>
 </html>

