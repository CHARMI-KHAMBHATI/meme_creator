<?php
    include("includes/connection.php");
    session_start();
	
	$output=$_GET['image'];
	
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
<html lang="en">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
<body>
<style >
.main{
    margin-left: 25%;
}
  input[type=text] {
    width: 200px;
    height: 60px;
    margin-right: 40%;
    margin-top: 10px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 10px;
    font-size: 16px;
    background-color: white;
    transition: width 0.4s ease-in-out;
}
.button
{
  background-color: #0275d8;
  width: 200px;
  height: 60px;
  border-radius: 10px;
  color:white;
  align-content:center;
}
.image 
{
  margin-left: 53%;
  border: 1px;
  width: 250px;
  height: 250px;
}
.dropbtn {
    background-color: #0275d8;
    color: white;
    padding: 16px;
    font-size: 16px;
    border-radius:10px;
    cursor: pointer;
}
.dropdown {
    position: relative;
    display: inline-block;
    margin-top: 10px;
}
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}
.dropdown a:hover {background-color: #f1f1f1}
.show {display:block;}
</style>
<div class="sidebar"></div>
<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
  <h3 class="w3-bar-item">Steps:</h3>
  <a href="captionorupload.php" class="w3-bar-item w3-button">1. Caption or Upload image.</a>
  <a href="#" class="w3-bar-item w3-button">2. Add text.</a>
</div>


<img src="<?php echo $output;?>" class="image">

<form class="image" method="post" action="meme_generator.php?image=<?php echo $output;?>" class="form-horizontal" >


<input type="text" name="top" placeholder="Top Text" class="btn btn-default">
<input type="text" name="mid" placeholder="Middle Text" class="btn btn-default">
<input type="text" name="bottom" placeholder="Bottom Text" class="btn btn-default">
<br>
<button class="button" name="preview" id="preview" class="btn btn-default">Preview</button>

<button class="button" name="save" id="save" class="btn btn-default">Save</button>

<button class="button" name="share" id="share" class="btn btn-default">Share</button>

</form>
</div>
</div>

<script>
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
