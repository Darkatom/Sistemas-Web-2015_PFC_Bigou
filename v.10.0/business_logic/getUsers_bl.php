<?php
	include_once './functions/database_logic.php';
	include_once './functions/user_logic.php';
	
	session_start();
	
	$ip = get_client_ip();
	$nick = $_SESSION['nick']; 
	$email = $_SESSION['email']; 
	$role = $_SESSION['role'];

	if (strcmp($role, 'admin') == 0) {
		echo printUsersForAdmin(getAllUsers());
	} else {
		echo printUsers(getAllUsers());
	}
?> 
