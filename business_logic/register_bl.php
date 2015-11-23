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
				
				$path = "data/" . $_POST['nick'];
				if (!file_exists("../".$path) and !is_dir("../".$path)) {
					mkdir("../".$path, 0777, true);	// 0777 default for folder, rather than 0755
				}
								
				if (uploadPhoto($ip, $avatar, $nick, $email, $path, "Fotos de Perfil") != '0') {
					$path = "data/user.png";	
					echo "Avatar NO subido. Subimos genérico.<br/>";
				}
			}	
		}
		
		if (setAvatar($nick, $path))
			echo " -> Avatar subido.<br/>";
		
	} else {
		echo "Usuario NO registrado.";
	}
		
	
?> 
