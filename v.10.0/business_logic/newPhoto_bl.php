<?php        	
    include_once './functions/database_logic.php';
	include './functions/photo_logic.php';
	session_start();
	$ip = get_client_ip();
	$nick = $_SESSION['nick']; 
	$email = $_SESSION['email']; 
	$albumName = $_POST['albumName']; 
		
	if (isset($_FILES['image']) and acceptImage($_FILES['image'])) {
		echo "Imagen aceptada.<br/>";
		$image = $_FILES['image'];
		
		$path = "data/" . $nick . "/" . $albumName ;

		if (!file_exists("../".$path) and !is_dir("../".$path)) {
			mkdir("../".$path, 0777, true);	// 0777 default for folder, rather than 0755
		}
	
		$path = $path . "/" . $image["name"];	
		
		$error = uploadPhoto($ip, $image, $nick, $email, $path, $albumName);							
		
		switch($error) {
			case '0':
				header("Location: ../photos.php?album=".$albumName);
				break;
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
		echo "Imagen no válida.";
	}
?> 
	