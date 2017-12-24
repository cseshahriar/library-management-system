<?php require_once('Database.php'); 

	/**
	 * Users class
	 * @copyright Datatrixsoft
	 * @author Md. Shahriar Hosen <shahriar@datatrixsoft.com>
	 */  
class Users extends Database 
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
		$sql = "SELECT * FROM users WHERE (username='$usesrNameOrEmail' OR email='$usesrNameOrEmail') AND password='$pass' AND active='1' ";  
		$data = $this->link->query($sql);   
		$st = mysqli_fetch_object($data);


		if (mysqli_num_rows($data ) == 1) { 
			$this->setUserSession($st->id, $st->name, $st->username, $st->email, $st->role_id );
			$_SESSION['logInSuccess'] = 'Your are successfully logged in now.';
			//echo "<script>window.location.href = 'index.php'; </script>";
			header("Location: index.php");
			exit(); 
		} else {
			$_SESSION['logInError'] = 'Invalid username or email, password'; 
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
	public function setUserSession($id, $name, $username, $email, $role_id) 
	{
		$_SESSION['st_id'] = $id;  
		$_SESSION['st_name'] = $name;
		$_SESSION['st_username'] = $username;
		$_SESSION['st_email'] = $email;
		$_SESSION['st_role_id'] = $role_id;   

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
