<?php
    include("includes/connection.php");
    //session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="admin" content="">
    <title>Make them yours.</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/post.css" rel="stylesheet">
    <!-- Temporary navbar container fix -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <style>
    .navbar-toggler {
        z-index: 1;
    }
    @media (max-width: 576px) {
        nav > .container {
            width: 100%;
        }
    }
    </style>
</head>
<body>
    <!-- Navigation  -->
    <nav class="navbar fixed-top navbar-toggleable-md navbar-inverse bg-inverse ">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container">
            <a class="navbar-brand" href="index.php" style="font-size:25px;"><strong>Image Editor</strong></a>
            <div class="collapse navbar-collapse" id="navbarExample">
                <ul class="navbar-nav ">
                </ul>
                <?php if(isset($_SESSION['uid'])) : ?>
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                            <a href = "users.php?id=<?php echo $id; ?>" class="btn btn-primary" style="margin-right: 5px;color: white;margin-bottom: 5px;"> Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href = "logout.php" class="btn btn-danger" style="margin-right: 5px;color: white;">Sign Out</a>
                    </li>
                    <div class="btn-group">
                        <a href="" class="belltag" id="notify" data-toggle="dropdown" title="Toggle dropdown menu" style="color: white;" >
                        <i class="fa fa-bell fa-2x" aria-hidden="true"></i></a>
                        <span id="unread_count" style="color: white;font-size: 14px;"></span>
                        <div class="dropdown-menu dropdown-menu-right" id="notifications_drop"></div>
                    </div>
                    </ul>
                <?php else : ?>
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href = "login.php" class="btn btn-primary" style="margin-right: 5px;color: white;margin-bottom: 5px;"> Sign In</a>
                    </li>
                    <li class="nav-item">
                        <a href = "register.php" class="btn btn-primary" style="margin-right: 5px;color: white;">Sign Up</a>
                    </li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </nav>