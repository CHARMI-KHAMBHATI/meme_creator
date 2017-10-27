<?php
include("includes/connection.php");
$id=$_GET['id'];
$sql="delete from `created_meme` where meme_id='$id'";
	$result=mysqli_query($conn, $sql);
			if($result)
			{
				
				header("location:users.php");
			
			}
			else 
				echo "error".mysqli_error($conn);

?>