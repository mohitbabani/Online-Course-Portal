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
Faculty|Profile
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
                        <h1 class="page-head-line">Faculty Profile </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                          Faculty Profile
                        </div>

					<?php $sql=mysqli_query($conn,"select * from instructor where instructor_id='".$_SESSION['clogin']."'");
					$cnt=1;
					while($row=mysqli_fetch_array($sql))
					{ ?>

								<div class="panel-body">
							       <form name="dept" method="post" enctype="multipart/form-data">
					   <div class="form-group">
					    <label for="studentname">Instructor Name  </label>
					    <input type="text" class="form-control" id="studentname" name="studentname" value="<?php echo htmlentities($row['fname']);?>" readonly  />
					  </div>

					 <div class="form-group">
					    <label for="studentregno">Instructor ID  </label>
					    <input type="text" class="form-control" id="studentregno" name="studentregno" value="<?php echo htmlentities($row['instructor_id']);?>"  placeholder="Student Reg no" readonly />
					    
					  </div>



					

					<div class="form-group">
					    <label for="CGPA">Deptartment </label>
					    <input type="text" class="form-control" id="cgpa" name="cgpa"  value="<?php echo htmlentities($row['dept']);?>" readonly />
					  </div>  
<div class="form-group">
					    <label for="CGPA">Designation</label>
					    <input type="text" class="form-control" id="cgpa" name="cgpa"  value="<?php echo htmlentities($row['designation']);?>" readonly />
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

