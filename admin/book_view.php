<?php 
  $id = $_GET['id'];
  include_once('../classes/Database.php');
  $db = new Database();
  $sql = "SELECT * FROM books LEFT JOIN book_type ON books.cat_id=book_type.cat_id WHERE id='$id' ";
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
              <!-- single item for looping  -->
                <tr>
                  <th>Title</th>
                  <td><?= $book['title']; ?></td>
                </tr>
                <tr>
                  <th>Book Catagory</th>
                  <td><?= $book['cat_name']; ?></td> <!-- cat_name not read for natural join problem -->
                </tr>
                <tr>
                  <th>Edition</th>
                  <td><?= $book['edition']; ?></td>
                </tr>
                <tr>
                  <th>Publish Year</th>
                  <td><?= $book['year']; ?></td>
                </tr>
                <tr>
                  <th>Author</th>
                  <td><?= $book['author']; ?></td>
                </tr>
                <tr>
                  <th>Publisher</th>
                  <td><?= $book['publisher']; ?></td>
                </tr>
                <tr>
                  <th>ISBN NO.</th>
                  <td><?= $book['isbn']; ?></td>
                </tr>
                <tr>
                  <th>Price</th>
                  <td><?= $book['price']; ?></td>
                </tr>
                <tr>
                  <th>Pages</th>
                  <td><?= $book['pages']; ?></td>
                </tr>
                <tr>
                  <th>Quantity</th>
                  <td><?= $book['quantity']; ?></td>
                </tr>
                <tr>
                  <th>Purchase Date</th>
                  <td><?= $book['purchase_date']; ?></td>
                </tr>
                <tr>
                  <th title="Purchase">Bill NO.</th> 
                  <td><?= $book['bill_no']; ?></td>
                </tr>
                <tr>
                  <th>Status</th>
                  <td><?php if($book['active'] == 1){echo 'Active'; } else {echo 'Inactive'; } ?></td>
                </tr>
                <!-- /single item for looping  -->
                
              </table>
              
              <a href="book_list.php" class="btn btn-success">Back Books List</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once('inc/footer.php'); ?>