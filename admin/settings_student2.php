<?php include_once("inc/header.php"); ?>  
<?php include_once("inc/sidebar.php");?> 
<?php if($_SESSION['user_id']) : ?> 
<?php 
    include_once('../classes/Database.php');
    $db = new Database;
    $sql = "SELECT * FROM settings"; 
    $query = $db->getQuery($sql);
    $data = $query->fetch_assoc();  

    //update 
    if(isset($_POST['submit'])){
      $limit_per_month = $_POST['limit_per_month'];
      $current_limit = $_POST['current_limit'];
      $per_day_fine = $_POST['per_day_fine'];
      $book_limit = $_POST['book_limit']; 

      if(!empty($limit_per_month || $current_limit ||  $per_day_fine || $book_limit)) {
        $sql2 = "UPDATE settings SET students_fine='$per_day_fine', students_max_book_limit='$book_limit', students_current_limit='$current_limit', students_max_keep_limit='$limit_per_month' "; 

        $db->update($sql2); 
        $msg = 'Update successfull! please refresh for the change';  
      } 
    } 
 ?>

<div class="container">
<div class="content-wrapper">
  <div class="row"> 
    
      <!-- change settings for student -->
      <div class="col-md-12">
       <!-- alert -->
       <?php if(isset($msg)): ?>
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
         <?php echo $msg; ?>
        </div> 
      <?php endif; ?> 

        <div class="panel panel-default">
          <div class="panel-heading">
              <h3>Settings for Students</h3>
          </div>
          <div class="panel-body">

            <!-- settings for student -->
            <form action="" method="post">
              <div class="form-group">
                <label for="sibl">Per Month Book Issue Limit amount</label> 
                <input type="number" name="limit_per_month" id="sibl" class="form-control" value="<?= $data['students_max_book_limit']; ?>" />
              </div>
              <div class="form-group">
                <label for="sibl">At a Time Book Issue Limit amount</label> 
                <input type="number" name="current_limit" id="sibl" class="form-control" value="<?=  $data['students_current_limit']; ?>">
              </div>
              <!-- <div class="form-group">
                <label id="mbil">Max Book Issue Limit amount</label>
                <input type="number" name="max_book_limit" id="mbil" class="form-control" placeholder="Max Book issue limit ?">
              </div> -->
              <div class="form-group">
                <label id="pdfine">Per Day Fine amount</label>
                <input type="number" name="per_day_fine" id="pdfine" class="form-control" value="<?=  $data['students_fine']; ?>"/> 
              </div>
              <div class="form-group">
                <label for="brdl">Every Book Return Days Limit</label>
                <input type="number" name="book_limit" id="brdl" class="form-control" value="<?=  $data['students_max_keep_limit']; ?>"/>
              </div>
               <button type="submit" name="submit" class="btn btn-success btn-block">Save Change</button>
            </form>  
          </div>
        </div>
      </div>
  </div>
</div>
</div>
<?php include "inc/footer.php";?> 
<?php else:
     echo "<script>window.location.href = 'login.php'; </script>"; 
      endif; 
?> 