<?php 
  include_once('include/header.php'); 
  include_once('classes/Database.php');
  $db = new Database; 
  $user_id = $_SESSION['st_id']; 
?>
<!-- user data -->
<div class="container-fluid">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-success">
        <div class="panel-heading">
          <h2>Return a Book</h2> 
        </div>
        <div class="panel-body">
          <form action="" method="post">
            <div class="form-group">
              <label>Issued Books</label>
              <select name="issued_book" class="form-control">
                  <option value="" selected>Choose a Book</option>
                  <?php  
                      $sql = "SELECT * FROM book_issue LEFT JOIN books ON book_issue.book_id=books.id WHERE user_id='$user_id' ";  
                      $data = $db->getQuery($sql);
                      while($row = $data->fetch_assoc()) :
                  ?>
                  <option value="<?= $row['id']; ?>"><?= $row['title']; ?></option>
                <?php endwhile; ?>
              </select>
            </div>
            
          </form>

        </div>
      </div>
      
    </div>  
  </div>
</div>
<!-- /user data -->

<!-- end content -->
<?php require_once('include/footer.php'); ?> 

