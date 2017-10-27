<?php include("includes/header.php");
    if(isset($_SESSION['uid']))
    {
            header("Location: index.php"); 
    }
    include("configdb.php");
 ?>
<?php
    $error = "";      
    if (array_key_exists("submit", $_POST)) {
        include("includes/connection.php");
        if (!$_POST['email']) {        
            $error .= "*An Email is required<br>";            
        }        
        if (!$_POST['password']) {           
            $error .= "*A Password is required<br>";           
        }        
        if ($error == "") {                           
                $query = "SELECT id FROM `users` WHERE email = '".mysqli_real_escape_string($conn, $_POST['email'])."' LIMIT 1";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {
                    $error = "User with that Email already exists.";
                } 
                else {
                    $hash = md5( rand(0,1000) );
                    $query = "INSERT INTO `users` (`username`,`email`, `password`,`hash`) VALUES ('".mysqli_real_escape_string($conn, $_POST['username'])."','".mysqli_real_escape_string($conn, $_POST['email'])."', '".mysqli_real_escape_string($conn, $_POST['password'])."','".mysqli_real_escape_string($conn, $hash)."')";
                    if (!mysqli_query($conn, $query)) {
                        $error = "<p>Could not sign you up - please try again later.</p>";
                    } 
                    else {
                        $query = "UPDATE `users` SET password = '".md5(md5(mysqli_insert_id($conn)).$_POST['password'])."' WHERE id = ".mysqli_insert_id($conn);                        
                        $id = mysqli_insert_id($conn);                   
                        mysqli_query($conn, $query);                     
                        session_start();
                        $_SESSION['uid'] = $id;
                        header("Location: captionorupload.php");
                    }
                    
                }
            }                 
        }        
?>

 <style type="text/css">
     .main{
        width:100%;
        align-self: center;
        height: 60%;
        margin-left: 25%;
        margin-bottom: 130px;
     }
 </style>
<div class="main">
    <div class="container">
        <div class="row">
            <!-- Post Content Column -->
            <div class="col-lg-1"></div>
            <div class="col-lg-4" style=" margin-top: 50px;">
                <div id="error">
                    <?php if ($error!="") {
                        echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
                    } ?>  
                </div>
                <!-- Login Form -->
                <hr>
               <form method="POST" id = "signUpForm" action="register.php" enctype="multipart/form-data">   
                <p>Interested? Sign up now.</p>
                    <fieldset class="form-group">
                        <input class="form-control" type="text" name="username" placeholder="Username" style="max-width: 350px;">                
                    </fieldset>                                
                    <fieldset class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email" style="max-width: 350px;">                                   
                    </fieldset>                               
                    <fieldset class="form-group">                                
                        <input class="form-control" type="password" name="password" placeholder="Password" style="max-width: 350px;">                  
                    </fieldset>
                    <fieldset class="form-group">
                    <fieldset class="form-group">
                        <input class="btn btn-success" type="submit" name="submit" value="Sign Up!">
                    </fieldset> 
                </form>       
            </div>
            <div class="col-lg-3"></div>  
            </div>                 
<?php include("includes/footer.php"); ?>