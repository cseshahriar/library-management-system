<?php 	
	require_once('../classes/Database.php');
	$db = new Database;
	//update fine 

	//paid
	$issue_id = $_GET['id'];  
	$sql = "UPDATE book_return SET fine='0', active='0', paid='1' ";
	$db->update($sql);
	header("Location: book_submited_list.php");
?> 