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
                  <th>User ID</th>
                  <th>Book ID</th>
                  <th>Issue Date</th>
                  <th>Submit Date</th>
                  <th>Status</th>
                  <th>Fine</th>
                  <th>Action</th> 
                </tr>
                <?php 
                    $serial = 1; 
                    while($book = $books->fetch_assoc()): ?>
                <tr>
                  <td><?= $serial++; ?></td>
                  <td><?= $book['id']; ?></td> <!-- issue id -->
                  <td>
                    <?php 
                        $user_id = $book['user_id'];
                        $sql = "SELECT username from users WHERE id='$user_id' ";
                        $data = $db->getQuery($sql); 
                        $row = $data->fetch_assoc();
                        echo $row['username'];
                     ?>
                  </td>
                  <td>
                     <?php 
                        $book_id = $book['book_id'];
                        $sql = "SELECT title from books WHERE id='$book_id' "; 
                        $data = $db->getQuery($sql); 
                        $row = $data->fetch_assoc(); 
                        echo $row['title'];   
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
                <td>
                   <?php 
                        date_default_timezone_set('Asia/Dhaka');
                        $today = date('Y-m-d');
                        $submit_date = date('Y-m-d',strtotime($book['submit_date'])); 
                      

                        $datetime1 = new DateTime($today);
                        $datetime2 = new DateTime($submit_date);
                        $interval = $datetime2->diff($datetime1); 

                        $intervalDate = $interval->format('%a'); //diff date got  
                        $intervalDate = (int)$intervalDate; // for issue id 1 = 8 days
                        
                        if($intervalDate > 0 ) {
                            $sqlSelect = "SELECT * FROM settings";
                            $settings = $db->getQuery($sqlSelect); 
                            $setting = $settings->fetch_assoc();

                            $teachers_fine =  $setting['teachers_fine']; 
                            $students_fine = $setting['students_fine'];

                            if($role_id == 1) { //teacher
                                $tfine = $intervalDate * $teachers_fine;
                                 if(!($book['active'] == 0)){       
                                    echo $tfine; 
                                  }
                            } else { //students
                                $sfine = $intervalDate *  $students_fine;
                                 if(!($book['active'] == 0)){    
                                    echo $sfine;   
                                  }
                            }       
                        }else if($intervalDate == 0){ 
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