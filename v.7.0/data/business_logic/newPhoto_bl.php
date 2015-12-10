<?php
	include './functions/database_logic.php';
	include './functions/photo_logic.php';
	
	session_start();
	
	$ip = get_client_ip();
	$nick = $_SESSION['nick']; 
	$email = $_SESSION['email']; 
	$albumName = $_POST['albumName']; 
		
	if (isset($_FILES['image']) and acceptImage($_FILES['image'])) {
		echo "Imagen aceptada.<br/>";
		$image = $_FILES['image'];
				
		if (isAlbum($nick, $albumName) or newAlbum($ip, $nick, $email, $albumName, "DEFAULT")) {
			$path = "data/".$nick."/".$image["name"];		
			$error = uploadPhoto($ip, $image, $nick, $email, $path, $albumName);		
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
			} else {
				echo "Foto subida correctamente.";
			}
		}
	} else {
		echo "Imagen no válida.";
	}
?> 
