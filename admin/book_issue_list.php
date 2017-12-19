<?php 
  include_once('../classes/Database.php');
  $db = new Database();
  $books = $db->get("book_issue");  
?>
<?php require_once('inc/header.php'); ?> 
<?php include_once('inc/sidebar.php'); ?>  

<div class="content-wrapper">
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
                  <td><?= $book['user_id']; ?></td>
                  <td><?= $book['book_id']; ?></td>
                  <td><?= date('d-m-Y',strtotime($book['issue_date'])); ?></td>
                  <td><?= date('d-m-Y',strtotime($book['submit_date'])); ?></td>
                  
                  <td>
                    <?php if($book['active'] == 1){ echo '<b class="text-success">Active</b>'; ?> 

                        <a href="book_issue_cancel.php?id=<?= $book['id']; ?>" class="text-success" onclick="return confirm('Are you sure you want to cancel this item?');"> | Make Cancel</a> 

                    <?php }else if($book['active'] == 2) {   
                          echo 'Returned'; 
                    } else if($book['active'] == 3) {   
                          echo 'Calceled'; 
                    ?>
                          <a href="book_issue_active.php?id=<?= $book['id']; ?>" class="text-success" onclick="return confirm('Are you sure you want to Active this item?');">
                              <strong>| Active</strong>
                          </a> 
                    <?php } else {  
                          echo '<span class="text-danger"><b>Inactive!</b></span>'; 
                    ?> 
                        <a href="book_issue_active.php?id=<?= $book['id']; ?>" class="text-success"> | Make Active</a> 
                    <?php } ?>  
                  </td>   
                
                <?php if($book['active'] != 2): ?>
                  <td>
                   <a href="book_issue_inactive.php?id=<?= $book['id']; ?>" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"  title="Make Inactive"><i class="fa fa-trash"></i> Inactive</a>

                    <a href="book_submit.php?id=<?= $book['id']; ?>" class="btn btn-xs btn-warning" onclick="return confirm('Are you sure you want to submit this item?');"><i class="fa fa-trash"></i>Return Book</a>   
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

<?php require_once('inc/footer.php'); ?>