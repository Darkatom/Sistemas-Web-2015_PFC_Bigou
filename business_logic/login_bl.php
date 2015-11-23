<?php
	include "/functions/user_logic.php";
	
	session_start();
	
	$logged = login($_POST['nick'], $_POST['password']);
	
	switch($logged) {
		case '0':
			echo "Logged in";
			break;
		case '1':
			echo "Log in failed.";
			break;
		case '2':
			echo "Log in attemps spent. You can try again in 30 minutres.";
			break;
		default:
			echo "Something's wrong.";
			break;
	}
	
?>