<?php 
    ob_start(); 
    session_start();
    require_once('classes/Database.php'); 
    require_once('classes/Users.php'); 
    $db = new Database;
    $user = new Users;
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>Library Management System</title>
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
  </head>
  <body> 
    <!-- start nav -->
<div class="container-fluid">
  <div class="row">
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Library Management System</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Home</a></li> <!-- book issue,return, fine etc list -->
          <li><a href="#">Books Issue</a></li>
          <li><a href="#">Books Return</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php if(! isset($_SESSION['user_id'])): ?>
            <li><a href="user_add.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          <?php else :  ?>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"> <?php if(isset($_SESSION['user_username'])) { echo $_SESSION['user_username'];} ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Profile</a></li>
                  <li><a href="#">Settings</a></li>
                  <li><a href="logout.php">Logout</a></li> 
                </ul>
              </li>
            <?php endif; ?>
         
        </ul>
      </div>
    </nav>
  </div>
</div>
<!-- end nav -->
