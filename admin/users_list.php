<?php 
    require_once('../classes/Database.php');
    $db = new Database();
    $data = $db->get("users");    
?>
<?php require_once('inc/header.php'); ?>
<?php include_once('inc/sidebar.php'); ?>

<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2 class="text-success">Users List <a href="user_add.php" class="btn btn-success pull-right">Add Admin</a></h2>  
        </div>
        <div class="panel-body"> 
          <table class="table table-striped table-responsive table-bordered">
              <!-- single item for looping  -->
                <tr class="success">
                  <th>ID</th>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Gender</th>
                  <th>User Role</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                <?php while($row = $data->fetch_assoc()) : ?>                
                <tr>
                  <td><?= $row['id']; ?></td> 
                  <td><?= $row['name']; ?></td>
                  <td><?= $row['username']; ?></td>
                  <td><?= $row['email']; ?></td>
                  <td><?= $row['gender']; ?></td>
                  <td>
                    <?php 
                        if($row['role_id'] == 1) {
                            echo '<span class="text-success">Admin</span>';
                        } 
                    ?>  
                    </td>
                  <td>
                    <?php 
                        if($row['active'] == 1) { 
                            echo '<span class="text-success"><strong>Active</strong></span>'; 
                        } else {
                            echo '<span class="text-danger"><strong>Inactive</strong></span><br>'; ?>
                            <a href="user_admin_active.php?id=<?= $row['id']; ?>" class="text-success"><strong> Make Active</strong></a>
                       <?php } ?>
                    </td>
                  <td> 
                      <a href="user_admin_view.php?id=<?= $row['id']; ?>" class="btn btn-xs btn-success"><i class="fa fa-eye"></i> </a>

                      <a href="user_admin_update.php?id=<?= $row['id']; ?>" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>

                     <a href="user_admin_inactive.php?id=<?= $row['id']; ?>" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure you want to delete this item?');" >
                      <i class="fa fa-trash"></i>
                      </a>   
                  </td> 
                </tr>
                <?php endwhile; ?>  
                <!-- /single item for looping  -->
                
              </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once('inc/footer.php'); ?>