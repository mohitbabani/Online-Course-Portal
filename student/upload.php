<?php
session_start();
include('config.php');
$target_dir = "/opt/lampp/upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$fileName=basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
$ass=$_POST['assignment_id'];

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {

    if ($target_file == "upload/") {
        $msg = "cannot be empty";
        $uploadOk = 0;
    } // Check if file already exists
    else if (file_exists($target_file)) {
        $msg = "Sorry, file already exists.";
        $uploadOk = 0;
    } // Check file size
    // Check if $uploadOk is set to 0 by an error
    else if ($uploadOk == 0) {
        $msg = "Sorry, your file was not uploaded.";

        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $msg = "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
		 $insert = mysqli_query($conn,"INSERT into given (file_name,reg, assignment_id,statu) VALUES ('".$fileName."','".$_SESSION['blogin']."','".$ass."','1')");
	if($insert)
			echo "succesful";
	else
		echo "".mysqli_error($conn);
		
        }
    }
}

?>
