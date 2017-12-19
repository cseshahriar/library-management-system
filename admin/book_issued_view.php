<?php 
  $issue_id = $_GET['id'];
  include_once('../classes/Database.php');
  $db = new Database();
  //$sql = "SELECT * FROM books LEFT JOIN book_type ON books.cat_id=book_type.cat_id WHERE id='$id' ";
  $sql = "SELECT * FROM book_issue WHERE active='1'";
  $Mybooks = $db->getQuery($sql); 
  $book = $Mybooks->fetch_assoc();  
?>
<?php require_once('inc/header.php'); ?>
<?php include_once('inc/sidebar.php'); ?>

<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2 class="text-success">BookTitle's Informations</h2>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-responsive table-bordered table-hover">
              <tr>
                <td>User ID</td>
                <td><?= $book['user_id']; ?></td>
              </tr>
              <tr>
                <td>Book ID</td>
                <td><?= $book['book_id']; ?></td>
              </tr>
              <tr>
                <td>Issue Date</td>
                <td><?= date('d-m-Y',strtotime($book['issue_date'])); ?></td>
              </tr>
              <tr>
                <td>Submit Date</td>
                <td><?= date('d-m-Y',strtotime($book['submit_date'])); ?></td>
              </tr>
              <tr>
                  <td>Status</td>
                   <td>
                    <?php if($book['active'] == 1){echo 'Active'; } else { 
                        echo '<span class="text-danger">Inactive</span>'; 
                        echo "<br>";
                    ?> 
                        <a href="book_issue_active.php?id=<?= $book['id']; ?>" class="text-success"><strong> Make Active</strong></a>
                    <?php } ?>  
                  </td> 
              </tr>
                
          </table>
          <a href="book_issue_list.php" class="btn btn-success">Back Book Issue List</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once('inc/footer.php'); ?>