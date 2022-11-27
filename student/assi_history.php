<?php
session_start();
error_reporting(0);
include('config.php');
if(strlen($_SESSION['blogin'])==0)
    {   
header('location:index.php');
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
<?php if($_SESSION['blogin']!="")
{
 include('menu.php');
}?>
                
<font color="red" align="center"><?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?></font>
                <div class="col-md-12">
                    <!--    Bordered Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Assignemnt
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Course Code</th>
                                            
                                            <th>Assignment details</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$sql=mysqli_query($conn,"select * from courseenroll a inner join
 assignment b 
  on a.cour=b.course_id
   	  where reg='".$_SESSION['blogin']."'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>


                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo htmlentities($row['cour']);?></td>
                                            <td><?php echo htmlentities($row['details']);?></td>
						<td><?php echo htmlentities($row['assignment_id']);?></td>


                                             
						
                                          
                                        </tr>
<?php 
$cnt++;
} ?>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select File to Upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
 <div class="form-group">
    <label for="assignment_id">assignment_id </label>
    <input type="text" class="form-control" id="assignment_id" name="assignment_id" placeholder="assignment ID" required />
 </div>    
<input type="submit" name="submit" value="Upload">

</form>

                                        
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

