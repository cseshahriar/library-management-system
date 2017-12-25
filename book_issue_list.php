<?php require_once('include/header.php'); ?>   
<?php if(isset($_SESSION['st_id'])): ?>
<?php 
  include_once('classes/Database.php');
  $db = new Database();
  $user_id = $_SESSION['st_id'];
  $role_id = $_SESSION['st_role_id']; 
  $sql = "SELECT * FROM book_issue WHERE user_id='$user_id'"; 
  $books = $db->getQuery($sql);    
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">   
        <div class="panel-heading">
          <h2 class="text-success">Issued Books List <a href="book_issue.php" class="btn btn-primary pull-right">Issue Books</a></h2>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-responsive table-bordered">
              <!-- single item for looping  -->
                <tr class="success">
                  <th>Sr No.</th>
                  <th>Issue ID</th>
                  <th>User Name</th>
                  <th>Book Name</th>
                  <th>Issue Date</th>
                  <th>Submit Date</th>
                  <th>Status</th>
                  <th>Fine</th>
                  <th>Action</th> 
                </tr>
              <?php if($books != false): ?>
                <?php 
                    $serial = 1; 
                    while($book = $books->fetch_assoc()): ?>
                <tr>
                  <td><?= $serial++; ?></td>
                  <td><?= $book['id']; ?></td> <!-- issue id -->
                  <td>
                    <?php 
                        $user_id = $book['user_id'];
                        $sql = "SELECT username FROM users WHERE id='$user_id' ";
                        $data = $db->getQuery($sql); 

                        $urow = $data->fetch_assoc();
                        echo $urow['username']; 
                     ?>
                  </td>
                  <td>
                     <?php 
                        $book_id = $book['book_id']; 
                        $sql = "SELECT title FROM books WHERE id='$book_id' "; 
                        $data = $db->getQuery($sql);
                        $brow =  '';
                        if($data != false) {
                          $brow = $data->fetch_assoc(); 
                        }
                        echo $brow['title'];   
                     ?>
                  </td>         
                  <td><?= date('d-m-Y',strtotime($book['issue_date'])); ?></td>
                  <td><?= date('d-m-Y',strtotime($book['submit_date'])); ?></td>
                  
                  <td>
                    <?php 
                        //expire 
                        $today = date('Y-m-d');
                        $submit_date = date('Y-m-d',strtotime($book['submit_date']));
                        if($today > $submit_date && !($book['active'] == 2) ) {
                          echo '<span class="text-danger">Expire |</span>';
                        }
                     ?>
                    <?php if($book['active'] == 1){ echo '<b class="text-success">Active</b>'; ?> 
                    <?php }else if($book['active'] == 2) {   
                          echo 'Returned'; 
                    } else if($book['active'] == 3) {   
                          echo 'Calceled'; 
                    ?>
                    <?php } else { echo '<span class="text-danger"><b>Inactive!</b></span>'; } ?>  
                  </td>    

                  <!-- fine  --> 
                  <td>
                   <?php 
                        date_default_timezone_set('Asia/Dhaka');
                        $issue_date= date('Y-m-d',strtotime($book['issue_date']));   
                        $submited_date = date('Y-m-d'); //today      
                      

                        $datetime1 = new DateTime($issue_date);//issue date
                        $datetime2 = new DateTime($submited_date); // today  
                        $interval = $datetime2->diff($datetime1);    

                        $intervalDate = $interval->format('%a'); //diff date got  
                        $intervalDate = (int)$intervalDate; // 
                        //echo $intervalDate; 

                        
                        //echo  $intervalDate; // 7 
                        if($intervalDate > 0 ) { 
                            $sqlSelect = "SELECT * FROM settings";
                            $settings = $db->getQuery($sqlSelect); 
                            $setting = $settings->fetch_assoc();

                            $teachers_fine =  $setting['teachers_fine']; 
                            $teacher_max_keep_limit = $setting['teachers_max_keep_limit']; 

                            $students_fine = $setting['students_fine'];
                            $students_max_keep_limit = $setting['students_max_keep_limit'];

                            if($role_id == 1 ) { //teacher
                                $tfineday = $intervalDate - $teacher_max_keep_limit;
                                //echo $tfineday;

                                if($tfineday > 0) {
                                  $tfine = $tfineday * $teachers_fine; 
                                  echo $tfine;  
                                }else {
                                  $tfine = '';
                                  echo '00.00 TK';
                                } 
                              

                            } else {  //students
                               $sfineday = $intervalDate - $students_max_keep_limit; 
                               //echo $sfineday;  
                                if($sfineday > 0) {
                                  $sfine = $sfineday * $students_fine;
                                  echo $sfine;  
                                }else {
                                  $sfine = '';
                                  echo '00.00 TK'; 
                                }
                                
                            }       

                        }else if($intervalDate == 0) {   
                                echo '00.00 TK';      
                        } else { 
                                echo '00.00 TK';       
                        }    
                          
                    ?> 
                  </td>
                <?php if($book['active'] != 2): ?>
                  <td>
                    <?php if($book['active'] == 1): ?>
                    <a href="book_submit.php?id=<?= $book['id']; ?>" class="btn btn-xs btn-primary" onclick="return confirm('Are you sure you want to submit this item?');"><i class="fa fa-trash"></i> Return This Book</a>   
                  <?php endif; ?>   
                  </td> 
                  <?php  endif; ?>
                </tr> 
              <?php endwhile; ?>    
            <?php else: ?>
              <tr class="text-danger">Data not found!</tr> 
            <?php endif; ?>
                
                <!-- /single item for looping  -->
                
              </table>
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