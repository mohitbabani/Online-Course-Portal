<?php
session_start();
error_reporting(0);
include('config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:main.html');
}

if(isset($_GET['valida']))
      {
              mysqli_query($conn,"update courseenroll set status='1' where reg='".$_GET['ros']."' and cour='".$_GET['id']."'");
                  $_SESSION['delmsg']="verification succesfull!!";
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
Student| Enrolled
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
                
<font color="red" align="center"><?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?></font>
                <div class="col-md-12">
                    <!--    Bordered Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Enrolled course
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                        	<th>Roll NO.</th>    
					<th>Course Code</th>  
                                          <th>Course Name</th>
                                            <th>Department</th>
                                             <th>Sem</th>
                                             <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$sql=mysqli_query($conn,"select * from courseenroll a inner join
 course b 
  on a.cour=b.course_id
   inner join
    department c
	on b.dept_id=c.dept_id
	  where  status='0'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>


                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            	<td><?php echo htmlentities($row['reg']);?></td>
						<td><?php echo htmlentities($row['cour']);?></td>
                                            <td><?php echo htmlentities($row['course_name']);?></td>
                                            <td><?php echo htmlentities($row['dept_name']);?></td>
                                            <td><?php echo htmlentities($row['sem']);?></td>
	                                        <td><?php echo htmlentities($row['status']);?></td>    
						<td>
                                          <a href="enroll-history.php?id=<?php echo $row['cour']?>&valida=accept &ros=<?php echo $row['reg']?>" onClick="return confirm('Verify?')">
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

