<?php session_start();
  require_once('../classes/Database.php');
  $db = new Database();

  if( isset($_POST['username_email'], $_POST['password'])) {  

      if(empty($_POST['username_email'] || $_POST['password'] )) {
        $_SESSION['logInError'] = 'Username or Email And Password must not be empty!';
      } else {
          $userEmail = $_POST['username_email'];
          $password = $_POST['password'];
          $db->login($userEmail, $password);            
      }
  } 
?> 
<?php require_once('include/header.php'); ?>
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
		      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
		      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		      <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li> 
		      <li class="dropdown">
		          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"> Username<span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="#">Profile</a></li>
		            <li><a href="#">Settings</a></li>
		            <li><a href="#">Logout</a></li>
		          </ul>
		        </li>
		    </ul>
		  </div>
		</nav>
	</div>
</div>
<!-- end nav -->

<!-- user data -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-success" style="margin-top: 50px">
				<div class="panel-heading">
					  <?php if(isset($_SESSION['logInError'])): ?>
				        <!-- alert -->
				        <div id="msg" class="alert alert-success alert-dismissable">
				          <a class="panel-close close" data-dismiss="alert">×</a> 
				          <i class="fa fa-user"></i>
				          <strong ><?php echo $_SESSION['logInError']; ?></strong> 
				        </div>
				      <?php endif; ?>
					<h2>Teacher or Student Login</h2>
				</div>
				<div class="panel-body">
					<form action="" method="post">
						<div class="form-group">
							<label for="useremail">Username or Email</label>
							<input type="text" name="user_email" class="form-control" placeholder="Usernaem and Email" /> 
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" class="form-control" placeholder="password" />
						</div>
						<div class="form-group">
							<label for="re-password">Re-Password</label>
							<input type="password" name="re-password" class="form-control" placeholder="Re Enter Password" />
						</div>
						<button type="submit" class="btn btn-success btn-block">Login</button>
					</form>
				</div>
			</div>
			
		</div>	
	</div>
</div>
<!-- /user data -->

<!-- end content -->
<?php require_once('include/footer.php'); ?>