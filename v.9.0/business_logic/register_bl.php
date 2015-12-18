<?php
	include './functions/user_logic.php';
	include './functions/photo_logic.php';
	
	$ip = get_client_ip();
	$nick = $_POST['nick_form']; 
	$password = $_POST['password_form'];
	$repeatPassword = $_POST['repeatPassword_form'];
	$email = $_POST['email_form'];
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
						
	$avatar = $_FILES['avatar'];
	
	
	if (strcmp($password, $repeatPassword) != 0)
		header("Location: ../index.php?message=102");
		
	if (!preg_match("/^([_|-]?[a-zA-Z]*[_|-]?[0-9]*[_|-]?)+$/", $nick))
		header("Location: ../index.php?message=103");
		
	if (!preg_match("/^[a-zA-Z]+([a-zA-Z]*[.|_|-]?)*@[a-zA-Z]+\.[a-zA-Z]+\.?[a-zA-Z]?$/", $email))
		header("Location: ../index.php?message=104");

	if (newUser($ip, $nick, $password, $email, $name, $surname, $age, $gender)) {
		$path = "data/user.png";
	
		if (isset($_FILES['avatar']) and acceptImage($avatar)) {				
			$path = "data/" . $nick . "/Fotos de Perfil de " . $nick;
			if (!file_exists("../".$path) and !is_dir("../".$path)) {
				mkdir("../".$path, 0777, true);	// 0777 default for folder, rather than 0755
			}
			
			$path = $path."/".$avatar["name"];	
			
			$error = uploadPhoto($ip, $avatar, $nick, $email, $path, "Fotos de Perfil de ".$nick);
			if ($error != '0') {
				$path = "data/user.png";	
			} 
				
		}	

		setAvatar($nick, $path);
		
		header("Location: ../index.php?message=101");
	}	
	
	header("Location: ../index.php?message=105");
?> 
