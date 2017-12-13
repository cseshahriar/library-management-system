<?php require_once('inc/header.php'); ?>
<?php include_once('inc/sidebar.php'); ?>

<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2 class="text-success">Books List</h2>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-responsive table-bordered">
              <!-- single item for looping  -->
                <tr class="success">
                  <th>Book ID</th>
                  <th>Title</th>
                  <th>Author</th>
                  <th>Edition</th>
                  <th>Pages</th>
                  <th>Category</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                <tr>
                  <td>01</td>
                  <td>PHP User Guide</td>
                  <td>php.net</td>
                  <td>Second</td>
                  <td>1024</td>
                  <td>Programming</td>
                  <td>Active</td>  
                  <td>
                    <a href="book_view.php?id=" class="btn btn-xs btn-success"><i class="fa fa-eye"></i> </a>
                    <a href="book_edit.php?id=" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a> 
                   <a href="user_delete.php?id=" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure you want to delete this item?');" ><i class="fa fa-trash"></i></a> 
                  </td>
                </tr> 
                
                <!-- /single item for looping  -->
                
              </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once('inc/footer.php'); ?>