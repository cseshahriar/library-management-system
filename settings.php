<?php require_once('include/header.php'); ?> 
<?php 
	require_once('classes/Database.php'); 
	$db = new Database;
?> 
<?php if(isset($_SESSION['st_id'])): ?> 
<!-- user data -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>Update</h2>
				</div>
				<div class="panel-body text-left">
					<form action="" method="">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" name="name">
						</div>
					</form>
				</div>
			</div>
		</div>	
	</div>
</div>
<!-- /user data -->
<!-- end content -->
<?php require_once('include/footer.php'); ?> 

<?php else: ?>
<?php header("Localhost: login.php"); ?>
<?php endif; ?>