<?php 
class Process 
{
	// login form process
	if( isset($_POST['loginForm']) ) { 

    //username or email and password empty check
    if (empty($_POST['username_email'])) { 
        $userOrEmailError = 'Username or Email must not be empty.';
    }  else {
        $userOrEmail = checkInput($_POST['username_email']); 
    }

    // password 
    if (empty($_POST['password'])) {  
        $passwordError = 'Passssword must not be empty.';   
    } else {
      $password = checkInput($_POST['password']);  
    }    

    // if not error than send data to admin login method
    if(!$userOrEmailError AND !$passwordError)  {
        $admin->login($userOrEmail, $password); //data send to login method      
    }   

  }

	/**
	 * [checkInput feltering form data]
	 * @param  [form input] $data [form inputs data]
	 * @return [form input]       [form input data]
	 */
	public function checkInput($data)
	 {
	    $data = trim($data);
	    $data = htmlentities($data);
	    $data = htmlspecialchars($data);
	    return $data;   
	 }
}//end of the process class