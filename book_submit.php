<?php 
  session_start(); 
  if($_SESSION['user_role_id'] == 1) :  
?>
<?php 
    include_once('classes/Database.php');  
    $db = new Database(); 
    $issue_id = $_GET['id'];  //issue id
     
    $sql = "SELECT * FROM book_issue LEFT JOIN users ON book_issue.user_id=users.id WHERE book_issue.id='$issue_id' "; 
    $issue = $db->getQuery($sql);
    $data = $issue->fetch_assoc();   

    $user_role_id = $data['role_id']; 
    $user_id  = $data['user_id'];

    date_default_timezone_set('Asia/Dhaka');
    $issue_date = date('Y-m-d', strtotime($data['issue_date']));
    $submit_date = date('Y-m-d', time()); //today

    $datetime1 = new DateTime($issue_date);
    $datetime2 = new DateTime($submit_date);
    $interval = $datetime2->diff($datetime1); 

    $intervalDate = $interval->format('%a'); //diff date got  
    $intervalDate = (int)$intervalDate; // for issue id 1 = 8 days

    $sqlSelect = "SELECT * FROM settings";
    $settings = $db->getQuery($sqlSelect); 
    $setting = $settings->fetch_assoc();

    $teachers_max_keep_limit = $setting['teachers_max_keep_limit']; //10
    $students_max_keep_limit = $setting['students_max_keep_limit']; //7

    $teachers_fine =  $setting['teachers_fine']; 
    $students_fine = $setting['students_fine'];

    $tfine = '';
    $sfine = '';

    if($user_role_id == 1) { //teacher 
        $teacherFineDays = $intervalDate - $teachers_max_keep_limit; 
        
        if($teacherFineDays > 0 ) { 
          $tfine = $teacherFineDays * $teachers_fine;  
          //echo $tfine; 
        } else {
          $tfine = ''; 
        }
    } else { // students
        $studentFineDays = $intervalDate - $students_max_keep_limit; 
        
        if($studentFineDays > 0 ) { 
          $sfine = $studentFineDays * $students_fine;    
        } else {
          $sfine = '';  
        }
    }
    
  // submit process
  if($user_role_id == 1) { //teachers
      $sql = "INSERT INTO book_return(issue_id,submited_date, fine, active) 
      VALUES('$issue_id', '$submit_date', '$tfine', '1')"; 
      $insert = $db->insert($sql); //book submit
      
      // remove from issue table
      $update = "UPDATE book_issue SET active='2' WHERE id=' $issue_id' ";
      $db->update($update); 
      header("Location: book_submited_list.php"); 
  } else { //students 
        $sql = "INSERT INTO book_return(issue_id,submited_date, fine, active) 
        VALUES('$issue_id', '$submit_date', '$sfine', '1')";  
      $insert = $db->insert($sql); //book submit

      $update = "UPDATE book_issue SET active='2' WHERE id='$issue_id' ";
      $db->update($update);
      header("Location: book_submited_list.php"); 
  }

?>
<?php 
  else: 
      echo "<script>window.location.href = 'login.php'; </script>"; 
  endif;
?>

