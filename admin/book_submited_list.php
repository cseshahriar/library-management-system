<?php 
  include_once('../classes/Database.php'); 
  $db = new Database();
  $sql = "SELECT * FROM book_return LEFT JOIN book_issue ON book_return.issue_id=book_issue.id";  
  $books = $db->getQuery($sql);  
?>
<?php require_once('inc/header.php'); ?> 
<?php include_once('inc/sidebar.php'); ?>     

<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2 class="text-success">Submitted Books List <a href="book_submit.php" class="btn btn-primary pull-right">Submit Books</a></h2>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-responsive table-bordered"> 
              <!-- single item for looping  -->
                <tr class="success">
                  <th>Sr No.</th>
                  <th>Issue ID</th>
                  <th>User Name</th> <!-- user name -->
                  <th>Book Name</th> <!-- book name --> 
                  <th>Issue Date</th>
                  <th>Submit Date</th>
                  <th>Fine</th>
                  <th>Action</th> 
                </tr>
                <?php
                    $serial = 1; 
                    while($book = $books->fetch_assoc()):  

                ?>
                <tr>
                  <td><?= $serial++; ?></td>
                  <td><?= $book['issue_id']; ?> 
                  </td> 
                  <td>
                    <?php 
                      $uid = $book['user_id']; 
                      $userSql = "SELECT username FROM users WHERE id='$uid' ";
                      $udata = $db->getQuery($userSql);
                      $user_row = $udata->fetch_assoc();
                      echo $user_row['username'];
                    ?>
                  </td>
                  <td>
                    <?php 
                      $bid = $book['book_id']; 
                      $bookSql = "SELECT title FROM books WHERE id='$bid' ";
                      $bdata = $db->getQuery($bookSql);
                      $b_row = $bdata->fetch_assoc();
                      echo $b_row['title'];
                    ?>

                  </td>
                  <td><?= date('d-m-Y',strtotime($book['issue_date'])); ?></td>
                  <td><?= date('d-m-Y',strtotime($book['submit_date'])); ?></td>
                  <td><?= $book['fine']; ?> TK</td>   
                  <td>
                   <a href="book_inactive.php?id=<?= $book['id']; ?>" class="btn btn-xs btn-success" onclick="return confirm('Are you sure you want to payout this item?');" ><i class="fa fa-money"></i> Pay</a> 
                  </td>
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