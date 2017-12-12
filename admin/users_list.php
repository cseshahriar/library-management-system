<?php require_once('inc/header.php'); ?>
<?php include_once('inc/sidebar.php'); ?>

<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2 class="text-success">Users List</h2>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-responsive table-bordered">
              <!-- single item for looping  -->
                <tr class="success">
                  <th>Sr. No.</th>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Gender</th>
                  <th>User Role</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                <tr>
                  <td>01</td>
                  <td>Shahriar</td>
                  <td>admin</td>
                  <td>shahriar@gmail.com</td>
                  <td>Male</td>
                  <td>admin</td>
                  <td>Inactive</td> 
                  <td>
                    <a href="user_view.php?id=" class="btn btn-xs btn-success">View <i class="fa fa-eye"></i> </a>
                    <a href="user_update.php?id=" class="btn btn-xs btn-info">Update <i class="fa fa-pencil"></i></a>
                   <a href="user_delete.php?id=" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure you want to delete this item?');" >Delete <i class="fa fa-trash"></i></a> 
                  </td>
                </tr>
                <tr>
                  <td>01</td>
                  <td>Shahriar</td>
                  <td>admin</td>
                  <td>shahriar@gmail.com</td>
                  <td>Male</td>
                  <td>admin</td>
                  <td>Active</td> 
                  <td>
                    <a href="user_view.php?id=" class="btn btn-xs btn-success">View <i class="fa fa-eye"></i> </a>
                    <a href="user_update.php?id=" class="btn btn-xs btn-info">Update <i class="fa fa-pencil"></i></a>
                   <a href="user_delete.php?id=" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure you want to delete this item?');" >Delete <i class="fa fa-trash"></i></a> 
                  </td>
                </tr>
                <!-- /single item for looping  -->
                
              </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once('inc/footer.php'); ?>