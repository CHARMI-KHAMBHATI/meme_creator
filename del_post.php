<?php

include("includes/connection.php");
$id=$_GET['id'];
$sql="delete from `raw_images` where img_id='$id'";
	$result=mysqli_query($conn, $sql);
			if($result)
			{
				
				header("location:users.php");
			
			}
			else 
				echo "error".mysqli_error($conn);

?>