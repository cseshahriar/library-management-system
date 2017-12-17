<?php session_start(); if($_SESSION['user_id']) : ?>
<?php include "inc/header.php";?> 
<?php include "inc/sidebar.php";?> 
 
 <div class="container">

<div class="content-wrapper">
  <div class="row">
      
      <!-- image change --> 
      <!-- <div class="col-md-3">
        <div class="text-center">
          <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
          <h6>Upload a different photo...</h6>
          
          <input type="file" class="form-control">
        </div>
      </div> -->

      <!-- change settings for student -->
      <div class="col-md-12">
       <!-- alert -->
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          This is an <strong>.alert</strong>. Use this to show important messages to the user.
        </div> 

        <div class="panel panel-default">
          <div class="panel-heading">
              <h3>Settings for Students</h3>
          </div>
          <div class="panel-body">
            <!-- settings for student -->
            <form action="process.php" method="post">
              <div class="form-group">
                <label for="sibl">Per Month Book Issue Limit amount</label> 
                <input type="number" name="limit_per_month" id="sibl" class="form-control" placeholder="How much Book issue per month ?">
              </div>

              <div class="form-group">
                <label for="sibl">At a Time Book Issue Limit amount</label> 
                <input type="number" name="limit_per_month" id="sibl" class="form-control" placeholder="How much Book issue at a time ?">
              </div>
              <!-- <div class="form-group">
                <label id="mbil">Max Book Issue Limit amount</label>
                <input type="number" name="max_book_limit" id="mbil" class="form-control" placeholder="Max Book issue limit ?">
              </div> -->
              <div class="form-group">
                <label id="pdfine">Per Day Fine amount</label>
                <input type="number" name="per_day_fine" id="pdfine" class="form-control" placeholder="How much fine for per day ?">
              </div>
              <div class="form-group">
                <label for="brdl">Every Book Return Days Limit</label>
                <input type="number" name="book_rlimit" id="brdl" class="form-control" placeholder="How much days keep evey book ?" />
              </div>
               <button type="submit" class="btn btn-success btn-block">Save Change</button>
            </form> 
          </div>
        </div>
      </div>
  </div>
</div>
</div>
<?php include "inc/footer.php";?> 
<?php else: echo "<script>window.location.href = 'login.php'; </script>";  endif; ?> 