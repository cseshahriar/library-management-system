<?php 
  //require_once('../classes/Admin.php');
  require_once('../classes/Database.php');
  //$admin = new Admin();
  $db = new Database();   

  $user_type = $name = $gender = $username = $email = $password = $class = $roll = $dept = $design = $phone = $image = $address = $image_name = $uplodad_directory = ''; 
  $user_type_error = $name_error = $gender_error = $phone_error = $username_error = $email_error = $password_error = $class_error  = $roll_error = $dept_error = $design_error = $image_error = $address_error = $pass_mathc_error = '';        

  if( isset($_POST['admin_register'])) {
    //user type
    if(empty($_POST['user'])) {
        $user_type_error = 'User type is required!'; 
    } else { 
        $user_type = checkInput($_POST['user']);
    }
    
    //name validation
    if(empty($_POST['name'])) {
          $name_error = 'Name is required!';
    } else {
      $name = checkInput($_POST['name']);
      if(!preg_match("/^[A-Za-z. ]*$/", $name)) {
          $name_error = 'Only Letters and white space are allowed!'; 
      }
    }

    //gender validation
    if(empty($_POST['gender'])) {
          $gender_error = 'Gender is required!';      
    } else {
        $gender = checkInput($_POST['gender']);
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

    //username validation
    if(empty($_POST['username'])) {
        $username_error = 'Username is required!'; 
    } else {
        $username = checkInput($_POST['username']);  
        if(!preg_match("/^[A-Za-z0-9. ]*$/", $username)) {
            $username_error = 'Only Letters, Numbers, white space are allowed1';   
        }
    }

    //email validation
    if(empty($_POST['email'])) {
        $email_error = 'Email is required!'; 
    } else {
        $email = checkInput($_POST['email']);  
        if(!preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/", $email)) {
            $email_error = 'Invalid email formate!';    
        }
    }

    //password validation
    if(empty($_POST['password'])) {
          $password_error = 'Password is required!';     
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

    //class validation 
    if(empty($_POST['classes'])) {
        $class_error = 'Class is required!';
    } else {
      $class = checkInput($_POST['classes']); 
    }

    //role validation
    if(empty($_POST['roll'])) {
        $roll_error = 'Roll No is required!';
    } else {
      $roll = checkInput($_POST['roll']); 
    }

     //department validation
    if(empty($_POST['dept'])) {
        $dept_error = 'Department is required!'; 
    } else {
      $dept = checkInput($_POST['dept']);
    }

    //designation validation
    if(empty($_POST['design'])) {
        $design_error = 'Designation is required!'; 
    } else {
      $design = checkInput($_POST['design']);
    }

    //address validation
     if(empty($_POST['address'])) {
          $address_error = 'Address is required';    
    } else {
      $address = checkInput($_POST['address']);  
      if(!preg_match("/^[A-Za-z0-9,.- ]*$/", $address)) {
          $address_error = 'Only Letters, Numbers, _,-, comma and white space are allowed';  
      } 
    }

    if(!empty($_FILES['image'])) {
        $img_file = $_FILES['image']['name']; 
        $tmp_name = $_FILES['image']['tmp_name'];    
        $img_size = $_FILES['image']['size'];
        $uplodad_directory = 'images/users/';  
        $image_name = 'admin-'.time().rand(10000,100000).'.'.pathinfo($img_file, PATHINFO_EXTENSION);  
        //move_uploaded_file($tmp_name, $uplodad_directory.$image_name);       
    }    
    // validation end
    
    //check user type 
    if($_POST['user'] == 1 ) { //teacher
        if(!($user_type_error && $name_error && $gender_error && $phone_error && $username_error && $email_error && $password_error && $pass_mathc_error && $dept_error && $phone_error && $address_error)) { 
            move_uploaded_file($tmp_name, $uplodad_directory.$image_name);   
            // insert process
            $sql = "INSERT INTO users(role_id,name,gender,phone,username,email,password,class_id,dept_id,designation, address,image) VALUES('$user_type','$name','$gender','$phone','$username','$email','$password','8','$dept','$design','$address','$image_name')";      
            $user = $db->insert($sql);        

            if($user) { 
              header("Location: users_list.php");      
            }
        }

    } else { //for student

        if(!($user_type_error && $name_error && $gender_error && $phone_error && $username_error && $email_error && $password_error && $pass_mathc_error && $class_error && $roll_error && $dept_error && $phone_error && $address_error)) { 
            move_uploaded_file($tmp_name, $uplodad_directory.$image_name);   
            // insert process
            $sql = "INSERT INTO users(role_id, name, gender, phone, username, email, password, class_id, roll , dept_id, address, image) 
            VALUES('$user_type', '$name', '$gender', '$phone', '$username', '$email', '$password', '$class', '$roll', '$dept','$address', '$image_name')";      
            $user = $db->insert($sql);    

            if($user) { 
              header("Location: users_list.php");      
            }
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
            <!-- students regi form -->
          <div class="panel panel-default">
              <div class="panel-heading">
                <h2 class="text-center">User Registration</h2>  
              </div>

              <div class="panel-body">
                <!-- admin registration -->
                <form action="" method="post" enctype="multipart/form-data">
                  <!-- student role is 2  -->
                  <div class="form-group">
                    <label for="user">Select User Type</label>
                    <select name="user" id="user" class="form-control selpadfix">
                      <option value="" selected="">Choose User Type</option>   
                      <option value="1">Teacher</option>
                      <option value="2">Student</option>
                    </select>
                    <span id="msg" class="error text-danger"><?php if(isset($user_type_error)) {echo $user_type_error; } ?></span> 
                  </div>

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

                  <!-- phone -->
                  <div class="form-group"> 
                    <label for="phone">Phone <i class="fa fa-star text-danger" aria-hidden="true"></i></label>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone"/>
                     <span id="msg" class="error text-danger"><?php if(isset($phone_error)) {echo $phone_error; } ?></span>
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

                  <div class="form-group" id="class_hide"> 
                    <label for="classes">Class</label>
                    <select name="classes" id="classed" class="form-control selpadfix">
                      <option value="" selected>Choose Class/Degree</option>
                      <?php 
                        $class = $db->get('class'); 
                        while($row = $class->fetch_assoc()) { ?>
                            <option value="<?= $row['class_id']; ?>"><?= $row['class_name']; ?></option> 
                        <?php } ?> 
                    </select>
                     
                      <span id="msg" class="error text-danger"><?php if(isset($class_error)) {echo $class_error; } ?></span>
                  </div> 

                  <div class="form-group" id="role_hide">
                    <label for="roll">Roll No. <small class="text-danger">It's Only for Students</small></label>
                    <input type="number" name="roll" id="roll" class="form-control" placeholder="Enter Roll No" />
                    <span id="msg" class="error text-danger"><?php if(isset($roll_error)) {echo $roll_error; } ?></span>
                  </div>

                  <div class="form-group">
                    <label for="dept">Department</label>
                    <select name="dept" id="dept" class="form-control selpadfix">
                      <option value="" selected>Choose Department</option>  
                      <?php 
                        $dept = $db->get('department');  
                        while($row = $dept->fetch_assoc()) { ?> 
                            <option value="<?= $row['dept_id']; ?>"><?= $row['dept_name']; ?></option> 
                        <?php } ?>
                    </select> 
                    <span id="msg" class="error text-danger"><?php if(isset($dept_error)) {echo $dept_error; } ?></span>
                  </div>   

                  <div class="form-group" id="design_div">
                    <label for="design">Designation <small class="text-danger">It's Only for Teachers</small></label>
                    <input type="text" name="design" id="design" class="form-control" placeholder="Designation" />
                    <span id="msg" class="error text-danger"><?php if(isset($design_error)) {echo $design_error; } ?></span> 
                  </div>

                  <div class="form-group">
                    <label for="address">Address <i class="fa fa-star text-danger" aria-hidden="true"></i></label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="Address">
                    <span id="msg" class="error text-danger"><?php if(isset($address_error)) {echo $address_error; } ?></span>
                  </div>  
                  
                  <div class="form-group">
                    <label for="picture">Picture</label>
                    <input type="file" name="image" class="form-control-file">
                  </div>

                  <button type="submit" name="admin_register" class="btn btn-success btn-block btn-lg">Register</button>
                 
                </form>    
              </div>
          </div>
      </div>
    </div>
</div>
<?php require_once('inc/footer.php'); ?>
<script>
  $(document).ready(function(){
    $("#user").click(function(){
       var userValue = $(this).val();  

       if( userValue == 1) {
          $("#role_hide").hide();  
          $("#class_hide").hide();  
       } else {
          $("#class_hide").show();  
       }

       if( userValue == 2) {
          $("#design_div").hide();   
       } else { 
          $("#design_div").show();   
       }


    });
  });
</script>