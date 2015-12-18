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

	if(checkNickPassword($nick, $oldPassword)){
		if (strcmp($newPassword, $repeatPassword) == 0){
			if(changePassword($nick, $newPassword)){
				echo '0';
			} else {
				echo '4';
			}
		} else {
			echo '3';
		}
	} else {
		echo '2';
	}
?> 
