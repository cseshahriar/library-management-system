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
        <!-- search -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 style="display: inline-block;">Search from issue list</h3>
                <!-- search -->
                <input type="text" name="search" id="search" class="form-control" placeholder="Search by Issue ID, Username and Book Title" />  
            </div>
            <div class="panel-body">
                <table id="result" class="table table-striped table-responsive table-bordered">
                 <!-- search result view here --> 

                </table>  
            </div>
        </div>
        <!-- /search -->

        <!-- issue lsit -->
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="text-success"> 
              Issued Books List     
              <!-- make issue -->
              <a href="book_issue.php" class="btn btn-primary pull-right">Issue Books</a></h2>
          </div>
          <div class="panel-body">
            <table class="table table-striped table-responsive table-bordered">
                <!-- single item for looping  -->
                  <tr class="success">
                    <th>Sr No.</th> 
                    <th>Issue ID</th> 
                    <th>Username</th> <!-- user name -->
                    <th>Book ID</th><!--  book name --> 
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
                    <td><?= $book['id']; ?></td>
                    <td>
                      <?php
                          $user_id = $book['user_id'];
                          $usql = "SELECT username from users WHERE id='$user_id' ";
                          $user = $db->getQuery($usql);
                          $data = $user->fetch_assoc();
                          echo $data['username'];  
                      ?>  
                    </td>
                    <td> 
                       <?php
                          $book_id = $book['book_id'];
                          $usql = "SELECT title from books WHERE id='$book_id' ";
                          $user = $db->getQuery($usql);
                          $data = $user->fetch_assoc();
                          echo $data['title']; 
                      ?> 
                        
                    </td>
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

                      <a href="book_submit.php?id=<?= $book['id']; ?>" class="btn btn-xs btn-warning" onclick="return confirm('Are you sure you want to submit this item?');" title="Send issue id"><i class="fa fa-trash"></i>Return Book</a>   
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