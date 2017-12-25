<?php
	include_once('../classes/Database.php');
	$db = new Database;
	$search = $_POST['search']; 

	if(!empty($search)){
		$query = "SELECT * FROM book_issue   
		LEFT JOIN users ON book_issue.user_id=users.id 
		LEFT JOIN books ON book_issue.book_id=books.id 
		WHERE isbn LIKE '%$search%' OR book_issue.id LIKE '%$search%' OR username LIKE '%$search%' OR title LIKE '%$search%' ";        
		
		$data = $db->getQuery($query); ?>     
			      <tr class="result_tr">   
                <th>Username</th> <!-- user name -->
                <th>Book ID</th><!--  book name -->  
                <th>Issue Date</th>
                <th>Submit Date</th> 
                <th>Status</th>
                <th>Action</th>          
            </tr>  
		<?php while($row = $data->fetch_assoc()): ?>         
              <tr class="result_tr">  
              	<td><?= $row['username']; ?></td> 
              	<td><?= $row['title']; ?></td>
              	<td><?= $row['issue_date']; ?></td>
              	<td><?= $row['submit_date']; ?></td> 
              	<!-- status -->
              	<td>
                      <?php if($row['active'] == 1){ echo '<b class="text-success">Active</b>'; ?> 

                          <a href="book_issue_cancel.php?id=<?= $row['id']; ?>" class="text-success" onclick="return confirm('Are you sure you want to cancel this item?');"> | Make Cancel</a>

                      <?php }else if($row['active'] == 2) {   
                            echo 'Returned'; 
                      } else if($row['active'] == 3) {   
                            echo 'Calceled'; 
                      ?>
                            <a href="book_issue_active.php?id=<?= $row['id']; ?>" class="text-success" onclick="return confirm('Are you sure you want to Active this item?');">
                                <strong>| Active</strong>
                            </a> 
                      <?php } else {  
                            echo '<span class="text-danger"><b>Inactive!</b></span>'; 
                      ?> 
                          <a href="book_issue_active.php?id=<?= $row['id']; ?>" class="text-success"> | Make Active</a>   
                      <?php } ?>    
                    </td>  

					<!-- return -->
                    <?php if($row['active'] != 2): ?>
                    <td>
                     <a href="book_issue_inactive.php?id=<?= $row['id']; ?>" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"  title="Make Inactive"><i class="fa fa-trash"></i> Inactive</a>

                      <a href="book_submit.php?id=<?= $row['id']; ?>" class="btn btn-xs btn-warning" onclick="return confirm('Are you sure you want to submit this item?');" title="Send issue id">Return</a>   
                    </td> 
                    <?php  endif; ?>     
              </tr> 
          <?php endwhile; ?>  
	<?php } ?>


<style>
  .result_tr{

  }
  .result_tr th{
    padding: 10px;
    border: 1px solid #ddd;
  }
  .result_tr td {
    padding: 6px;
    border: 1px solid #ddd;
  }
</style>