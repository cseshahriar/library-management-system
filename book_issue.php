<?php require_once('include/header.php'); ?>
<?php if(isset($_SESSION['st_id'])): ?> 
<?php
  include_once('classes/Database.php');
  $db = new Database();
  $user_id = $_SESSION['st_id'];
  $role_id = $_SESSION['st_role_id'];  


   //settings
    $sqlSelect = "SELECT * FROM settings";
    $settings  = $db->getQuery($sqlSelect); 
    $setting   = $settings->fetch_assoc();

    $teachers_max_keep_limit = $setting['teachers_current_limit'];  //7
    $students_max_keep_limit = $setting['students_current_limit']; //7
    $teachers_month_limit = $setting['teachers_max_book_limit'];  //10 
    $students_month_limit = $setting['students_max_book_limit']; //7

  if(isset($_POST['book_issue'])) { 
    $book_id = $_POST['book_id'];
    $st_submit_date = date('Y-m-d', strtotime("+$students_max_keep_limit days")); 
    $t_submit_date = date('Y-m-d', strtotime("+$teachers_max_keep_limit  days"));

    if(!empty($_POST)){  

      if($role_id == 1) { //teachers
          $sql = "INSERT INTO book_issue(user_id, book_id, submit_date, active) VALUES('$user_id', '$book_id', '$t_submit_date', '0')"; 
          $issue = $db->insert($sql); 
          if($issue) {
              header("Location: book_issue_list.php");  
          } 

      } else { //students
          $sql = "INSERT INTO book_issue(user_id, book_id, submit_date, active) VALUES('$user_id', '$book_id', ' $st_submit_date', '0')"; 
          $issue = $db->insert($sql); 
          
          if($issue) {
              header("Location: book_issue_list.php");  
          } 

      }
      
    }

  } 
?>

<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2 class="text-success">Issue a Book</h2>
        </div>
        <div class="panel-body">
           <!-- restriction 1) at a time limit and 2) per month limit --> 
            <?php 
                //settings
                $sqlSelect = "SELECT * FROM settings"; 
                $settings  = $db->getQuery($sqlSelect); 
                $setting   = $settings->fetch_assoc();

                $teachers_max_keep_limit = $setting['teachers_current_limit'];  
                $students_max_keep_limit = $setting['students_current_limit']; 
                $teachers_month_limit = $setting['teachers_max_book_limit'];  
                $students_month_limit = $setting['students_max_book_limit'];   

                //max keep limit
                $ccurrentSql = "SELECT * FROM book_issue WHERE user_id='$user_id' AND active='1' OR active='0' "; 
                $climit = $db->getQuery($ccurrentSql);
                $rowcount = '';
                if( $climit != false){
                  $rowcount = mysqli_num_rows($climit ); //how much row  
                }else { 
                  //echo 'Data not found';
                }

                //know monthly limit
                $monthlyLimit = "SELECT * FROM book_issue WHERE user_id='$user_id' AND YEAR(issue_date) = YEAR(CURRENT_DATE()) AND MONTH(issue_date) = MONTH(CURRENT_DATE());";

                $mlimit = $db->getQuery($monthlyLimit);
                $mrowcount = ''; 
                if($mlimit != false){
                  $mrowcount = mysqli_num_rows($mlimit ); //how much row 
                }else {
                  //data not found 
                }
            ?>
        <?php 
            // check role id  
            if( $role_id == 1) { //teacher 
                if(!($rowcount >= $teachers_max_keep_limit) && !($mrowcount >= $teachers_month_limit) ) { ?>
                      <!-- Issue book form -->
                  <form action="" method="post"> 
                    <!-- user id -->
                    <div class="form-group">
                      <label for="user_id">User Name:</label>
                      <span><strong><?php echo $_SESSION['st_username']; ?></strong></span>
                    </div> 
                   
                     <!-- book id -->
                    <div class="form-group">
                      <label for="book_id">Book Name</label>
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
                <?php } else {
                     //error message
                    if( $rowcount >= $teachers_max_keep_limit){        
                      echo 'Return a book first!'; 
                    } else {
                      echo 'Monthly limit over!';
                    }
                }
            } else { //studenet
                    // row = 3 > limit = 3 (if row < limit)
                    //!($rowcount >= $students_max_keep_limit) && !($mrowcount >= $students_month_limit)
                if(!($rowcount >= $students_max_keep_limit) && !($mrowcount >= $students_month_limit)) { ?> 
                        <!-- Issue book form -->
                      <form action="" method="post">
                        <!-- user id -->
                        <div class="form-group">
                          <label for="user_id">User Name:</label> 
                          <span><strong><?php echo $_SESSION['st_username']; ?></strong></span>
                        </div> 
                       
                         <!-- book id -->
                        <div class="form-group">
                          <label for="book_id">Book Name </label>
                          <select name="book_id" class="selpadfix form-control">
                            <option value="" selected>Choose a Book</option>
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
                <?php } else {
                    //error message
                    if( $rowcount >= $students_max_keep_limit){
                      echo 'Return a book first!'; 
                    } else {
                      echo 'Monthly limit over!';
                    }
                }
            }
        ?>
           
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once('include/footer.php'); ?>
<?php 
  else: 
      echo "<script>window.location.href = 'login.php'; </script>"; 
  endif;  
?>