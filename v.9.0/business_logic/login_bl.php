<?php
	include "./functions/database_logic.php";
	include "./functions/user_logic.php";
	
	session_start();
	
	$ip = get_client_ip();
	
	$nick = $_POST['nick'];

	$logged = login($ip, $_POST['nick'], $_POST['password']);
	switch ($logged) {
		case 0:
			header("Location: ../index.php");
			break;
		case 1:
			header("Location: ../index.php?message=996");
			break;
		case 2:
			header("Location: ../index.php?message=997");
			break;
		case 3:
			header("Location: ../index.php?message=998");
			break;
		default:
			echo $logged;
			//header("Location: ../index.php?message=999");
			break;
	}
	
?>