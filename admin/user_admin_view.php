<?php $id = $_GET['id'];
    require_once('../classes/Database.php');
    $db = new Database();
    $data = $db->getWhere("admin", "id='$id'");      
    $row = $data->fetch_assoc(); 
?>
<?php require_once('inc/header.php'); ?>
<?php include_once('inc/sidebar.php'); ?>    

<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2 class="text-success"><?= ucfirst($row['username']); ?>'s Informations</h2>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-responsive table-bordered table-hover">
              <!-- single item for looping  -->
                <tr>
                  <td>Name</td>
                  <td><?= $row['name']; ?></td>
                </tr>
                <tr>
                  <td>User Role</td>
                  <td><?php if($row['role_id'] == 1){ echo 'Admin';} ?></td>
                </tr>
                <tr>
                  <td>Gender</td>
                  <td><?= $row['gender']; ?></td>
                </tr>
                <tr>
                  <td>Phone</td>
                  <td><?= $row['phone']; ?></td>
                </tr>
                <tr>
                  <td>Username</td>
                  <td><?= $row['username']; ?></td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td><?= $row['email']; ?></td>
                </tr>
                <tr>
                  <td>Picture</td>
                  <td><img src="images/admin/<?= $row['image']; ?>"></td> 
                </tr>
                <tr>
                  <td>Address</td>
                  <td>Dhaka</td>
                </tr>
                <tr>
                  <td>Joined Date</td>
                  <td>2017-12-11</td>
                </tr>
                <tr>
                  <td>Status</td>
                  <td>Active</td>
                </tr>
                <!-- /single item for looping  -->
                
              </table>
              
              <a href="users_admin_list.php" class="btn btn-success">Back Users</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once('inc/footer.php'); ?>