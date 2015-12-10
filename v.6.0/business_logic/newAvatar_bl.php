<?php
	include_once './functions/user_logic.php';
	include_once './functions/photo_logic.php';
	session_start();
	
	$ip 	= get_client_ip();
	$nick 	= $_SESSION['nick'];
	$avatar = $_FILES['new_avatar'];

	if (isset($_FILES['new_avatar'])) {
		if (acceptImage($avatar)) {
			echo "Imagen aceptada.<br/>";
			
			$path = "data/" . $nick;
			if (!file_exists("../".$path) and !is_dir("../".$path)) {
				mkdir("../".$path, 0777, true);	// 0777 default for folder, rather than 0755
			}
			
			$path = $path."/".$avatar["name"];	
			
			$error = uploadPhoto($ip, $avatar, $nick, $email, $path, "Fotos de Perfil");
			echo "Imprimiendo error: "+ '$error';
			if ($error != '0') {
				$path = "data/user.png";	
				
				switch($error) {
					case '1':
						echo "No se ha podido crear el álbum de fotos.";
						break;
					
					case '2':
						echo "No se ha podido añadir la foto a la base de datos.";
						break;
					
					case '3':
						echo "No se ha podido la foto.";
						break;
						
					default:
						echo $error;
						break;
				} 
				echo "Se asignará un avatar genérico.<br/>";
			} 
				
		}	
	}
	echo "El path es: "+ '$path';
	if (setAvatar($nick, $path))
		echo " -> Avatar subido.<br/>";
?>