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
                  <td>Head First Design Patterns</td>
                </tr>
                <tr>
                  <th>Book Catagory</th>
                  <td>Programming</td>
                </tr>
                <tr>
                  <th>Edition</th>
                  <td>Third Edition</td>
                </tr>
                <tr>
                  <th>Publish Year</th>
                  <td>2004</td>
                </tr>
                <tr>
                  <th>Author</th>
                  <td>O'Reilly Media</td>
                </tr>
                <tr>
                  <th>Publisher</th>
                  <td>O'Reilly Media</td>
                </tr>
                <tr>
                  <th>ISBN NO.</th>
                  <td>978-0-596-00712-6</td>
                </tr>
                <tr>
                  <th>Price</th>
                  <td>$1200 TK</td>
                </tr>
                <tr>
                  <th>Pages</th>
                  <td>1000</td>
                </tr>
                <tr>
                  <th>Quantity</th>
                  <td>03</td>
                </tr>
                <tr>
                  <th>Purchase Date</th>
                  <td>12-12-2017</td>
                </tr>
                <tr>
                  <th title="Purchase">Bill NO.</th>
                  <td>1234567890</td>
                </tr>
                <tr>
                  <th>Status</th>
                  <td>Active/inactive</td>
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