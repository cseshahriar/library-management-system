<?php require_once('Database.php'); 
class Admin extends Database
{
	public function __construct(){
		parent::__construct(); 
	}
	//if require than call parent constructor
	
	/**
	 * [login description]
	 * @param  [type] $usesrNameOrEmail [description]
	 * @param  [type] $password         [description]
	 * @return [type]                   [description]
	 */
	public function login($usesrNameOrEmail , $password) 
	{
		echo $user_username;
		echo $password;
		$pass = md5($password);
		$sql = "SELECT * FROM user_admin WHERE username='$usesrNameOrEmail' OR email='$usesrNameOrEmail' AND password='$password' ";
		$data = $this->link->query($sql);
		$user = mysqli_fetch_object($data); 


		if (mysqli_num_rows($user) == 1) { 
			$this->setSession($user->id, $user->name, $user->username, $user->email, $user->role_id );
			$_SESSION['logInSuccess'] = 'Your are successfullt logged in now';
			header("Location: index.php"); 
			exit();
		} else {
			$_SESSION['logInError'] = 'Invalid username or email, password';
			header('Location: login.php'); //it can problem, use js redirect 
		} 
	}

	/**
	 * [setSession description]
	 * @param [type] $id       [description]
	 * @param [type] $name     [description]
	 * @param [type] $username [description]
	 * @param [type] $email    [description]
	 * @param [type] $role_id  [description]
	 */
	public function setSession($id, $name, $username, $email, $role_id)
	{
		$_SESSION['user_id'] = $id;
		$_SESSION['user_name'] = $name;
		$_SESSION['user_username'] = $username;
		$_SESSION['user_email'] = $email;
		$_SESSION['user_role_id'] = $role_id;

	}

	/**
	 * [logout description]
	 * @return [type] [description]
	 */
	public function logout() 
	{
		session_start();
		session_destroy();
		header("Location: login.php"); //set log out message
	} 

}//end of the class
