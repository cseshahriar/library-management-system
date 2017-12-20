<?php  session_start(); ?>
<?php if($_SESSION['st_id']) : ?>  
<?php 
    include_once('classes/Database.php');
    $db = new Database(); 
    $issue_id  = $_GET['id'];  
    $user_id   = $_SESSION['st_id']; 
    $user_role = $_SESSION['st_role_id'];

    $sql = "SELECT * FROM book_issue WHERE user_id='$user_id' AND active='1' "; 
    $issue = $db->getQuery($sql);
    $data = $issue->fetch_assoc();     

    //$user_role = $data['role_id']; 
    //$user_id  = $data['user_id'];  
    date_default_timezone_set('Asia/Dhaka');
    $issue_date = date('Y-m-d', strtotime($data['issue_date']));
    $submit_date = date('Y-m-d', time()); 
    $datetime1 = new DateTime($issue_date);
    $datetime2 = new DateTime($submit_date);
    $interval = $datetime1->diff($datetime2);
    $intervalDate = $interval->format('%a'); //diff date got  
    $intervalDate = (int)$intervalDate;
    $fineDays = $intervalDate - 7;  
    //$fine = ''; 

   //insert process
   if($user_role == 1) { //teacher 100 tk per/day
      if(!$fineDays < 8) { 
          $fine = $fineDays * 100;
      } else {
          $fine = null;   
      }

      $sql = "INSERT INTO book_return(issue_id,submited_date, fine, active) VALUES('$issue_id', '$submit_date', '$fine', '0')"; 
      $insert = $db->insert($sql); //book submit

      // remove from issue table
      $update = "UPDATE book_issue SET active='0' WHERE id=' $issue_id' "; 
      $db->update($update); 

      header("Location: book_submited_list.php");  

   } else { //student 50 tk per/day
      if(!$fineDays < 8) { 
          $fine = $fineDays * 50;   
      } else {  
        $fine = null;    
      }

      $sql = "INSERT INTO book_return(issue_id,submited_date, fine, active) VALUES('$issue_id', '$submit_date', '$fine', '1')";
      $insert = $db->insert($sql); //book submit

      // remove from issue table
      $update = "UPDATE book_issue SET active='0' WHERE id=' $issue_id' "; 
      $db->update($update);    

      header("Location: book_submited_list.php");  
   }  
?>
<?php 
  else: 
      echo "<script>window.location.href = 'login.php'; </script>"; 
  endif;
?>

