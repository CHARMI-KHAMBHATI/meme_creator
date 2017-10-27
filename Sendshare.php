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
?>

<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<html lang="en">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <style >

main{
  margin-left: 25%;
  width: 75%;
}

.buttons
{
  margin-left: 47%;
  width: 75%;
  align-content: center;

}
.button
{
  background-color:#0275d8;
  color: white;
  margin-left: 55%;
  border-radius: 7%;
  width: 15%;
  height:60%;
}
    .fa {
  padding: 20px;
  font-size: 30px;
  width: 70px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
  border-radius: 50%;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}
.fa-instagram {
  background: #125688;
  color: white;
}

.fa-pinterest {
  background: #cb2027;
  color: white;
}
.fa-flickr {
  background: #f40083;
  color: white;
}
  </style>
<body>

<div class="sidebar"></div>
<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
  <h3 class="w3-bar-item">Steps:</h3>
  <a href="captionorupload.php" class="w3-bar-item w3-button">1. Caption or Upload image.</a>
  <a href="addtext.php" class="w3-bar-item w3-button">2. Add text.</a>
  <a href="Sendshare.php" class="w3-bar-item w3-button">3. Send and Share</a>

</div>
<div class="main">
  <p>
<center><img src="oh-crap.jpg" class="image" style="margin-left: 25%"></center>
</p>
<br>
<p>
  <button class="button" onclick="" >Save:</button>
<button class="button" onclick="" >Share on:</button>
</p>
<br>
<div class="buttons">
<p>
<a href="https://www.facebook.com" class="fa fa-facebook"></a>
<a href="https://twitter.com" class="fa fa-twitter"></a>
<a href="https://www.instagram.com/?hl=en" class="fa fa-instagram"></a>
<a href="https://in.pinterest.com" class="fa fa-pinterest"></a>
<a href="https://www.flickr.com" class="fa fa-flickr"></a>
</p>
</div>
</div>
<?php include("includes/footer.php");
?>