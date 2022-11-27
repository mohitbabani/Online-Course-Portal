<?php
session_start();
error_reporting(0);
include('config.php');
if(strlen($_SESSION['clogin'])==0)
    {   
header('location:index.php');
}
if(isset($_POST['submit']))
{
  $assignment_number=$_POST['assignment_number'];
$course=$_POST['course'];
$details=$_POST['details'];
$ret=mysqli_query($conn,"INSERT INTO `assignment`(`course_id`, `assignment_id`, `details`) VALUES ('$course','$assignment_number','$details')");
if($ret)
{
$_SESSION['msg']="ASSIGNMENT Created Successfully !!";
}
else
$_SESSION['msg']="failed !!".mysqli_error($conn);

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
Faculty| Enrolled
</title>

</head>

<body>
<body>
<?php include('header.php');?>
  <!-- LOGO HEADER END-->
<?php if($_SESSION['clogin']!="")
{
 include('menu.php');
}?>
                
<div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Department  </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                           Department 
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>


                        <div class="panel-body">
                       <form name="dept" method="post" >
   <div class="form-group">
    <label for="course">course </label>
   <select id="course" name="course">
      <?php
$sql=mysqli_query($conn,"select * from course a inner join instructor b on a.teacher=b.instructor_id where teacher='".$_SESSION['clogin']."'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
	<option value="<?php echo htmlentities($row['course_id']);?>" ><?php echo htmlentities($row['course_id']);?></option>
<?php
}?>
    </select>
</div>
<div class="form-group">
 <label for="assignment_number">Add assignment number </label>
    <input type="text" class="form-control" id="assignment_number" name="assignment_number" placeholder="assignment_number" required /> 
</div> 
<div class="form-group">
 <label for="details">Add assignment details  </label>
    <input type="text" class="form-control" id="details" name="details" placeholder="details" required /> 
</div> 
</div> 

 <button type="submit" name="submit" class="btn btn-default">Submit</button>
</form>
                            </div>
                            </div>
                    </div>
                  
                </div>
</body>
  <?php include('footer.php');?>
 </html>

