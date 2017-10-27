<?php
    include("includes/connection.php");
    session_start();
    $admin_result = 0;
    if(isset($_SESSION['uid']))
    {
        $id = $_SESSION['uid'];
        $admin_query = "SELECT admin FROM `users` WHERE id = $id";
        $admin_result = mysqli_query($conn,$admin_query);
        $admin_result = mysqli_fetch_array($admin_result);
    }
?>
<?php include("includes/header.php");
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<head>
</head>
<body>
<div class="sidebar"></div>
<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
  <h3 class="w3-bar-item">Steps:</h3>
  <a href="captionorupload.php" id="caption" class="w3-bar-item w3-button">1. Caption or Upload image.</a>
  <a href="addtext.php" id="text" class="w3-bar-item w3-button">2. Add text.</a>
  <a href="Sendshare.php" id="send" class="w3-bar-item w3-button">3. Send and Share</a>
</div>

<?php include('includes/footer.php');?>