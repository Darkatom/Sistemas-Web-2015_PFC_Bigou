<?php
	include_once './functions/database_logic.php';

	$email = $_GET['email'];
	
	if(!isEmail($email)){
		echo 0;
	} else {
		echo 1;	
	}
?> 
