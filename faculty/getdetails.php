<?php
session_start();
error_reporting(0);
include('config.php');

?>
<!Doctype html>
<html>
<head>
<link rel="stylesheet" href="css/cus.css">
<link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
<title>
Instructor
</title>

</head>

<body>
<?php include('header.php');?>
<?php include('menu.php');?>
  <!-- LOGO HEADER END-->
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
						<th>Roll</th>
                                            <th>Assignment id</th>
                                            
                                            <th>Assignment details</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$sql=mysqli_query($conn,"select * from given a join assignment b on a.assignment_id=b.assignment_id ");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>


                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo htmlentities($row['reg']);?></td>
						<td><?php echo htmlentities($row['assignment_id']);?></td>
<td><?php echo htmlentities($row['details']);?></td>



                                             
						
                                          
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

