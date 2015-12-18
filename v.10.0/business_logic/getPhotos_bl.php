<?php
	include_once './functions/database_logic.php';
	include_once './functions/photo_logic.php';
	
	session_start();
	
	$ip = get_client_ip();
	$nick = $_SESSION['nick']; 
	$email = $_SESSION['email']; 
	$role = $_SESSION['role'];
	
	if (isset($_GET['target'])) {
		$targetNick = $_GET['target'];
		$album = $_GET['album']; 
		$access = getAlbumAccess($targetNick, $album);
				
		$result = "";
		if (isAlbum($targetNick, $album)) {
			if (isset($nick)) {
				if ((strcmp($targetNick, $nick) == 0) or (strcmp($role, "admin") == 0)) {
					$result = printPhotos(getPhotos($targetNick, $album), true);
					addAction($nick, $email, $ip, "self_photos");	
				
			
				} elseif (strcmp($access, "private") != 0) {
					$result = printPhotos(getPhotos($targetNick, $album), false);
					addAction($nick, $email, $ip, "others_photos");	 
				
				} else {
					echo "Este álbum no puede ser visionado.";
				}
			} else {
				if (strcmp($access, "public") == 0) {
					$result = printPhotos(getPhotos($targetNick, $album), false);
					addAction($targetNick, $email, $ip, "others_photos");	
				
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
