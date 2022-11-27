<?php
session_start();
error_reporting(0);
include('config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:main.html');
}

if(isset($_POST['submit']))
{
$coursecode=$_POST['course_id'];
$coursename=$_POST['course_name'];
$dept=$_POST['department_id'];
$seme=$_POST['sem'];
$ins=$_POST['instructor_id'];
$ret=mysqli_query($conn,"insert into course (`dept_id`, `course_id`, `course_name`,`sem`,`teacher`) values('$dept','$coursecode','$coursename','$seme','$ins')");
if($ret)
{
$_SESSION['msg']="Course Created Successfully !!";
}
else
{
  $_SESSION['msg']="Error : Course not created".mysqli_error($conn);
}
}
if(isset($_GET['del']))
      {
              mysqli_query($conn,"delete from course where course_id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Course deleted !!";
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
   <div class="form-group">
    <label for="course_id">Course Code  </label>
    <input type="text" class="form-control" id="course_id" name="course_id" placeholder="Course Code" required />
  </div>

 <div class="form-group">
    <label for="course_name">Course Name  </label>
    <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Course Name" required />
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
<div class="form-group">
    <label for="instructor_id">Instructor</label>
   <select id="instructor_id" name="instructor_id">
      <?php
$sql=mysqli_query($conn,"select * from instructor");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
	<option value="<?php echo htmlentities($row['instructor_id']);?>" ><?php echo htmlentities($row['fname'])."   ";?><?php echo htmlentities($row['dept']);?><?php echo "    ".htmlentities($row['instructor_id']);?></option>
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
<button type="submit" name="submit" class="btn btn-default">Submit</button>
</form>
                            </div>
                            </div>
                    </div>
                  
                </div>
                <font color="red" align="center"><?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?></font>
                <div class="col-md-12">
                    <!--    Bordered Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Course
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Course Code</th>
                                            <th>Course Name </th>
                                            
                                            <th>Department</th>
                                             <th>Sem</th>
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$sql=mysqli_query($conn,"select * from course");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>


                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo htmlentities($row['course_id']);?></td>
                                            <td><?php echo htmlentities($row['course_name']);?></td>
                                            <td><?php echo htmlentities($row['dept_id']);?></td>
                                            <td><?php echo htmlentities($row['sem']);?></td>
                                            <td>
                                            <a href="edit-course.php?id=<?php echo $row['course_id']?>">
<button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> </a>                                        
  <a href="course.php?id=<?php echo $row['course_id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
                                            <button class="btn btn-danger">Delete</button>
</a>
                                            </td>
                                        </tr>
<?php 
$cnt++;
} ?>

                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     <!--  End  Bordered Table  -->
                </div>
            </div>





        </div>
    </div>
</body>
  <?php include('footer.php');?>
 </html>

