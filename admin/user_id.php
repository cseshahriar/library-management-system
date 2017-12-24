<?php
  $id = $_GET['id'];

  //process file 
	include_once('../classes/Database.php');
	$db = new Database;   
  $sql3 = "SELECT * FROM users LEFT JOIN book_issue ON users.id=book_issue.user_id WHERE users.id='$id'";
  $data = $db->getQuery($sql3);
  $row = $data->fetch_assoc();  
  $user_role_id = $row['role_id']; // user role id here 

  //settings
  $sqlSelect = "SELECT * FROM settings";
  $settings  = $db->getQuery($sqlSelect);  
  $setting   = $settings->fetch_assoc(); 

  $teachers_max_keep_limit = $setting['teachers_current_limit'];  
  $students_max_keep_limit = $setting['students_current_limit']; 
  $teachers_month_limit = $setting['teachers_max_book_limit'];  
  $students_month_limit = $setting['students_max_book_limit']; 

  //current max book keep limit
  $ccurrentSql = "SELECT * FROM book_issue WHERE user_id='$id' AND active='1' ";
  $climit = $db->getQuery($ccurrentSql); 
  $rowcount = mysqli_num_rows($climit ); //how much row  

  //know monthly limit 
  $monthlyLimit = "SELECT * FROM book_issue WHERE user_id='$id' AND YEAR(issue_date) = YEAR(CURRENT_DATE()) AND MONTH(issue_date) = MONTH(CURRENT_DATE());";

  $mlimit = $db->getQuery($monthlyLimit); 
  $mrowcount = mysqli_num_rows($mlimit ); //how much row    

  // check role id  
  if($user_role_id == 1){ //teachers 
     if(!($rowcount >= $teachers_max_keep_limit) && !($mrowcount >= $teachers_month_limit) ) { ?>
          <div class="form-group">
            <input type="hidden" name="role" value="<?= $user_role_id; ?>" /> 
            <input type="hidden" name="user_id" value="<?= $id; ?>" />   
          </div> 
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
            <button type="submit" name="book" class="btn btn-primary">Book Issue</button> 
    <?php } 

  } else { //students
       if(!($rowcount >= $students_max_keep_limit) && !($mrowcount >= $students_month_limit) ) { ?>
          <div class="form-group">
            <input type="hidden" name="role" value="<?= $user_role_id; ?>" /> 
            <input type="hidden" name="user_id" value="<?= $id; ?>" />   
          </div> 
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
            <button type="submit" name="book_issue" class="btn btn-primary">Book Issue</button>  
    <?php }  

  }

?>  
