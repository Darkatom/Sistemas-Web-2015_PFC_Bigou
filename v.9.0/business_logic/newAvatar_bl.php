<?php
	include_once './functions/user_logic.php';
	include_once './functions/photo_logic.php';
	session_start();
	
	$ip 	= get_client_ip();
	$nick 	= $_SESSION['nick'];
	$avatar = $_FILES['new_avatar'];

	if (isset($avatar)) {
		if (acceptImage($avatar)) {			
			$path = "data/" . $nick;
			if (!file_exists("../".$path) and !is_dir("../".$path)) {
				mkdir("../".$path, 0777, true);	// 0777 default for folder, rather than 0755
			}
			
			$path = $path."/".$avatar["name"];	
			
			$error = uploadPhoto($ip, $avatar, $nick, $email, $path, "Fotos de Perfil");

			if ($error == '0') {				
				setAvatar($nick, $path);
			}
		}	
				
	}	
?>