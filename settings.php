<?php require_once('include/header.php'); ?> 
<?php 
	require_once('classes/Database.php');  
	$db = new Database;
	$user_id = $_SESSION['st_id']; 

	//update password
	 if(isset($_POST['pass'])){
	 	$password = $_POST['password'];
	 	$pass = md5($password);
	 	if(!empty($pass)){
	 		$update = "UPDATE users SET password='$pass' WHERE id='$user_id' ";  
	 		$update_pass = $db->update($update);
	 		if($update_pass){
	 			header("Location: index.php");   
	 		}
	 	}
	 }
	

	//update image
	 if(isset($_POST['img'])){  
		if(!empty($_FILES['image'])) {
	        $img_file = $_FILES['image']['name']; 
	        $tmp_name = $_FILES['image']['tmp_name'];    
	        $img_size = $_FILES['image']['size'];
	        $uplodad_directory = 'admin/images/users/';   
	        $image_name = 'user-'.time().rand(10000,100000).'.'.pathinfo($img_file, PATHINFO_EXTENSION);     
	        
	        $update = "UPDATE users SET image='$image_name' WHERE id='$user_id' ";   
		 		$update_img = $db->update($update);
		 	if($update_img){
		 		move_uploaded_file($tmp_name, $uplodad_directory.$image_name);  
		 		header("Location: index.php");    
		 	}   
	    } 
	
	 }
?> 
<?php if(isset($_SESSION['st_id'])): ?> 
<!-- user data -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<!-- password -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>Update Password</h2>
				</div>
				<div class="panel-body text-left">
					<h3>Change Password</h3>
					<form action="" method="post">
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" class="form-control">
						</div>
						<button type="Submit" name="pass" class="btn btn-primary">Update Password</button>
					</form>
				</div>
			</div>

			<!-- picture -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>Update Image</h2> 
				</div>
				<div class="panel-body text-left">
					<h3>Change Image</h3>
					<form action="" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<?php 
								$sql ="SELECT image FROM users WHERE id='$user_id' ";
								$userimg = $db->getQuery($sql);
								$uimg = $userimg->fetch_assoc();     
							?>
							<img src="admin/images/users/<?= $uimg['image']; ?>" class="pull-right thumbnail" height="180" alt="">

							<label for="image">Image</label>
							<input type="file" name="image" class="form-control-file">
						</div> 
						<button type="Submit" name="img" class="btn btn-primary">Change Image</button>
					</form> 
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