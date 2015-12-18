<?php
	include_once './functions/database_logic.php';
	include_once './functions/user_logic.php';
	
	session_start();
	
	$nick = $_SESSION['nick']; 	
	$target = $_GET['user'];

	echo $nick." - ".$target." - ".(strcmp($nick, $target))."</br>";
	
	if(strcmp($nick, $target) == 0 and setDropRequest($target)) {
		echo 0;
	} else {
		echo 1;
	}
?> 
