<?php 
include("includes/connection.php");
    session_start();
    $admin_result = 0;
    if(isset($_SESSION['uid']))
    {
        $id = $_SESSION['uid'];
        $admin_query = "SELECT admin FROM `users` WHERE id = $id";
        $admin_result = mysqli_query($conn,$admin_query);
    }
?>
<?php include("includes/header.php");
	$uid=$_SESSION['uid'];
	
	
	$sql= "select * from created_meme natural join users where id ='$uid'";
	$result=mysqli_query($conn, $sql);
	if(empty($row=mysqli_fetch_array($result))){
		?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
	<script>
	myFunction();
	function myFunction() {
		var txt;
		var r = confirm("Sorry you do not have any images yet. Please try edit a new image !");
		if (r == true) {
			
		} else {
			
		}
		
	}
	</script>
	
	<style type="text/css">
		  .imagedisplay
         {
            width: 100px;
            height: 100px;
            display:inline-block;
            position: relative;
            white-space: nowrap;
         }
         .image
         {
  			width: 100px;
  			height: 100px;
  			position: absolute;
  			overflow: hidden;
  			white-space: nowrap;
         }
	</style>
	<?php
	}
	?>
	<br>
	<br>
	<center><h3>
	<?php echo "Your Meme's";?>
	</center>
	<?php
	while($row=mysqli_fetch_array($result))
	{ 
		?>
		<center>
		<div class="imagedisplay"  style="align-content: left; padding : 40px" >
		
		<img src="<?php echo $row['image_location']?>" class="myimage">
		
		<form action="del_meme.php?id=<?php echo $row['meme_id']?>" method="post">
		<a id="download" href="<?php echo $row['image_location']?>" download="<?php echo $row['image_location']?>" class="myimage">
		Download it    </a>
		<button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" name="delete" id="delete">delete <span class="glyphicon glyphicon-trash"></span></button>
		</form>
		</div>
	</center>
		

		<?php
	}
	?> </div>
	
	<div>
	<?php
	$sql= "select * from raw_images natural join users where id ='$uid'";
	$result=mysqli_query($conn, $sql);
	?>
	<br>
	<br>
	<center><h3>
	<?php echo "Your uploads";?>
	</center>
	<?php
	while($row=mysqli_fetch_array($result))
	{ 
		?>
		<center>
		<div class="imagedisplay" style="align-content: left; padding : 40px">
		<img src="<?php echo $row['image']?>" class="myimage">
		
		<form action="del_post.php?id=<?php echo $row['img_id']?>" method="post">
		<a id="download" href="<?php echo $row['image']?>" download="<?php echo $row['image']?>" class="myimage">
		Download it     </a>
		<button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" name="delete" id="delete">delete <span class="glyphicon glyphicon-trash"></span></button>
		</form>
		
		</div>
		</div>
	</center>
	

		<?php
	}
?>
</div>

<?php include('includes/footer.php'); ?>