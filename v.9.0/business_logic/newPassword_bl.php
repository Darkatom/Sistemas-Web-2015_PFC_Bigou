<?php
	include './functions/database_logic.php';
	include './functions/user_logic.php';
	
	session_start();
	
	$ip = get_client_ip();
	$nick = $_SESSION['nick']; 
	$email = $_SESSION['email']; 
	
	$oldPassword = $_GET['oldPassword']; 
	$newPassword = $_GET['newPassword']; 
	$repeatPassword = $_GET['repeatPassword']; 

	if(checkNickPassword($nick, $oldPassword) and strcmp($newPassword, $repeatPassword) == 0){
		if(changePassword($nick, $newPassword)){
			echo "true";
		}
	}
	
	echo "false";
?> 
