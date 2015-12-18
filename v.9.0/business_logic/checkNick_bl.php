<?php
	include_once './functions/database_logic.php';

	$nick = $_GET['nick'];
	
	if(!isNick($nick)){
		echo 0;
	} else {
		echo 1;	
	}
?> 
