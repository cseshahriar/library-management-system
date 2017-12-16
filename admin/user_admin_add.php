<?php 
  //require_once('../classes/Admin.php');
  require_once('../classes/Database.php');
  //$admin = new Admin();
  $db = new Database();   

  $name = $gender = $username = $email = $password = $phone = $image = $address = $image_name = $uplodad_directory = '';
  $name_error = $gender_error = $username_error = $email_error = $password_error = $phone_error = $image_error = $address_error = $pass_mathc_error = '';      

  if( isset($_POST['admin_register'])) {
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

    //username validation
    if(empty($_POST['username'])) {
        $username_error = 'Username is required'; 
    } else {
        $username = checkInput($_POST['username']);  
        if(!preg_match("/^[A-Za-z0-9. ]*$/", $username)) {
            $username_error = 'Only Letters, Numbers, white space are allowed';   
        }
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

    //password validation
    if(empty($_POST['password'])) {
          $password_error = 'Password is required';     
    } else {
        $password = checkInput($_POST['password']); 
        $password = md5($password); 
    }  

    //match password 
    if(empty($_POST['confirmpassword'])) {
          $pass_mathc_error = 'Re-Password is required';      
    } elseif($_POST['confirmpassword'] != $password) { 
          $pass_mathc_error = 'Password did not match!';           
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

    if(!empty($_FILES['image'])) {
        $img_file = $_FILES['image']['name']; 
        $tmp_name = $_FILES['image']['tmp_name'];  
        $img_size = $_FILES['image']['size'];
        $uplodad_directory = 'images/admin/';  
        $image_name = 'admin-'.time().rand(10000,100000).'.'.pathinfo($img_file, PATHINFO_EXTENSION);  
        //move_uploaded_file($tmp_name, $uplodad_directory.$image_name);       
    }    
    // validation end
    if(!($name_error && $gender_error && $username_error && $email_error && $password_error && $pass_mathc_error && $phone_error && $address_error)) { 
        move_uploaded_file($tmp_name, $uplodad_directory.$image_name);   
        // insert process
        $sql = "INSERT INTO admin(role_id, name, gender, username, email, password, phone, image,address) 
                VALUES('1', '$name', '$gender', '$username', '$email', '$password', '$phone', '$image_name','$address')";
        $user = $db->insert($sql);    

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
          <h2 class="text-center">Admin Registration</h2>
        </div>
        <div class="panel-body">
          <!-- admin registration -->
          <form action="" method="post" enctype="multipart/form-data">
            <!-- admin role is 1  -->
            <div class="form-group"> 
              <label for="name">Name <i class="fa fa-star text-danger" aria-hidden="true"></i></label>
              <input type="text" name="name" class="form-control" id="name" placeholder="Name">
              <span id="msg" class="error text-danger"><?php if(isset($name_error)) {echo $name_error; } ?></span>    
            </div>
            <!-- gender -->
            <div class="radio">
              <p><strong>Choose Gender <i class="fa fa-star text-danger" aria-hidden="true"></i></strong></p>
              <label>
                <input type="radio" name="gender" value="Male" /> Male
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="gender" value="Female" /> Female 
              </label><br>
              <span id="msg" class="error text-danger"><?php if(isset($gender_error)) {echo $gender_error; } ?></span>
            </div> 
            <!-- username -->
            <div class="form-group">
              <label for="username">Username <i class="fa fa-star text-danger" aria-hidden="true"></i></label>
              <input type="text" name="username" id="username" class="form-control" placeholder="Username">
              <span id="msg" class="error text-danger"><?php if(isset($username_error)) {echo $username_error; } ?></span>
            </div> 
            <div class="form-group">    
              <label for="email">Email <i class="fa fa-star text-danger" aria-hidden="true"></i></label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Email"/>
              <span id="msg" class="error text-danger"><?php if(isset($email_error)) {echo $email_error; } ?></span>
              
            </div>
            <div class="form-group"> 
              <label for="password">New Password <i class="fa fa-star text-danger" aria-hidden="true"></i></label>
              <input type="password" name="password" id="password" class="form-control" placeholder="password"/> 
              <span id="msg" class="error text-danger"><?php if(isset($password_error)) {echo $password_error; } ?></span>
            </div>
            <div class="form-group">  
              <label for="cpass">Confirm Password <i class="fa fa-star text-danger" aria-hidden="true"></i></label>
              <input type="password" name="confirmpassword" id="cpass" class="form-control" placeholder="Confirm Password"/>   
               <span id="msg" class="error text-danger"><?php if(isset($pass_mathc_error)) {echo $pass_mathc_error; } ?></span>  
            </div> 
            <!-- phone -->
            <div class="form-group"> 
              <label for="phone">Phone <i class="fa fa-star text-danger" aria-hidden="true"></i></label>
              <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone"/>
               <span id="msg" class="error text-danger"><?php if(isset($phone_error)) {echo $phone_error; } ?></span>
            </div>
            <div class="form-group">
              <label for="picture">Picture</label>
              <input type="file" name="image" class="form-control-file">
            </div>
            <div class="form-group">
              <label for="address">Address <i class="fa fa-star text-danger" aria-hidden="true"></i></label>
              <input type="text" name="address" id="address" class="form-control" placeholder="Address">
              <span id="msg" class="error text-danger"><?php if(isset($address_error)) {echo $address_error; } ?></span>
            </div>  
            <button type="submit" name="admin_register" class="btn btn-success btn-block btn-lg">Register</button>
           
          </form>   
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once('inc/footer.php'); ?>