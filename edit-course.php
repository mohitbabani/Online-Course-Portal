<?php
session_start();
error_reporting(0);
include('config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:main.html');
}
$id=($_GET['id']);
if(isset($_POST['submit']))
{
$coursecode=$_POST['course_id'];
$coursename=$_POST['course_name'];
$dept=$_POST['department_id'];
$ret=mysqli_query($conn,"update course set dept_id='$dept',course_id='$coursecode',course_name='$coursename'");
if($ret)
{
$_SESSION['msg']="Course Updated Successfully !!";
}
else
{
  $_SESSION['msg']="Error : Course not Updated ".mysqli_error($conn);
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
ADMIN | Department
</title>

</head>

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
                        <h1 class="page-head-line">Course  </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                           Course 
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>


                        <div class="panel-body">
                       <form name="dept" method="post">
<?php
$sql=mysqli_query($conn,"select * from course where course_id='$id'");
$cnt=1;

while($row=mysqli_fetch_array($sql))
{
?>

   <div class="form-group">
    <label for="course_id">Course Code  </label>
    <input type="text" class="form-control" id="course_id" name="course_id" placeholder="Course Code" value="<?php echo htmlentities($row['course_id']);?>" required />
  </div>

 <div class="form-group">
    <label for="course_name">Course Name  </label>
    <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Course Name" value="<?php echo htmlentities($row['course_name']);?>" required />
  </div>
<div class="form-group">
    <label for="department_id">Department  </label>
   <select id="department_id" name="department_id">
	<option  selected><?php echo htmlentities($row['dept_id']);?></option>
 <?php	
$sql=mysqli_query($conn,"select * from department");
$cnt=1;
while($row2=mysqli_fetch_array($sql))
{
?>
	<option value="<?php echo htmlentities($row2['dept_id']);?>" ><?php echo htmlentities($row2['dept_name']);?></option>
<?php
}?>

</select>
</div>


<?php } ?>
 <button type="submit" name="submit" class="btn btn-default"><i class=" fa fa-refresh "></i> Update</button>
</form>
                            </div>
                            </div>
                    </div>
                  
                </div>
                
            </div>





        </div>
    </div>
</body>
  <?php include('footer.php');?>
 </html>

