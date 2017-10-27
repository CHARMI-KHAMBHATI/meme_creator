<?php

include("includes/connection.php");
session_start();
$uid=$_SESSION['uid'];
$target_dir = "raw_images/";
$target_file = $target_dir . basename($_FILES["pic"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$name=$_FILES["pic"]["name"];




$descp=$_POST["description"];



	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["pic"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["pic"]["size"] > 8000000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
		
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) 
		{
			
			$sql="INSERT INTO raw_images(id,description,image) VALUES('$uid','$descp','$target_file')";
			$result=mysqli_query($conn, $sql);
			if($result)
			{

				header("location:captionorupload.php");
			
			}
			else echo "error with pic".mysqli_error($conn);
		
			
		}  
		
		else 
		{
			echo "Sorry, there was an error uploading your file.";
		}
	}

?>