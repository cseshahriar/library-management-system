<?php
	/**
	 * Database connection constant
	 */
	define('HOST', 'localhost');
	define('USER', 'root');
	define('PASS', '');
	define('DB_NAME', 'lms');

	/**
	 * Database class
	 */
	class Database{ 
		/**
		 * Database Connection Properties
		 * 
		 */ 
		private $host = HOST;
		private $user = USER;
		private $password = PASS;
		protected $dbName = DB_NAME;
		public $link; 
		public $error;

		/**
		 * [__construct constructor inside call database connect method]
		 */
		public function __construct()
		{
			$this->connection();
		}

		/**
		 * [connection database connection method]
		 * @return [boolean] [return true or false]
		 */
		public function connection()
		{
			$this->link = new mysqli($this->host, $this->user, $this->password, $this->dbName);
			if (!$this->link) {
				$_SESSION['error'] = 'Database connection faild!'.$this->link->connect_error;
				return false;
			} 
		}

		/**
		 * [get get all data from table]
		 * @param  [string] $tableName [receive table name]
		 * @return [object/array]      [table data return by object or array]
		 */
		public function get($tableName, $order=false)
		{	
			if (!$order_by == true) {
				$sql = "SELECT * FROM $table";
				$data = $this->link->query($sql) or die($this->link->error.__LINE__);
				if($data->num_rows > 0) {
					return $data;
				} else {
					return false;  
				} 
			} else {
				$sql = "SELECT * FROM $table ORDER BYE $order";
				$data = $this->link->query($sql) or die($this->link->error.__LINE__);
				if($data->num_rows > 0) {
					return $data;
				} else {
					return false;
				} 

			}
		}
		
		/**
		 * [getWhere data from wher key value]
		 * @param  [type]  $tableName       [description]
		 * @param  [type]  $whereConditions [description]
		 * @param  boolean $joinTableName   [description]
		 * @return [type]                   [description]
		 */
		public function getWhere($tableName, $whereConditions, $joinTableName=false)
		{
			if (!$joinTableName == true) {
				$sql = "SELECT * FROM $tableName WHERE $whereConditions";
				$data = $this->link->query($sql) or die($this->link->error.__LINE__);
				if ($data->num_rows > 0) {
					return $data;
				} else {
					return false;
				}
			} else {
				$sql = "SELECT * FROM $tableName NATURAL JOIN $joinTableName WHERE $whereConditions";
				$data = $this->link->query($sql) or die($this->link->error.__LINE__);
				if($data->num_rows > 0) {
					return true;
				} else {
					return false;
				}
			}

		}

		/**
		 * [insert description]
		 * @param  [type] $query [description]
		 * @return [type]        [description]
		 */
		public function insert($query)
		{
			$data = $this->link->query($query) or die($this->link->error.__LINE__);
			if ($data) {
				return true;
			} else {
				return false;
			}

		}

		/**
		 * [update description]
		 * @param  [type] $query [description]
		 * @return [type]        [description]
		 */
		public function update($query)
		{
			$data = $this->link->query($query) or die($this->link->error.__LINE__);
			if ($data) {
				return true;
			} else {
				return false;
			}

		}

		/**
		 * [delete description]
		 * @param  [type] $table [description]
		 * @param  [type] $key   [description]
		 * @param  [type] $value [description]
		 * @return [type]        [description]
		 */
		public function delete($table, $key, $value) 
		{
			$sql = "DELETE FROM $table WHERE $key='$value' "; 
			$data = $this->link->query($query) or die($this->link->error.__LINE__);
			if ($data) {
				return true;
			} else {
				return false;
			} 
		} 

		/**
		 * [inActive in active]
		 * @param  [type] $query [description]
		 * @return [type]        [description]
		 */
		public function inActive($query)  
		{
			$data = $this->link->query($query) or die($this->link->error.__LINE__);
			if ($data) {
				return true;
			} else {
				return false;
			}
		}

		// ========================== admin ===================
		/**
		 * [login description]
		 * @param  [type] $usesrNameOrEmail [description]
		 * @param  [type] $password         [description]
		 * @return [type]                   [description]
		 */
		public function login($usesrNameOrEmail , $password) 
		{
			$pass = md5($password);
			$sql = "SELECT * FROM user_admin WHERE (username='$usesrNameOrEmail' OR email='$usesrNameOrEmail') AND password='$pass' "; 
			$data = $this->link->query($sql);  
			$user = mysqli_fetch_object($data); 
			var_dump($user); 

			if (mysqli_num_rows($data ) > 0) { 
				$this->setSession($user->id, $user->name, $user->username, $user->email, $user->role_id );
				$_SESSION['logInSuccess'] = 'Your are successfullt logged in now';
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

	}//end of the database class