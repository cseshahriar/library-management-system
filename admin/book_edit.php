<?php require_once('inc/header.php'); ?>
<?php include_once('inc/sidebar.php'); ?>

<div class="content-wrapper">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2>Update Book</h2> 
        </div>
        <div class="panel-body">
          <!-- admin registration -->
          <form action="process.php" method="post" enctype="multipart/form-data">
             <div class="form-group">
               <label for="book_cat">Books Category</label>
               <select name="book_cat" id="book_cat" class="form-control selpadfix">
                 <option value="" selected>Choose Books Category</option>
                 <option></option>
               </select>
             </div>
             <div class="form-group">
               <label for="isbn">ISBN NO.</label>
               <input type="text" name="isbn" id="isbn" class="form-control" placeholder="ISBN NO." />
             </div>
             <div class="form-group">
               <label for="title">Book Title</label>
               <input type="text" name="title" id="title" class="form-control" placeholder="Book Title" />
             </div>

             <div class="form-group">
               <label for="author">Author</label>
               <input type="text" name="author" id="author" class="form-control" placeholder="Author Name">
             </div>

             <div class="form-group">
               <label for="quantity">Quantity</label>
                <input type="text" name="quantity" id="quantity" class="form-control" placeholder="Quantity"> 
             </div>

             <div class="form-group">
               <label for="p_date">Purchase Data</label>
                <input type="date" name="p_date" id="p_date" class="form-control" placeholder="Purchase date">
             </div>
             <div class="form-group">
               <label for="edition">Edition</label>
               <input type="edition" name="edition" id="edition" class="form-control" placeholder="Book Edition">
             </div>
             <div class="form-group"> 
               <label id="price">Price</label>
               <input type="number" name="price" id="price" class="form-control" placeholder="Book Price">
             </div>
             <div class="form-group">
               <label for="pages">Pages</label>
               <input type="number" name="pages" id="pages" class="form-control" placeholder="Pages">
             </div>
              <div class="form-group">
               <label for="year">Year</label>
               <input type="text" name="year" id="year" class="form-control" placeholder="Published Year">
             </div>
             <div class="form-group">
               <label for="publisher">Publisher</label>
               <input type="text" name="publisher" id="publisher" class="form-control" placeholder="Publisher Name">
             </div>
             <div class="form-group">
               <label for="bill_no">Bill NO.</label>
               <input type="number" name="bill_no" id="bill_no" class="form-control" placeholder="Bill NO.">
             </div>

            <button type="submit" class="btn btn-success btn-block btn-lg">Update Book Information</button>
          </form>   
        </div> 
      </div>
    </div>
  </div>
    </div>
  </div>
    <?php include_once('inc/copyright.php'); ?> <!-- copyright -->
</div>
<?php require_once('inc/footer.php'); ?> 