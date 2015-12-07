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
			
				if (acceptImage($albumCover)) 
					echo "Imagen aceptada.<br/>";
					
				$path = "data/".$nick."/".$albumCover["name"];		
				$error = uploadPhoto($ip, $albumCover, $nick, $email, $path, $albumName);		
				if ($error != '0') {
					$path = "DEFAULT";	
					
					switch($error) {
						case '1':
							echo "No se ha podido crear el álbum de fotos.";
							break;
						
						case '2':
							echo "No se ha podido añadir la foto a la base de datos.";
							break;
						
						case '3':
							echo "No se ha podido subir la foto.";
							break;
							
						default:
							echo $error;
							break;
					} 
					echo "Se asignará una portada genérica.<br/>";
				}

				setAlbumCover($nick, $albumName, $path);
				header("Location: ../albums.php");
			}
		} else {
			echo "No se ha podido crear el álbum.<br/>";
		} 
	}else {
		echo "Ese album ya existe.";
	}
?> 
