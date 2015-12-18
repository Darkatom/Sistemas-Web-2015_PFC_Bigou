<?php
	include_once './functions/database_logic.php';
	include_once './functions/user_logic.php';
	
	session_start();
	
	$ip = get_client_ip();
	$nick = $_SESSION['nick']; 
	$email = $_SESSION['email']; 
	$role = getRole($nick);
	
	$target=$_GET['user'];

	if ($role=="admin"){
		$albums = getAlbums($nick); 
		foreach($albums as $album ) {	
			$myAlbum=$album['name'];
			deleteAlbum($target, $albumName, $email, $ip);
		}
		removeUser($target);
	}
?> 
