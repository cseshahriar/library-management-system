<?php require_once('include/header.php'); ?> 
<?php
  include_once('classes/Database.php');
  $db = new Database();
 
  if(isset($_POST['book_issue'])) { 
    //$user_id = $_POST['user_id']; 
    $user_id = $_SESSION['st_id']; // from session
    $book_id = $_POST['book_id'];
    //$issue_date = date('Y-md-d');
    $submit_date = date('Y-m-d', strtotime("+6 days")); //issue date plus 6 days = 7 days

    if(!empty($_POST)){ 
      $sql = "INSERT INTO book_issue(user_id, book_id, submit_date, active) VALUES('$user_id', '$book_id', '$submit_date', '0')"; 
        $issue = $db->insert($sql); 
        
        if($issue) {
            header("Location: index.php");  
        }
    }
  }
?>

<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2 class="text-success">Books Issue</h2>
        </div>
        <div class="panel-body">
          <!-- Issue book form -->
          <form action="" method="post">
            <!-- user id -->
            <div class="form-group">
              <label for="user_id">User Name</label>
              <span><?php echo $_SESSION['st_username']; ?></span>
            </div> 

             <!-- book id -->
            <div class="form-group">
              <label for="book_id">Book ID</label>
              <select name="book_id" class="selpadfix form-control">
                <option value="" selected>Choose Book ID</option>
                <?php 
                    $books = $db->getWhere("books", "active='1'"); 
                    while($book = $books->fetch_assoc()) { ?>
                        <option value="<?= $book['id']; ?>"> <?= $book['title']; ?></option> 
                    <?php } ?> 
              </select>
            </div>
            
            <!-- issue date -->
            <div class="form-group">
              <label>Issue Date: </label>
              <span><?php echo date('Y-m-d'); ?></span>
              <!-- <input type="date" name="issue_date" class="form-control" /> -->
            </div>

            <!-- Submit date -->
            <div class="form-group"> 
              <label>Submit Date</label>
              <span><?php echo date('Y-m-d', strtotime("+6 days")) ?></span> 
              <!-- <input type="date" name="sbmit_date" class="form-control"> -->
            </div>

            <button type="submit" name="book_issue" class="btn btn-primary">Book Issue</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once('include/footer.php'); ?>