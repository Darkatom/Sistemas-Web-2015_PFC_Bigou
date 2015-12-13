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
		$path = "data/user.png";
	
		if (isset($_FILES['avatar'])) {
			if (acceptImage($avatar)) {				
				$path = "data/" . $nick;
				if (!file_exists("../".$path) and !is_dir("../".$path)) {
					mkdir("../".$path, 0777, true);	// 0777 default for folder, rather than 0755
				}
				
				$path = $path."/".$avatar["name"];	
				
				$error = uploadPhoto($ip, $avatar, $nick, $email, $path, "Fotos de Perfil de ".$nick);
				if ($error != '0') {
					$path = "data/user.png";	
				} 
					
			}	
		}
		
		setAvatar($nick, $path);
		
		header("Location: ../main.php");
	}
?> 
