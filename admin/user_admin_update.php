<?php require_once('inc/header.php'); ?>
<?php include_once('inc/sidebar.php'); ?>

<div class="content-wrapper">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2 class="text-success">Update Admin Data</h2>
        </div>
        <div class="panel-body">
          <!-- admin registration -->
          <form action="process.php" method="post" enctype="multipart/form-data">
            <!-- admin role is 1  -->
            <div class="form-group">
              <label for="name">Name</label>
              <input type="email" class="form-control" id="name" placeholder="Name">
            </div>
            <!-- gender -->
            <div class="radio">
              <p><strong>Choose Gender</strong></p>
              <label>
                <input type="radio" name="radio" value="Male" /> Male
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="radio" value="Female" /> Female
              </label>
            </div>
            <!-- username -->
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" name="username" id="username" class="form-control" placeholder="Username" disabled>
            </div>
            <!-- phone -->
            <div class="form-group"> 
              <label for="phone">Phone</label>
              <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone"/>
            </div>
            <div class="form-group"> 
              <label for="email">Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Email"/>
            </div>
            <div class="form-group"> 
              <label for="password">Password</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="password"/> 
            </div>
            <div class="form-group"> 
              <label for="re-password">Re-Password</label>
              <input type="password" name="re-password" id="re-password" class="form-control" placeholder="re-password"/>  
            </div>
            <!-- picture change from sidebar -->
            <!-- <div class="form-group">
              <label for="picture">Picture</label>
              <input type="file" name="picture" class="form-control-file">
            </div> --> 
            <div class="form-group">
              <label for="address">Address</label>
              <input type="text" name="address" id="address" class="form-control" placeholder="Address">
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-lg">Register</button>
           
          </form> 
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once('inc/footer.php'); ?>