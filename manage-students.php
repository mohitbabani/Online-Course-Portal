<?php
session_start();
error_reporting(0);
include('config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:main.html');
}

if(isset($_GET['com']))
      {
              mysqli_query($conn,"update verify set status = '1' where reg='".$_GET['id']."' ");
                  $_SESSION['delmsg']="Verification successful !!";
		 mysqli_query($conn,"update student set verify = '1' where roll='".$_GET['id']."' ");
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
 
                <font color="red" align="center"><?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?></font>
                <div class="col-md-12">
                    <!--    Bordered Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Student
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Roll No.</th>
                                            <th>verify</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$sql=mysqli_query($conn,"select * from verify where status='0'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>


                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo htmlentities($row['reg']);?></td>
                                            <td><?php echo htmlentities($row['status']);?></td>
                                            <td>
  <a href="manage-students.php?id=<?php echo $row['reg']?>&com=complete" onClick="return confirm(verify?')">
                                            <button class="btn btn-danger">Verify</button>
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

