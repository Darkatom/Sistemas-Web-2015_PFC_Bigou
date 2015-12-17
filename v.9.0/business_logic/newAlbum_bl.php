<?php
	include './functions/database_logic.php';
	include './functions/photo_logic.php';
	
	session_start();
	
	$ip = get_client_ip();
	$nick = $_SESSION['nick']; 
	$email = $_SESSION['email']; 
	$albumName = $_POST['albumName']; 
	$access = $_POST['access']; 
			
	if (!isAlbum($nick, $albumName)) {
		if (newAlbum($ip, $nick, $email, $albumName, $access, "DEFAULT")) {
			if (isset($_FILES['albumCover'])) {
				$albumCover = $_FILES['albumCover'];
			
				if (acceptImage($albumCover)) {
					$path = "data/".$nick."/".$albumCover["name"];		
					$error = uploadPhoto($ip, $albumCover, $nick, $email, $path, $albumName);		
					if ($error != '0') {
						$path = "DEFAULT";	
					}
				}

				setAlbumCover($nick, $albumName, $path);
				header("Location: ../albums.php");
			} 
		}
	}
?> 
