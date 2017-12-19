<?php 
  include_once('../classes/Database.php');
  $db = new Database();

  if(isset($_POST['book_issue'])) {
    $user_id = $_POST['user_id'];
    $book_id = $_POST['book_id'];
    //$issue_date = date('Y-md-d');
    $submit_date = date('Y-m-d', strtotime("+6 days")); //issue date plus 6 days = 7 days

    if(!empty($_POST)){
      $sql = "INSERT INTO book_issue(user_id, book_id, submit_date, active) VALUES('$user_id', '$book_id', '$submit_date', '1')"; 
        $issue = $db->insert($sql);
        
        if($issue) {
            header("Location: book_issue_list.php");  
        }
    }
  }
?>
<?php require_once('inc/header.php'); ?> 
<?php include_once('inc/sidebar.php'); ?>  
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2 class="text-success">Submit Book</h2>
        </div>
        <div class="panel-body">
          <!-- Issue book form -->
          <form action="" method="post">
            <!-- user id -->
            <div class="form-group">
              <label>Issue ID</label>
              <!-- user's id -> dropdown -> issued book list  -->
              <select name="issued_book" class="selpadfix form-control">
                <option value="" selected>Choose A Book</option>
                <option value="">issued book list</option>
              </select> 
            </div>
            <!-- Submit date -->
            <div class="form-group"> 
              <label>Submit Date</label>
              <span><?php echo date('Y-m-d'); ?></span> 
               <input type="date" name="sbmit_date" class="form-control">
            </div>

            <button type="submit" name="book_issue" class="btn btn-primary">Book Issue</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once('inc/footer.php'); ?>