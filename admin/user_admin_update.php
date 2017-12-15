<?php $id = $_GET['id']; 
  require_once('../classes/Database.php');  
  $db = new Database();   
  $data = $db->getWhere("admin", "id='$id'");  
  $row = $data->fetch_assoc();  

  $name = $gender = $email = $phone = $address = ''; 
  $name_error = $gender_error = $email_error = $phone_error = $address_error = '';         

  if( isset($_POST['admin_update'])) {
    //admin_roel = 1 manuali 
    
    //name validation
    if(empty($_POST['name'])) {
          $name_error = 'Name is required';
    } else {
      $name = checkInput($_POST['name']);
      if(!preg_match("/^[A-Za-z. ]*$/", $name)) {
          $name_error = 'Only Letters and white space are allowed'; 
      }
    }

    //gender validation
    if(empty($_POST['gender'])) {
          $gender_error = 'Gender is required';      
    } else {
        $gender = checkInput($_POST['gender']);
    }

    //email validation
    if(empty($_POST['email'])) {
        $email_error = 'Email is required'; 
    } else {
        $email = checkInput($_POST['email']);  
        if(!preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/", $email)) {
            $email_error = 'Invalid email formate!';    
        }
    }

    //phone validation
    if(empty($_POST['phone'])) {
        $phone_error = 'Phone is required'; 
    } else {
        $phone = checkInput($_POST['phone']);  
        if(!preg_match("/^[0-9]{11}$/", $email)) { 
            $phone_error = 'Invalid phone number formate!';    
        } 
    }

    //address validation
     if(empty($_POST['address'])) {
          $address_error = 'Address is required';    
    } else {
      $address = checkInput($_POST['address']); 
      if(!preg_match("/^[A-Za-z0-9_-, ]*$/", $address)) {
          $address_error = 'Only Letters, Numbers, _,-, comma and white space are allowed';  
      } 
    }   

    // validation end
    if(!($name_error && $gender_error && $email_error  && $phone_error && $address_error)) { 
 
        // insert process
        $sql = "UPDATE admin SET name='$name', gender='$gender',email='$email', phone='$phone', address='$address' WHERE id='$id' "; 
        $user = $db->update($sql);     
        if($user) { 
          header("Location: users_admin_list.php");   
        }
    }

  }     

  /**
   * [checkInput feltering form data]
   * @param  [form input] $data [form inputs data]
   * @return [form input]       [form input data]
   */
  function checkInput($data) 
  {
      $data = trim($data);
      $data = htmlentities($data);
      $data = htmlspecialchars($data);
      return $data;   
  }   
?>
<?php require_once('inc/header.php'); ?>
<?php include_once('inc/sidebar.php'); ?> 
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2 class="text-center">Update Admin Information</h2>
        </div>
        <div class="panel-body">
          <!-- admin registration -->
          <form action="" method="post" enctype="multipart/form-data">
            <!-- admin role is 1  -->
            <div class="form-group"> 
              <label for="name">Name <i class="fa fa-star text-danger" aria-hidden="true"></i></label>
              <input type="text" name="name" class="form-control" id="name" value="<?= $row['name']; ?>" />
              <span id="msg" class="error text-danger"><?php if(isset($name_error)) {echo $name_error; } ?></span>    
            </div>
            <!-- gender -->
            <div class="radio">
              <p><strong>Choose Gender <i class="fa fa-star text-danger" aria-hidden="true"></i></strong></p>
              <label>
                <input type="radio" name="gender" value="Male" <?php if($row['gender'] === 'Male'){echo 'checked';} ?> /> Male
              </label>
            </div>
            <div class="radio"> 
              <label>
                <input type="radio" name="gender" value="Female" <?php if($row['gender'] === 'Female'){echo 'checked';} ?> /> Female 
              </label><br>
              <span id="msg" class="error text-danger"><?php if(isset($gender_error)) {echo $gender_error; } ?></span>
            </div> 
            <!-- username -->
            <div class="form-group">
              <label for="username">Username <i class="fa fa-star text-danger" aria-hidden="true"></i></label>
              <input type="text" id="username" class="form-control" value="<?= $row['username']; ?>" disabled>
              <span id="msg" class="error text-danger"><?php if(isset($username_error)) {echo $username_error; } ?></span>
            </div> 
            <div class="form-group">    
              <label for="email">Email <i class="fa fa-star text-danger" aria-hidden="true"></i></label>
              <input type="email" name="email" id="email" class="form-control" value="<?= $row['email']; ?>"  />
              <span id="msg" class="error text-danger"><?php if(isset($email_error)) {echo $email_error; } ?></span>
            </div>
            <!-- phone -->
            <div class="form-group"> 
              <label for="phone">Phone <i class="fa fa-star text-danger" aria-hidden="true"></i></label>
              <input type="text" name="phone" id="phone" class="form-control" value="<?= $row['phone']; ?>" />
               <span id="msg" class="error text-danger"><?php if(isset($phone_error)) {echo $phone_error; } ?></span>
            </div>
            <div class="form-group">
              <label for="address">Address <i class="fa fa-star text-danger" aria-hidden="true"></i></label>
              <input type="text" name="address" id="address" class="form-control" value="<?= $row['address']; ?>" />
              <span id="msg" class="error text-danger"><?php if(isset($address_error)) {echo $address_error; } ?></span>
            </div>  
            <button type="submit" name="admin_update" class="btn btn-success btn-block btn-lg">Update</button>
           
          </form>   
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once('inc/footer.php'); ?>