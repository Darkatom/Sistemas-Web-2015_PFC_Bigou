<?php
	include "./functions/database_logic.php";
	include "./functions/user_logic.php";
	
	session_start();
	
	$ip = get_client_ip();
	$logged = login($ip, $_POST['nick'], $_POST['password']);
	
	header("Location: ../main.php");
	
?>