<?php require_once('Database.php'); 
class Admin extends Database
{
	public function __construct(){
		parent::__construct(); 
	}
	/**
	 * [login description]
	 * @param  [type] $usesrNameOrEmail [description]
	 * @param  [type] $password         [description]
	 * @return [type]                   [description]
	 */
	public function login($usesrNameOrEmail , $password) 
	{
		$pass = md5($password);
		$sql = "SELECT * FROM admin WHERE (username='$usesrNameOrEmail' OR email='$usesrNameOrEmail') AND password='$pass' "; 
		$data = $this->link->query($sql);   
		$user = mysqli_fetch_object($data);  
		var_dump($user);  

		if (mysqli_num_rows($data ) > 0) { 
			$this->setSession($user->id, $user->name, $user->username, $user->email, $user->role_id );
			$_SESSION['logInSuccess'] = 'Your are successfully logged in now.';
			header("Location: index.php"); 
			exit();
		} else {
			$_SESSION['logInError'] = 'Invalid username or email, password';
			//header('Location: login.php'); //it can problem, use js redirect 
			echo "<script>window.location.href = 'login.php'; </script>";
			exit(); 
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
