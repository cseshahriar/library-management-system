<?php session_start(); ?>
<?php if(!isset($_SESSION['admin'])) : ?> <!-- if admin is not login -->
<?php 
    include_once('classes/Database.php');
    $db = new Database; 
 ?>
<!DOCTYPE html>
<html lang="en">     
  <head>
    <meta charset="utf-8">
    <meta name="copyright" content="Datatrixsoft">
    <meta name="author" content="Md.Shahriar Hosen <shahriar@datatrixsoft.com>" >
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
          <a class="navbar-brand" href="index.php">Library Management System</a>
        </div>
        <ul class="nav navbar-nav">
          <!-- class="active" -->
          <?php if(isset($_SESSION['st_id'])): ?> 
            <li><a href="index.php">Users data</a></li> <!-- book issue,return, fine etc list -->
            <li><a href="book_issue.php">Books Issue</a></li>
            <li><a href="book_issue_list.php">Issued Books List</a></li>
            <li><a href="book_submited_list.php">Submit Books List</a></li>
           <!--  <li><a href="book_submit.php">Books Return</a></li> -->  
          <?php else: ?>
              <?php header("Localhost: login.php"); ?>    
          <?php endif; ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php if(! isset($_SESSION['st_id'])): ?>
            <li><a href="user_add.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          <?php else :  ?>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  <span>
                  </span>
                    <?php if(isset($_SESSION['st_username'])) { echo $_SESSION['st_username'];} ?>
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="profile.php">Profile</a></li>  
                  <li><a href="user_update.php">Update</a></li>
                  <li><a href="settings.php">Settings</a></li>  
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

<!-- if admin login  -->
<?php else: ?>
  <?php echo '<p style="color:red">Only one type user can login. Admin is now logged in this Browser, You can\'t login at this time.</p>';  ?>        
<?php endif; ?>   
<!-- if admin login  -->