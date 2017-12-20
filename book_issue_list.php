<?php require_once('include/header.php'); ?>   
<?php 
  include_once('classes/Database.php');
  $db = new Database();
  $user_id = $_SESSION['st_id'];
  $sql = "SELECT * FROM book_issue WHERE user_id='$user_id' AND active='1' "; 
  $books = $db->getQuery($sql);  
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2 class="text-success">Issued Books List <a href="book_issue.php" class="btn btn-primary pull-right">Issue Books</a></h2>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-responsive table-bordered">
              <!-- single item for looping  -->
                <tr class="success">
                  <th>Sr No.</th>
                  <th>Issue ID</th>
                  <th>User ID</th>
                  <th>Book ID</th>
                  <th>Issue Date</th>
                  <th>Submit Date</th>
                  <th>Status</th>
                  <th>Action</th> 
                </tr>
                <?php 
                    $serial = 1; 
                    while($book = $books->fetch_assoc()): ?>
                <tr>
                  <td><?= $serial++; ?></td>
                  <td><?= $book['id']; ?></td> <!-- issue id -->
                  <td><?= $book['user_id']; ?></td>
                  <td><?= $book['book_id']; ?></td>
                  <td><?= date('d-m-Y',strtotime($book['issue_date'])); ?></td>
                  <td><?= date('d-m-Y',strtotime($book['submit_date'])); ?></td>
                  
                  <td>
                    <?php if($book['active'] == 1){ echo '<b class="text-success">Active</b>'; ?> 
                    <?php }else if($book['active'] == 2) {   
                          echo 'Returned'; 
                    } else if($book['active'] == 3) {   
                          echo 'Calceled'; 
                    ?>
                    <?php } else { echo '<span class="text-danger"><b>Inactive!</b></span>'; } ?>  
                  </td>    
                
                <?php if($book['active'] != 2): ?>
                  <td>
                    <a href="book_submit.php?id=<?= $book['id']; ?>" class="btn btn-xs btn-primary" onclick="return confirm('Are you sure you want to submit this item?');"><i class="fa fa-trash"></i> Return This Book</a>   
                  </td> 
                  <?php  endif; ?>
                </tr> 
              <?php endwhile; ?>    
                
                <!-- /single item for looping  -->
                
              </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once('include/footer.php'); ?>