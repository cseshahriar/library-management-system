<?php 
  include_once('../classes/Database.php');
  $db = new Database();
  $books = $db->get("book_issue");  
?>
<?php require_once('inc/header.php'); ?>  
<?php include_once('inc/sidebar.php'); ?>  
<div class="content-wrapper"> 
  <div class="row">
    <div class="col-md-12">
        <!-- search -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 style="display: inline-block;">Search from issue list</h3>
                <!-- search -->
                <input type="text" name="search" id="search" class="form-control" placeholder="Search by Issue ID, Username and Book Title" />  
            </div>
            <div class="panel-body">
                <table id="result" class="table table-striped table-responsive table-bordered">
                 <!-- search result view here --> 

                </table>  
            </div>
        </div>
        <!-- /search -->

        <!-- issue lsit -->
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="text-success"> 
              Issued Books List     
              <!-- make issue -->
              <a href="book_issue.php" class="btn btn-primary pull-right">Issue Books</a></h2>
          </div>
          <div class="panel-body">
            <table class="table table-striped table-responsive table-bordered">
                <!-- single item for looping  -->
                  <tr class="success">
            
                    <th>Issue ID</th> 
                    <th>Username</th> <!-- user name -->
                    <th>Book ID</th><!--  book name --> 
                    <th>Issue Date</th>
                    <th>Submit Date</th>
                    <th>Status</th>
                    <th>Fine</th>
                    <th>Action</th> 
                  </tr>
                  <?php
                      while($book = $books->fetch_assoc()): 
                  ?>
                  <tr>
                    <td><?= $book['id']; ?></td> <!-- issue id -->
                    <td>
                      <?php
                          $user_id = $book['user_id'];
                          $usql = "SELECT username, role_id from users WHERE id='$user_id' ";
                          $user = $db->getQuery($usql);
                          $data = $user->fetch_assoc();
                          $role_id = $data['role_id']; //user role  
                          echo $data['username'];       
                      ?>  
                    </td>
                    <td> 
                       <?php
                          $book_id = $book['book_id'];
                          $usql = "SELECT title from books WHERE id='$book_id' ";
                          $user = $db->getQuery($usql);
                          $data = $user->fetch_assoc();
                          echo $data['title']; 
                      ?> 
                        
                    </td>
                    <td><?= date('d-m-Y',strtotime($book['issue_date'])); ?></td>
                    <td><?= date('d-m-Y',strtotime($book['submit_date'])); ?></td>
                    
                    <td>
                      <?php if($book['active'] == 1){ echo '<b class="text-success">Active</b>'; ?> 

                          <a href="book_issue_cancel.php?id=<?= $book['id']; ?>" class="text-success" onclick="return confirm('Are you sure you want to cancel this item?');"> | Make Cancel</a> 

                      <?php }else if($book['active'] == 2) {   
                            echo 'Returned'; 
                      } else if($book['active'] == 3) {   
                            echo 'Calceled'; 
                      ?>
                            <a href="book_issue_active.php?id=<?= $book['id']; ?>" class="text-success" onclick="return confirm('Are you sure you want to Active this item?');">
                                <strong>| Active</strong>
                            </a> 
                      <?php } else {  
                            echo '<span class="text-danger"><b>Inactive!</b></span>'; 
                      ?> 
                          <a href="book_issue_active.php?id=<?= $book['id']; ?>" class="text-success"> | Make Active</a> 
                      <?php } ?>  
                    </td>   

                    <!-- fine  -->
                  <td>
                   <?php 
                        date_default_timezone_set('Asia/Dhaka');
                        $issue_date= date('Y-m-d',strtotime($book['issue_date']));   
                        $submit_date = date('Y-m-d',strtotime($book['submit_date']));     
                      

                        $datetime1 = new DateTime($issue_date);
                        $datetime2 = new DateTime($submit_date); 
                        $interval = $datetime2->diff($datetime1);    

                        $intervalDate = $interval->format('%a'); //diff date got  
                        $intervalDate = (int)$intervalDate; // for issue id 1 = 8 days
                        //echo $intervalDate.'<br>'; 

                        
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

                                if($tfineday > 0) {
                                  $tfine = $tfineday * $teachers_fine;
                                  echo $tfine;  
                                }else {
                                  $tfine = '';
                                } 
                              

                            } else {  //students
                               $sfineday = $intervalDate - $students_max_keep_limit; 

                                if($sfineday > 0) {
                                  $sfine = $sfineday * $students_fine;
                                  echo $sfine;  
                                }else {
                                  $sfine = '';
                                }
                                
                            }       

                        }else if($intervalDate == 0) {   
                                echo '00.00 TK';      
                        } else { 
                                echo '00.00 TK';      
                        }    
                          
                    ?> 
                  </td>

                  <!-- return -->
                  <?php if($book['active'] != 2): ?>       
                    <td>
                     <a href="book_issue_inactive.php?id=<?= $book['id']; ?>" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"  title="Make Inactive"><i class="fa fa-trash"></i> Inactive</a>

                      <a href="book_submit.php?id=<?= $book['id']; ?>" class="btn btn-xs btn-warning" onclick="return confirm('Are you sure you want to submit this item?');" title="Send issue id">Return</a>    
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

<?php require_once('inc/footer.php'); ?>