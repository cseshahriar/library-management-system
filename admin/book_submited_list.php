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
          <h2 class="text-success">Issued Books List <a href="book_submit.php" class="btn btn-primary pull-right">Submit Books</a></h2>
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
                  <th>Submit</th>
                  <th>Fine</th>
                  <th>Action</th> 
                </tr>
                <?php
                    $serial = 1; 
                    while($book = $books->fetch_assoc()): 

                ?>
                <tr>
                  <td><?= $serial++; ?></td>
                  <td><?= $book['user_id']; ?></td>
                  <td><?= $book['book_id']; ?></td>
                  <td><?= date('d-m-Y',strtotime($book['issue_date'])); ?></td>
                  <td><?= date('d-m-Y',strtotime($book['submit_date'])); ?></td>
                  <td>
                    <?php if($book['active'] == 1){echo 'Active'; } else { 
                        echo '<span class="text-danger">Inactive</span>'; 
                        echo "<br>";
                    ?> 
                        <a href="book_issue_active.php?id=<?= $book['id']; ?>" class="text-success"><strong> Make Active</strong></a>
                    <?php } ?>
                  </td>   
                    <td>Expire/Ok</td>
                    <td>50/100 TK</td>  
                  <td>
                    <a href="book_view.php?id=<?= $book['id']; ?>" class="btn btn-xs btn-success"><i class="fa fa-eye"></i> </a>
                    <a href="book_edit.php?id=<?= $book['id']; ?>" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a> 
                   <a href="book_inactive.php?id=<?= $book['id']; ?>" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure you want to delete this item?');" ><i class="fa fa-trash"></i></a> 
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