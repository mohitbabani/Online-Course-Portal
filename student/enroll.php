<?php
session_start();
error_reporting(0);
include('config.php');
if(strlen($_SESSION['blogin'])==0)
    {   
header('location:index.php');
}
if(isset($_POST['submit']))
{
$studentregno=$_POST['studentregno'];


$dept=$_POST['department_id'];

$sem=$_POST['sem'];
$ret=mysqli_query($conn,"select * from course where dept_id='".$dept."' and sem='".$sem."'");
if($ret)
{
	while($row=mysqli_fetch_array($ret))
	{
		mysqli_query($conn,"insert into courseenroll values('".$_SESSION['blogin']."','".$row[course_id]."','0' )");
					
		$_SESSION['msg']="Enrolled ".mysqli_error($conn);
	}
$_SESSION['msg']="Enrolled succesfully";
}
else
{
  $_SESSION['msg']="Error : Not Enroll";
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
<div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Course Enroll </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                          Course Enroll
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>
<?php $sql=mysqli_query($conn,"select * from student where roll='".$_SESSION['blogin']."'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{ ?>

                        <div class="panel-body">
                       <form name="dept" method="post" enctype="multipart/form-data">
  
 <div class="form-group">
    <label for="semester">Roll NO.  </label>
    <input type="text" class="form-control" id="studentregno" name="studentregno" value="<?php echo htmlentities($row['roll']);?>"  placeholder="Student Reg no" readonly />
    
  </div>

 <?php } ?>

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
 <div class="form-group">
    <label for="sem">Semester  </label>
   <select id="sem" name="sem">
      <?php
$sql=mysqli_query($conn,"select * from semester");

while($row=mysqli_fetch_array($sql))
{
?>
	<option value="<?php echo htmlentities($row['cursem']);?>" ><?php echo htmlentities($row['cursem']);?></option>
<?php
}?>
    </select>
  </div>









 <button type="submit" name="submit" id="submit" class="btn btn-default">Enroll</button>
</form>
                            </div>
                            </div>
                    </div>
                  
                </div>

            </div>





        </div>
    </div>
<span style="color:red;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
</body>
  <?php include('footer.php');?>
 </html>

