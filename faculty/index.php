<?php
session_start();
error_reporting(0);
include('config.php');
if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
$query=mysqli_query($conn,"SELECT * FROM instructor WHERE instructor_id='$username' and passwords='$password'");
$num=mysqli_fetch_array($query);
if($num>0)
{
$extra="main.php";//
$_SESSION['clogin']=$_POST['username'];

$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$_SESSION['errmsg']="Invalid username or password";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
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
Instructor
</title>

</head>

<body>
<?php include('header.php');?>
  <!-- LOGO HEADER END-->
 <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Please Login To Enter </h4>

                </div>

            </div>
             <span style="color:red;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
            <form name="student" method="post">
            <div class="row">
                <div class="col-md-6">
                     <label>Enter Username : </label>
                        <input type="text" name="username" class="form-control" required />
                        <label>Enter Password :  </label>
                        <input type="password" name="password" class="form-control" required />
                        <hr />
                        <button type="submit" name="submit" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> &nbsp;Log Me In </button>&nbsp;
                </div>
                </form>

            </div>
        </div>
	<div style="margin-top:5%;margin-left:5%"><a href="register.php" class="btn btn-info">Register</a></div>
    </div>
	
</body>
  <?php include('footer.php');?>
 </html>

