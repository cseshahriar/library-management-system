<?php session_start();
  require_once('../classes/Database.php');
  $db = new Database();

  if( isset($_POST['username_email'], $_POST['password'])) {  
    $userEmail = $_POST['username_email'];
    $password = $_POST['password'];
    $db->login($userEmail, $password);         
  } 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Welcome To Doctor's Farma </title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo" style="font-family: verdana;color:#fff;">

        <?php 
            if(isset($userOrEmailError) || isset($passwordError)) {
              echo '<p id="msg">Username or Email or Password Must not be empty</p>';    
            } 
         ?>  
      </div>
      <div class="login-box">

        <!-- admin login form -->
        <form class="login-form" action="" method="POST">  
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Admin Sign In</h3>
          <div class="form-group">
            <label for="username_email">Username or Email</label>
            <input type="text" class="form-control" name="username_email" id="username_email" placeholder="Username or Email" autofocus> 
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control"  placeholder="Password"> 
          </div>
          <!-- <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label class="semibold-text">
                 
                </label> 
              </div>
              <p class="semibold-text mb-0"><a data-toggle="flip">Forgot Password ?</a></p>
            </div>
          </div> -->
          <div class="form-group btn-container"> 
            <button type="submit" name="loginForm" class="btn btn-primary btn-block">SIGN IN<i class="fa fa-sign-in fa-lg"></i></button>
          </div>
        </form> 

        <!-- <form class="forget-form" action="index.html">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block">RESET<i class="fa fa-unlock fa-lg"></i></button>
          </div>
          <div class="form-group mt-20">
            <p class="semibold-text mb-0"><a data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
          </div>
        </form> -->
      </div>
    </section>
  </body>
  <script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/plugins/pace.min.js"></script>
  <script src="js/main.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#msg").show();
      setTimeout(function(){
        $("#msg").hide();
      },5000);
    });
  </script>
</html>