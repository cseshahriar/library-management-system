<?php
	$hostName = 'localhost';
	$userName = 'root';
	$password = '';  
	$databaseName = 'pharmacy';
	$databaseConnection = mysqli_connect($hostName, $userName, $password, $databaseName);
	if(!$databaseConnection){
		echo "Database Connection Failed!";
	} 
	$databaseConnection->set_charset("utf8"); //bangla support
	// echo "Database Connection Success(Test Message)"; 
	// this file will continue that's why not close 
