<?php
	include_once './functions/database_logic.php';
	include './functions/photo_logic.php';
	
	session_start();
	
	$ip = get_client_ip();
	$nick = $_SESSION['nick']; 
	$email = $_SESSION['email']; 
	$role = $_SESSION['role'];
	
	if (isset($_GET['target'])) {
		$targetNick = $_GET['target'];
		$album = $_GET['album']; 
				
		$result = "";
		if (isAlbum($targetNick, $album)) {
			if (isset($nick)) {
				if (strcmp($targetNick, $nick) == 0 or strcmp($role, "admin") == 0) {
					$result = printPhotos(getPhotos($targetNick, $album), true);
					addAction($nick, $email, $ip, "self_photos");	
				
				// EXTRA: Añadir privileged access.
				} elseif (strcmp(getAlbumAccess($nick, $albumName), "private") != 0) {
					$result = printPhotos(getPhotos($targetNick, $album), false);
					addAction($nick, $email, $ip, "others_photos");	 
				
				} else {
					echo "Este álbum no puede ser visionado.";
				}
			} else {
				if (strcmp(getAlbumAccess($nick, $albumName), "public") == 0) {
					$result = printPhotos(getPhotos($targetNick, $album), false);
					addAction($nick, $email, $ip, "others_photos");	
				
				} else {
					echo "Este álbum no es público.";
				}
			}
		} else {
			echo "El álbum no existe para el usuario seleccionado.";
		}
				
		echo $result;
		
	} else {
		echo "No se ha especificado ningún usuario.";
	}

?> 
