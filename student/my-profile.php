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
Student|Profile
</title>

</head>

<body>
<?php include('header.php');?>
  
<!-- LOGO HEADER END-->
<?php include('menu.php');?>
  <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Student Profile </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                          Student Profile
                        </div>

					<?php $sql=mysqli_query($conn,"select * from student where roll='".$_SESSION['blogin']."'");
					$cnt=1;
					while($row=mysqli_fetch_array($sql))
					{ ?>

								<div class="panel-body">
							       <form name="dept" method="post" enctype="multipart/form-data">
					   <div class="form-group">
					    <label for="studentname">Student Name  </label>
					    <input type="text" class="form-control" id="studentname" name="studentname" value="<?php echo htmlentities($row['fname']);?>" readonly  />
					  </div>

					 <div class="form-group">
					    <label for="studentregno">Student Reg No   </label>
					    <input type="text" class="form-control" id="studentregno" name="studentregno" value="<?php echo htmlentities($row['roll']);?>"  placeholder="Student Reg no" readonly />
					    
					  </div>



					<div class="form-group">
					    <label for="Pincode">Year Enrolled  </label>
					    <input type="text" class="form-control" id="Pincode" name="Pincode" readonly value="<?php echo htmlentities($row['year_enrolled']);?>" readonly />
					  </div>   

					<div class="form-group">
					    <label for="CGPA">Deptartment </label>
					    <input type="text" class="form-control" id="cgpa" name="cgpa"  value="<?php echo htmlentities($row['dept_id']);?>" readonly />
					  </div>  

 <?php } ?>

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

