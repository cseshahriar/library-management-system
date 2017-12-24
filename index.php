<?php require_once('include/header.php'); ?> 
<?php if(!isset($_SESSION['admin'])) : ?> if admin is not login

<?php if(isset($_SESSION['st_id'])): ?>   
<?php 
	require_once('classes/Database.php'); 
	$db = new Database;
?> 
<!-- user data -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>User informations</h2>
				</div>
				<div class="panel-body text-left">
					<table class="user table table-bordered table-responsive table-striped table-hover">
						<?php 
							$user_id = $_SESSION['st_id'];
							$sql = "SELECT * FROM users WHERE id='$user_id' AND active='1' ";
							$userdata = $db->getQuery($sql);
							$row = $userdata->fetch_assoc();  
						?>
						<tr>
							<th>Name:</th>
							<td><?= $row['name']; ?></td>
						</tr>
						<tr>
							<th>Gende:</th>
							<td><?= $row['gender']; ?></td>
						</tr>
						<tr>
							<th>Phone:</th>
							<td><?= $row['phone']; ?></td>
						</tr>
						<tr>
							<th>Username:</th>
							<td><?= $row['username']; ?></td>
						</tr>
						<tr>
							<th>Email:</th>
							<td><?= $row['email']; ?></td>
						</tr> 
						<?php if($_SESSION['st_role_id'] == 2): ?> 
						<tr>
							<th>Class:</th> 
							<td>
								<?php  
									$sql = "SELECT * FROM users LEFT JOIN class ON users.class_id=class.id WHERE users.id='$user_id' ";
									$class_data = $db->getQuery($sql);
									$class_name = $class_data->fetch_assoc();
									echo $class_name['class_name'];  
								?> 
							</td>
						</tr> 
						<?php endif; ?> 
						<tr>
							<th>Department:</th>
							<td>
								<?php 
									$sql = "SELECT * FROM users LEFT JOIN department ON users.dept_id=department.id WHERE users.id='$user_id' "; 
									$dept_data = $db->getQuery($sql);
									$dept_name = $dept_data->fetch_assoc();
									echo $dept_name['dept_name'];   
								?>

							</td>
						</tr>  
					<?php if($_SESSION['st_role_id'] == 2): ?>
						<tr>
							<th>Roll:</th>
							<td><?= $row['roll']; ?></td>
						</tr>  
					<?php endif; ?>
					<?php if($_SESSION['st_role_id'] == 1): ?>
						<tr>
							<th>Designation:</th>
							<td><?= $row['designation']; ?></td>
						</tr>  
					<?php endif; ?>
						<tr>
							<th>Address:</th>
							<td><?= $row['address']; ?></td>
						</tr>   
						<tr>
							<th>Image:</th>
							<td>
								<img class="thumbnail" src="admin/images/users/<?= $row['image']; ?>" width="160" alt=""> 
							</td>
						</tr>    
						<tr>
							<th>Joined:</th>
							<td><?= $row['joined_at']; ?></td>
						</tr> 
					</table>
				</div>
			</div>
		</div>	
	</div>
</div>
<!-- /user data -->
<!-- end content -->
<?php require_once('include/footer.php'); ?> 

<?php 
  else: 
      echo "<script>window.location.href = 'login.php'; </script>"; 
  endif;
?> 

<!-- if admin login  -->
<?php else: ?>
	<?php echo "<script>window.location.href = 'login.php'; </script>";  ?>        
<?php endif; ?>   
<!-- if admin login  -->