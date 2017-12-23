<?php 
  include_once('../classes/Database.php');
  $db = new Database();

  //settings 
  $sqlSelect = "SELECT * FROM settings";
  $settings = $db->getQuery($sqlSelect); 
  $setting = $settings->fetch_assoc(); 

  $teacher_max_keep_limit = $setting['teachers_max_keep_limit']; 

  $students_max_keep_limit = $setting['students_max_keep_limit'];

  $std_submit_date = date('Y-m-d', strtotime("+$teacher_max_keep_limit days")); 
  $t_submit_date = date('Y-m-d', strtotime("+$students_max_keep_limit days")); 

  if(isset($_POST['book_issue'])) {   

    $user_id = $_POST['user_id'];
    $book_id = $_POST['book_id'];
    $issue_date = date('Y-m-d');  //today 
    $std_submit_date = date('Y-m-d', strtotime("+$teacher_max_keep_limit days"));  
    $t_submit_date = date('Y-m-d', strtotime("+$students_max_keep_limit days")); 

    if(!empty($user_id || $book_id)){
     $sql = "INSERT INTO book_issue(user_id, book_id, submit_date, active) VALUES('$user_id', '$book_id', '$t_submit_date', '1')"; 
      $issue = $db->insert($sql); 
      if($issue) {
           echo "<script>window.location.href = 'book_issue_list.php'; </script>";  
      } 
    }//end empty 

  }//end isset post
?>
<?php require_once('inc/header.php'); ?> 
<?php include_once('inc/sidebar.php'); ?>  
<div class="content-wrapper">
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
              <label for="user_id">User ID</label>
              <select name="user_id" class="selpadfix form-control">
                <option value="" selected>Choose User ID</option>
                <?php 
                    $users = $db->getWhere("users", "active='1'"); 
                    while($user = $users->fetch_assoc()) { ?>
                        <option value="<?= $user['id']; ?>"> <?= $user['username']; ?></option> 
                    <?php } ?> 
              </select>
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

            <button type="submit" name="book_issue" class="btn btn-primary">Book Issue</button>
          </form>  

        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once('inc/footer.php'); ?>