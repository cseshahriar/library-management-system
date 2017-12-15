<?php 
	include_once('../classes/Database.php');
	$db = new Database();
	$id = $_GET['id'];
	$sql = "UPDATE admin SET active='0' WHERE id='$id' ";
	//UPDATE `admin` SET active='1' WHERE id='7'   
	$db->active($sql);
	header("Location: users_admin_list.php"); 
?>