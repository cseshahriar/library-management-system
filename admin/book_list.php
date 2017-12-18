<?php 
  include_once('../classes/Database.php');
  $db = new Database();
  $books = $db->getQuery("SELECT * FROM books"); 
?>
<?php require_once('inc/header.php'); ?> 
<?php include_once('inc/sidebar.php'); ?>  

<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2 class="text-success">Books List <a href="book_add.php" class="btn btn-primary pull-right">Add Book</a></h2>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-responsive table-bordered">
              <!-- single item for looping  -->
                <tr class="success">
                  <th>Book ID</th>
                  <th>Title</th>
                  <th>ISBN</th>
                  <th>Author</th>
                  <th>Edition</th> 
                  <th>Pages</th>
                  <th>Status</th>
                  <th>Action</th> 
                </tr>
                <?php while($book = $books->fetch_assoc()): ?>
                <tr>
                  <td><?= $book['id']; ?></td>
                  <td><?= $book['title']; ?></td>
                  <td><?= $book['isbn']; ?></td>
                  <td><?= $book['author']; ?></td>
                  <td><?= $book['edition']; ?></td> 
                  <td><?= $book['pages']; ?></td> 
                  <td>
                    <?php if($book['active'] == 1){echo 'Active'; } else { 
                        echo '<span class="text-danger">Inactive</span>'; 
                    ?> 
                        <a href="book_active.php?id=<?= $book['id']; ?>" class="text-success"><strong> Make Active</strong></a>
                    <?php } ?>
                  </td>    
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