<?php
	include './functions/user_logic.php';
	include './functions/photo_logic.php';
	
	$ip = get_client_ip();
	$nick = $_POST['nick']; 
	$password = $_POST['password'];
	$email = $_POST['email'];
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
						
	$avatar = $_FILES['avatar'];
					
	if (newUser($ip, $nick, $password, $email, $name, $surname, $age, $gender)) {
		echo "Usuario registrado.<br/>";
		
		$path = "data/user.png";
	
		if (isset($_FILES['avatar'])) {
			if (acceptImage($avatar)) {
				echo "Imagen aceptada.<br/>";
				
				$path = "data/" . $nick;
				if (!file_exists("../".$path) and !is_dir("../".$path)) {
					mkdir("../".$path, 0777, true);	// 0777 default for folder, rather than 0755
				}
				
				$path = $path."/".$avatar["name"];	
				
				$error = uploadPhoto($ip, $avatar, $nick, $email, $path, "Fotos de Perfil");
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
		
		if (setAvatar($nick, $path))
			echo " -> Avatar subido.<br/>";
		
	} else {
		echo "Usuario NO registrado.";
	}
?> 
