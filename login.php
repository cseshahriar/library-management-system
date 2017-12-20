<?php session_start();
  require_once('classes/Users.php');
  $user = new Users(); 
  if( isset($_POST['username_email'], $_POST['password'])) {  

      if(empty($_POST['username_email'] || $_POST['password'] )) {
        $_SESSION['logInError'] = 'Username or Email And Password must not be empty!';
      } else {
          $userEmail = $_POST['username_email'];
          $password = $_POST['password'];
          //$db->login($userEmail, $password);            
          $user->login($userEmail, $password);               
      } 
  } 
?>
<?php require_once('include/header.php'); ?>  
<!-- user data -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-success" style="margin-top: 50px">
				<div class="panel-heading">
					  <?php if(isset($_SESSION['logInError'])): ?>
				        <!-- alert -->
				        <div class="msg alert alert-danger alert-dismissable">
				          <a class="panel-close close" data-dismiss="alert">×</a> 
				          <i class="fa fa-user"></i>
				          <strong ><?php echo $_SESSION['logInError']; ?></strong> 
				        </div>
				      <?php endif; ?> 

					  <?php if(isset($_GET['logoutMsg'])): ?>
				        <!-- alert -->
				        <div class="msg alert alert-success alert-dismissable">
				          <a class="panel-close close" data-dismiss="alert">×</a> 
				          <i class="fa fa-user"></i>
				          <strong ><?php echo $_GET['logoutMsg']; ?></strong>  
				        </div>
				      <?php endif; ?>
					<h2>Teacher or Student Login</h2>
				</div>
				<div class="panel-body">
					<!-- login form -->
					<form action="" method="post">
						<div class="form-group">
							<label for="useremail">Username or Email</label>
							<input type="text" name="username_email" class="form-control" placeholder="Usernaem and Email" /> 
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" class="form-control" placeholder="password" /> 
						</div>
						<button type="submit" name="submit" class="btn btn-success btn-block">Login</button>
					</form>
				</div>
			</div>
			
		</div>	
	</div>
</div>
<!-- /user data -->

<!-- end content -->
<?php require_once('include/footer.php'); ?>