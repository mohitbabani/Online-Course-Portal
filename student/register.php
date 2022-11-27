<?php
session_start();
include('config.php');

if(isset($_POST['submit']))
{
$studentname=$_POST['studentname'];
$studentregno=$_POST['studentregno'];
$password=$_POST['password'];
$gender=$_POST['gender'];
$year=$_POST['year'];
$dept=$_POST['department_id'];
$ret=mysqli_query($conn,"insert into student(fname,roll,passwords,gender,year_enrolled,dept_id,verify) values('$studentname','$studentregno','$password','$gender','$year','$dept','0')");
	if($ret)
	{
	$_SESSION['msg']="Student Registered Successfully !!";
	mysqli_query($conn,"insert into verify values ('$studentregno','0')");
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
    <title> Student Registration</title>
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
                        <h1 class="page-head-line">Student Registration  </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                          Student Registration
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>


                        <div class="panel-body">
                       <form name="dept" method="post">
   <div class="form-group">
    <label for="studentname">Student Name  </label>
    <input type="text" class="form-control" id="studentname" name="studentname" placeholder="Student Name" required />
  </div>

 <div class="form-group">
    <label for="studentregno">Student Reg No   </label>
    <input type="text" class="form-control" id="studentregno" name="studentregno" placeholder="Student Reg no" required />
     <span id="user-availability-status1" style="font-size:12px;">
  </div>



<div class="form-group">
    <label for="password">Password  </label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required />
  </div>   
<div class="form-group">
    <label for="gender">Gender</label>
    <input type="text" class="form-control" id="gender" name="gender" placeholder="Enter Gender" required />
  </div> 
<div class="form-group">
    <label for="year">Year enrolled  </label>
    <input type="text" class="form-control" id="year" name="year" placeholder="year enrolled" required />
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

