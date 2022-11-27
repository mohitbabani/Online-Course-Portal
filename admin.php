<?php
session_start();
error_reporting(0);
include('config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:main.html');
}


if(isset($_POST['submit']))
{	$sql="select * from admina where user_id='".$_SESSION['alogin']."' AND passworde='".$_POST['cpass']."' LIMIT 1";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)==1)
		{
		 $con=mysqli_query($conn,"update admina set passworde='".$_POST['newpass']."'where user_id='".$_SESSION['alogin']."'");
		$_SESSION['msg']="Password Changed Successfully !!";
		}
	else
	{
	$_SESSION['msg']="Old Password not match !!";
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
ADMIN PANEL
</title>

</head>
<script type="text/javascript">
function valid()
{
if(document.chngpwd.cpass.value=="")
{
alert("Current Password Filed is Empty !!");
document.chngpwd.cpass.focus();
return false;
}
else if(document.chngpwd.newpass.value=="")
{
alert("New Password Filed is Empty !!");
document.chngpwd.newpass.focus();
return false;
}
else if(document.chngpwd.cnfpass.value=="")
{
alert("Confirm Password Filed is Empty !!");
document.chngpwd.cnfpass.focus();
return false;
}
else if(document.chngpwd.newpass.value!= document.chngpwd.cnfpass.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.chngpwd.cnfpass.focus();
return false;
}
return true;
}
</script>
<body>
<body>
<?php include('header.php');?>
  <!-- LOGO HEADER END-->
<?php if($_SESSION['alogin']!="")
{
 include('menu.php');
}?>
 <!-- MENU SECTION END-->
	 <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Admin Change Password </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                           Change Password
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>


                        <div class="panel-body">
                       <form name="chngpwd" method="post" onSubmit="return valid();">
   <div class="form-group">
    <label for="exampleInputPassword1">Current Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="cpass" placeholder="Password" />
  </div>
   <div class="form-group">
    <label for="exampleInputPassword1">New Password</label>
    <input type="password" class="form-control" id="exampleInputPassword2" name="newpass" placeholder="Password" />
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputPassword3" name="cnfpass" placeholder="Password" />
  </div>
 
  <button type="submit" name="submit" class="btn btn-default">Submit</button>
                           <hr />
   



</form>
                            </div>
                            </div>
                    </div>
                  
                </div>
        </div>
    </div>

</body>
  <?php include('footer.php');?>
 </html>

