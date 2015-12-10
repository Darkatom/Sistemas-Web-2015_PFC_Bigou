<?php
	include "./functions/database_logic.php";
	include "./functions/user_logic.php";
	
	session_start();
	
	$ip = get_client_ip();
	$logged = login($ip, $_POST['nick'], $_POST['password']);
		
	switch($logged) {
		case '0':
			header("Location: ../new_album.php");
			break;
		case '1':
			echo "Log in failed.";
			break;
		case '2':
			echo "Log in attemps spent. You can try again in 30 minutres.";
			break;
		default:
			echo $logged;
			break;
	}
	
?>