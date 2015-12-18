<?php
	include_once './functions/database_logic.php';
	include_once './functions/photo_logic.php';
	
	session_start();
	
	$ip = get_client_ip();
	$nick = $_SESSION['nick']; 
	$email = $_SESSION['email']; 
	$albumName = $_GET['albumName'];
	$path = $_GET['path'];
	$role = getRole($nick);
	
	if (strcmp($role, "admin") == 0) {
		$targetNick = $_GET['nick'];
	} else {
		$targetNick = $nick;
	}
	
	if (isAlbum($nick, $albumName)) {
		if (deletePhoto($albumName, $path, $email, $ip))
			echo "Se ha borrado la foto correctamente.";
	} else {
		echo "No se ha podido borrar foto, no existe.";
	}
?> 
