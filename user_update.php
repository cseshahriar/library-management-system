<?php require_once('include/header.php'); ?>
<?php if($_SESSION['st_id']) : ?>
<?php 
  require_once('classes/Database.php'); 
  $db = new Database();   
  $id = $_SESSION['st_id'];  
  $role_id = $_SESSION['st_role_id'];   

  //form value set
  $user_data = $db->getWhere("users", "id='$id'");  
  $sql = "SELECT * FROM users 
          LEFT JOIN role ON users.role_id=role.role_id
          LEFT JOIN class ON users.class_id=class.id
          LEFT JOIN department ON users.dept_id=department.id
          WHERE users.id='$id' ";  
  $user_data = $db->getQuery($sql); 
  $row = $user_data->fetch_assoc();      
  // end value set code  


  //update code under here 
  $name = $gender = $email = $phone = $dept = $roll = $class = $design = $address  = ''; 
  $user_role_error = $name_error = $gender_error = $email_error = $phone_error = $dept_error = $roll_error = $class_error =  $design_error = $address_error = '';        
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

  if(isset($_POST['submit'])) {  
      
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

      //phone validation
      if(empty($_POST['phone'])) {
          $phone_error = 'Phone is required'; 
      } else {
          $phone = checkInput($_POST['phone']);  
          if(!preg_match("/^[0-9]{14}$/", $email)) { 
              $phone_error = 'Invalid phone number formate!';    
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

      //class
      if($_POST['classes']) {
          $class_error = 'Class is required!';
      } else {
          $class = checkInput($_POST['classes']); 
      }

      //roll
      if($_POST['roll']) {
          $roll_error = 'Roll NO. is required!';
      } else {
          $roll = checkInput($_POST['roll']);
      }

      //department dept
      if($_POST['dept']) {
          $dept_error = 'Class is required!';
      } else {
          $dept = checkInput($_POST['dept']);
      }

      //designation design
       if($_POST['design']) {
          $design_error = 'Class is required!';
      } else {
          $design = checkInput($_POST['design']);
      }   

      //address validation
       if(empty($_POST['address'])) {
            $address_error = 'Address is required';    
      } else {
        $address = checkInput($_POST['address']); 
        if(!preg_match("/^[A-Za-z0-9-, ]*$/", $address)) {
            $address_error = 'Only Letters, Numbers, _,-, comma and white space are allowed';  
        } 
      }
  
      // validation end
      if($role_id == 1) { //for teacher

          if(!($name_error && $gender_error && $email_error && $phone_error && $address_error)) {
              $sql = "UPDATE users SET name='$name', gender='$gender', phone='$phone', email='$email', designation='$design', address='$address' ";
              $user = $db->update($sql);    
              if($user) { 
                header("Location: profile.php");       
              } 
          } 
      } else { //for student
           if(!($name_error && $gender_error && $email_error && $phone_error && $address_error)) {
              $sql = "UPDATE users SET name='$name', gender='$gender', phone='$phone', email='$email', roll='$roll',address='$address' ";  
              $user = $db->update($sql);     
              if($user) { 
                header("Location: profile.php");      
              }
          }
      }     
}   

?>

<div class="content-wrapper">
  <div class="row">
      <div class="col-md-8 col-md-offset-2">  
            <!-- students regi form -->
          <div class="panel panel-default">
              <div class="panel-heading">
                <h2 class="text-center">Update User Information</h2>  
              </div>

              <div class="panel-body">
                <!-- update admin data  --> 
                <form action="" method="post"> 
                  <!-- role -->
                  <div class="form-group"> 
                    <label for="user">User Role</label>
                    <input type="text" name="role" class="form-control" value="<?php if($row['role_id'] == 1){ echo 'Teacher'; } else { echo 'Student'; } ?>" disabled>  
                  </div>

                  <div class="form-group"> 
                    <label for="name">Name <i class="fa fa-star text-danger" aria-hidden="true"></i></label>
                    <input type="text" name="name" class="form-control" id="name" value="<?= $row['name']; ?>" > 
                    <span id="msg" class="error text-danger"><?php if(isset($name_error)) {echo $name_error; } ?></span>
                  </div>

                  <!-- gender -->
                  <div class="radio">
                    <p><strong>Choose Gender <i class="fa fa-star text-danger" aria-hidden="true"></i></strong></p>
                    <label>  
                        <?php 
                            if($row['gender'] == 'Male') { ?>
                                 <input type="radio" name="gender" value="Male" checked/> Male <br>
                            <?php } else { ?>
                                <input type="radio" name="gender" value="Female" checked/> Female <br>
                            <?php } ?> 

                        <?php if($row['gender'] == 'Male') { ?>
                            <input type="radio" name="gender" value="Female" /> Female
                        <?php } else  { ?>
                            <input type="radio" name="gender" value="Male" /> Male  <br>
                        <?php } ?>

                        <span id="msg" class="error text-danger"><?php if(isset($gender_error)) {echo $gender_error; } ?></span> 
                    </label>
                  </div>

                  <!-- phone -->
                  <div class="form-group"> 
                    <label for="phone">Phone <i class="fa fa-star text-danger" aria-hidden="true"></i></label>
                    <input type="text" name="phone" id="phone" class="form-control" value="<?= $row['phone']; ?>" />
                     <span id="msg" class="error text-danger"><?php if(isset($phone_error)) {echo $phone_error; } ?></span> 
                  </div>

                  <!-- username -->
                  <div class="form-group">
                    <label for="username">Username <i class="fa fa-star text-danger" aria-hidden="true"></i></label>
                    <input type="text" id="username" class="form-control" value="<?= $row['username']; ?>" disabled />
                   
                  </div> 

                  <div class="form-group">    
                    <label for="email">Email <i class="fa fa-star text-danger" aria-hidden="true"></i></label>
                    <input type="email" name="email" id="email" class="form-control" value="<?= $row['email']; ?>" />
                    <span id="msg" class="error text-danger"><?php if(isset($email_error)) {echo $email_error; } ?></span> 
                  </div>  

                  
                  <div class="form-group"> 
                    <label for="classes">Class</label>
                    <select name="classes" id="classed" class="form-control selpadfix" >
                      <option value="<?= $row['class_id']; ?>" selected><?= $row['class_id']; ?></option>
                      <?php 
                        $class = $db->get('class');  
                        while($data = $class->fetch_assoc()) { ?>
                            <option value="<?= $data['id']; ?>"><?= $data['class_name']; ?></option>
                        <?php } ?>   
                    </select> 
                      <span id="msg" class="error text-danger"><?php if(isset($class_error)) {echo $class_error; } ?></span> 
                  </div> 
             

                  <div class="form-group"> 
                    <label for="roll">Roll No.</label>
                    <input type="number" name="roll" id="roll" class="form-control" value="<?= $row['role']; ?>" />
                    <span id="msg" class="error text-danger"><?php if(isset($roll_error)) {echo $roll_error; } ?></span>
                  </div>
        

                  <div class="form-group">
                    <label for="dept">Department</label>
                    <select name="dept" id="dept" class="form-control selpadfix">  
                      <option value="<?= $row['dept_id']; ?>" selected class="text-success"> 
                        <?= $row['dept_name']; ?>
                      </option>
                      <?php  
                        $dept = $db->get('department');  
                        while($dept_row = $dept->fetch_assoc()) { ?>  
                            <option value="<?= $dept_row['id']; ?>"><?= $dept_row['dept_name']; ?></option> 
                        <?php } ?> 
                    </select> 

                    <span id="msg" class="error text-danger"><?php if(isset($dept_error)) {echo $dept_error; } ?></span>
                  </div>   

                
                  <div class="form-group">
                    <label for="design">Designation <i class="fa fa-star text-danger" aria-hidden="true"></i></label> 
                    <input type="text" name="design" id="design" class="form-control" value="<?= $row['designation']; ?>" />
                    <span id="msg" class="error text-danger"><?php if(isset($design_error)) {echo $design_error; } ?></span> 
                  </div>

              
                  <div class="form-group">
                    <label for="address">Address <i class="fa fa-star text-danger" aria-hidden="true"></i></label>
                    <input type="text" name="address" id="address" class="form-control" value="<?= $row['address']; ?>" />  
                    <span id="msg" class="error text-danger"><?php if(isset($address_error)) {echo $address_error; } ?></span>
                  </div>  

                  <button type="submit" name="submit" class="btn btn-success btn-block btn-lg">Update</button> 
                 
                </form>     
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