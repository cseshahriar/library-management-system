<?php 
  include_once('../classes/Database.php');
  $db = new Database();
  //for value set
  $id = $_GET['id'];
  $sql = "SELECT * FROM books LEFT JOIN book_type ON books.cat_id=book_type.cat_id WHERE id='$id' ";
  $Mybooks = $db->getQuery($sql); 
  $book = $Mybooks->fetch_assoc(); 
  // end value set


  //update process
  if(isset($_POST['book_update'])){
    $cat_id = checkInput($_POST['book_cat']); 
    $isbn = checkInput($_POST['isbn']);
    $title = checkInput($_POST['title']);
    $author = checkInput($_POST['author']);
    $quantity = checkInput($_POST['quantity']); 
    

    //date_default_timezone_set('Asia/Dhaka');
    $p_date = $_POST['p_date'];
    $date = date("Y-m-d H:i:s", strtotime($p_date));   

    $edition = checkInput($_POST['edition']);    
    $price = $_POST['price'];
    $pages = $_POST['pages'];
    $year = $_POST['year'];
    $publisher = $_POST['publisher'];
    $bill_no = $_POST['bill_no'];      

    if(!empty($_POST)){

      $sql = "UPDATE books SET cat_id='$cat_id', isbn='$isbn', title='$title', author='$author', quantity='$quantity', purchase_date='$p_date', edition='$edition', price='$price', pages='$pages', year='$year', publisher='$publisher', bill_no='$bill_no' WHERE id='$id' ";   

      $update = $db->update($sql);  
      if($update) { 
        header("Location: book_list.php");       
      }
    }
  }

  /**
   * [checkInput feltering form data]
   * @param  [form input] $data [form inputs data]
   * @return [form input]       [form input data]
   */
  function checkInput($data) 
  {
      $data = trim($data);
      $data = htmlentities($data);
      $data = htmlspecialchars($data);
      return $data;   
  } 

?>
<?php require_once('inc/header.php'); ?>
<?php include_once('inc/sidebar.php'); ?> 

<div class="content-wrapper">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading"> 
          <h2>Add Book</h2>
        </div>
        <div class="panel-body">
          <!-- Book registration --> 
          <form action="" method="post">
             <div class="form-group">
               <label for="book_cat">Books Category</label>
               <select name="book_cat" id="book_cat" class="form-control selpadfix">
                 <option value="<?= $book['cat_id'] ?>" selected><?= $book['cat_name']; ?></option>
                <?php 
                     $book_types = $db->getWhere("book_type", "active='1'");
                     while($book_type =$book_types->fetch_assoc()){ ?>
                        <option value="<?= $book_type['cat_id']; ?>"><?= $book_type['cat_name']; ?></option>
                      <?php } ?>
               </select>
             </div>
             <div class="form-group">
               <label for="isbn">ISBN NO.</label>
               <input type="text" name="isbn" id="isbn" class="form-control" value="<?= $book['isbn']; ?>" />
             </div>
             <div class="form-group">
               <label for="title">Book Title</label>
               <input type="text" name="title" id="title" class="form-control" value="<?= $book['title']; ?>" />
             </div>

             <div class="form-group">
               <label for="author">Author</label>
               <input type="text" name="author" id="author" class="form-control" value="<?= $book['author']; ?>">
             </div>

             <div class="form-group">
               <label for="quantity">Quantity</label>
                <input type="text" name="quantity" id="quantity" class="form-control" value="<?= $book['quantity']; ?>" /"> 
             </div>

             <!-- date value set problem -->
             <div class="form-group">
               <label for="p_date">Purchase Data</label>
                <input type="date" name="p_date" id="p_date" value="<?= date('Y-m-d',strtotime($book['purchase_date'])); ?>" class="form-control" />
                <span>Purchase Date: <?= $book['purchase_date']; ?></span>
             </div>
             <div class="form-group">
               <label for="edition">Edition</label>
               <input type="edition" name="edition" id="edition" class="form-control" value="<?= $book['edition']; ?>">
             </div>
             <div class="form-group"> 
               <label id="price">Price</label>
               <input type="number" name="price" id="price" class="form-control" value="<?= $book['price']; ?>" /> 
             </div> 
             <div class="form-group">
               <label for="pages">Pages</label>
               <input type="number" name="pages" id="pages" class="form-control" value="<?= $book['pages']; ?>" />
             </div>
             <div class="form-group">
               <label for="year">Year</label>
               <input type="text" name="year" id="year" class="form-control" value="<?= $book['year']; ?>" />
             </div> 
             <div class="form-group">
               <label for="publisher">Publisher</label>
               <input type="text" name="publisher" id="publisher" class="form-control" value="<?= $book['publisher']; ?>" />
             </div>
             <div class="form-group">
               <label for="bill_no">Bill NO.</label>
               <input type="number" name="bill_no" id="bill_no" class="form-control" value="<?= $book['bill_no']; ?>" />
             </div>

            <button type="submit" name="book_update" class="btn btn-success btn-block btn-lg">Add Book</button>  
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