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