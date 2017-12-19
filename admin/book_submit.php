<?php 
  include_once('../classes/Database.php');
  $db = new Database(); 

  if(isset($_POST['book_submit'])) {
    $user_id = $_POST['user_id'];
    //$book_id = $_POST['book_id'];
    //$issue_date = $_POST['issue_date'];
    //$issue_date_formated = date('Y-md-d', $issue_date);
    //$submit_date = date('Y-m-d'); //issue date plus 6 days = 7 days

    // if(!empty($_POST)){
    //   $sql = "INSERT INTO book_issue(user_id, book_id, submit_date, active) VALUES('$user_id', '$book_id', '$submit_date', '1')"; 
    //     $issue = $db->insert($sql);
        
    //     if($issue) {
    //         header("Location: book_issue_list.php");  
    //     }
    // }
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
            <!-- user id  -->
            <div class="form-group">
              <label for="user_id">User ID</label>
              <select name="user_id" class="form-control selpadfix">
                  <option value="" selected>Choose User</option>
                  <?php 
                      $sql = "SELECT * FROM users WHERE active='1' ";
                      $users = $db->getQuery($sql);
                      while($user = $users->fetch_assoc()) : ?>
                          <option value="<?= $user['id']; ?>"><?= $user['username']; ?></option>
                  <?php endwhile; ?>
              </select>
            </div>

            <!-- issue id list bu user id -->
          <!--  SELECT * FROM users RIGHT JOIN book_issue ON users.id=book_issue.user_id WHERE book_issue.active='1' -->
          

         
            <!-- Submit date --> 
            <button type="submit" name="book_submit" class="btn btn-primary">Book Issue</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once('inc/footer.php'); ?>