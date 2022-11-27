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
  $departmentid=$_POST['department_id'];
$departmentname=$_POST['department_name'];
$ret=mysqli_query($conn,"insert into department values('$departmentid','$departmentname')");
if($ret)
{
$_SESSION['msg']="Department Created Successfully !!";
}
else
{
  $_SESSION['msg']="Error : Department not created";
}
}
if(isset($_GET['del']))
      {
              mysqli_query($conn,"delete from department where dept_id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Department deleted !!";
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
    <label for="department">Add Department  </label>
    <input type="text" class="form-control" id="department_id" name="department_id" placeholder="department ID" required />
<label for="department name">Department name </label>	
<input type="text" class="form-control" id="department_name" name="department_name" placeholder="department name" required />
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
                            Manage Session
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>department ID</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$sql=mysqli_query($conn,"select * from department");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>


                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo htmlentities($row['dept_id']);?></td>
                                            <td><?php echo htmlentities($row['dept_name']);?></td>
                                            <td>
  <a href="department.php?id=<?php echo $row['dept_id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
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

