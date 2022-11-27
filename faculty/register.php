<?php
session_start();
include('config.php');

if(isset($_POST['submit']))
{
$insid=$_POST['username'];

$password=$_POST['password'];
$name=$_POST['name'];
$designation=$_POST['designation'];
$dept=$_POST['department_id'];
$ret=mysqli_query($conn,"insert into instructor(instructor_id,fname,designation,dept,passwords) values('$insid','$name','$designation','$dept','$password')");
	if($ret)
	{
	$_SESSION['msg']="Faculty Registered Successfully !!";
	
	header('location:index.php');
	}
	else
	{
	  $_SESSION['msg']="Error : Student  not Register".mysqli_error($conn);
	}
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> Faculty Registration</title>
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
	<link href="css/cus.css" rel="stylesheet" />
</head>

<body>
<?php include('header.php');?>
    <!-- LOGO HEADER END-->


    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Faculty Registration  </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                          Faculty Registration
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>


                        <div class="panel-body">
                       <form name="dept" method="post">
   <div class="form-group">
    <label for="username">Instructor Id  </label>
    <input type="text" class="form-control" id="username" name="username" placeholder=" ID" required />
  </div>

 <div class="form-group">
    <label for="name">Name </label>
    <input type="text" class="form-control" id="name" name="name" placeholder=" Name" required />
  </div>
<div class="form-group">
    <label for="designation">Designation  </label>
    <input type="text" class="form-control" id="designation" name="designation" placeholder=" Designation" required />
  </div>



<div class="form-group">
    <label for="password">Password  </label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required />
  </div>   

 <div class="form-group">
    <label for="department_id">Department  </label>
   <select id="department_id" name="department_id">
      <?php
$sql=mysqli_query($conn,"select * from department");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
	<option value="<?php echo htmlentities($row['dept_id']);?>" ><?php echo htmlentities($row['dept_name']);?></option>
<?php
}?>
    </select>
  </div> 

 <button type="submit" name="submit" id="submit" class="btn btn-default">Submit</button>
</form>
                            </div>
                            </div>
                    </div>
                  
                </div>

            </div>





        </div>
    </div>
  <?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>



</body>
</html>

