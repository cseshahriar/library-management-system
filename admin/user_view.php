<?php require_once('inc/header.php'); ?>
<?php include_once('inc/sidebar.php'); ?>

<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2 class="text-success">Username's Informations</h2>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-responsive table-bordered table-hover">
              <!-- single item for looping  -->
                <tr>
                  <td>Name</td>
                  <td>Md.Shahriar Hosen</td>
                </tr>
                <tr>
                  <td>User Role</td>
                  <td>Admin</td>
                </tr>
                <tr>
                  <td>Gender</td>
                  <td>Male</td>
                </tr>
                <tr>
                  <td>Phone</td>
                  <td>1234567890</td>
                </tr>
                <tr>
                  <td>Class/Degree</td>
                  <td>B.S.C</td>
                </tr>
                <tr>
                  <td>Roll</td>
                  <td>748748</td>
                </tr>
                <tr>
                  <td>Department</td>
                  <td>CSE</td>
                </tr>
                <tr>
                  <td>Designation</td>
                  <td>Web App Developer</td>
                </tr>
                <tr>
                  <td>Username</td>
                  <td>admin</td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td>shahriar@datatrixsoft.com</td>
                </tr>
                <tr>
                  <td>Picture</td>
                  <td><img src="images/user.png"></td>
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
              
              <a href="users_list.php" class="btn btn-success">Back Users</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once('inc/footer.php'); ?>