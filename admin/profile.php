<?php 
  session_start(); 
  include_once('../classes/Database.php');
  $db = new Database;
  $user_id = $_SESSION['user_id'];

  if(isset($_SESSION['user_role_id']) == 1) :
?>
<?php require_once('inc/header.php'); ?>
<?php include_once('inc/sidebar.php'); ?>

<div class="content-wrapper"> 
  <div class="row">
  	<div class="col-md-12">
  		<div class="panel panel-default">
  			<div class="panel-heading">
  				<h3>User's Information</h3>
  			</div>
  			<div class="panel-body">
  				<table class="table table-responsive table-bordered table-hover">
  					<?php 
  						$sql = "SELECT * FROM admin WHERE id='$user_id' ";
  						$data = $db->getQuery($sql);
  						$row = $data->fetch_assoc();
  					 ?>
  					<tr>
  						<th>Name:</th>
  						<td><?= $row['name']; ?></td>
  					</tr>
  					<tr>
  						<th>Role:</th>
  						<td><?php  if($row['role_id'] == 1){ echo 'Admin';}; ?></td>
  					</tr>
  					<tr>
  						<th>Gender:</th>
  						<td><?= $row['gender']; ?></td>
  					</tr>
  					<tr>
  						<th>Username:</th>
  						<td><?= $row['username']; ?></td>
  					</tr>
  					<tr>
  						<th>Email:</th>
  						<td><?= $row['email']; ?></td>
  					</tr>
  					<tr>
  						<th>Phone:</th>
  						<td><?= $row['phone']; ?></td>
  					</tr>
  					<tr>
  						<th>Image:</th>
  						<td>
  							<img class="thumbnail" src="images/admin/<?= $row['image']; ?>" height="160" alt="">
  						</td>
  					</tr>
  					<tr>
  						<th>Address:</th>
  						<td><?= $row['address']; ?></td>
  					</tr>
  					<tr>
  						<th>Address:</th>
  						<td><?= $row['joined_at']; ?></td>
  					</tr> 
  					
  				</table>
  			</div>
  		</div>
  	</div>
  </div>
</div>

<?php require_once('inc/footer.php'); ?>
<?php 
  else: 
      echo "<script>window.location.href = 'login.php'; </script>"; 
  endif;
?>