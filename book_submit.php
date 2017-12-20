<?php include_once('include/header.php'); ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
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
                      $sql = "SELECT * FROM book_issue LEFT JOIN books ON book_issue.book_id=books.id WHERE user_id='$user_id' AND book_issue.active='1' ";    
                      $data = $db->getQuery($sql);
                      while($row = $data->fetch_assoc()) : 
                  ?>
                  <option value="<?= $row['id']; ?>"><?= $row['title']; ?></option>
                <?php endwhile; ?>
              </select>
            </div>

            <div class="form-group">
                <span></span>
            </div>
            <button type="submit" class="btn btn-success">Return a Book</button>
          </form>

        </div>
      </div>
      
    </div>  
  </div>
</div>
<!-- /user data -->

<!-- end content -->
<?php require_once('include/footer.php'); ?> 

