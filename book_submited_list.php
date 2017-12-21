<?php require_once('include/header.php'); ?> 
<?php 
  include_once('classes/Database.php'); 
  $db = new Database();
  $sql = "SELECT * FROM book_return LEFT JOIN book_issue ON book_return.issue_id=book_issue.id";  
  $books = $db->getQuery($sql);  
?>
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2 class="text-success">Submitted Books List </h2>
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
                  <td>
                    <?php
                        if($book['fine'] != 0) {
                          echo '<b class="text-danger">'.$book['fine'].' TK</b>';  
                        }else if($book['paid'] == 1){
                            echo '<b class="text-success">Paid</b>';
                        } else {
                            echo '00.00 TK';  
                        }
                    ?>
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

<?php require_once('include/footer.php'); ?>