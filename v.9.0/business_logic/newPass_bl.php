<?php
	include './functions/database_logic.php';
	include './functions/user_logic.php';
	
	session_start();
	
	$ip = get_client_ip();
	$nick = $_SESSION['nick']; 
	$email = $_SESSION['email']; 
	$oldPass = $_POST['oldPass']; 
	$newPass = $_POST['newPass']; 
	$newPassRepe = $_POST['newPassRepe']; 

	if($newPass==$newPassRepe){
		if(checkNickPassword($nick, $oldPass)){
			if(changePassword($nick, $newPass)){
				echo "La contraseña se ha cambiado correctamente.";
			}else{
				echo "Ha habido un problema.";
			}
		}else{
			echo "La contraseña anterior es incorrecta.";
		}
	}else{
		echo "Ha introducido mal la nueva contraseña.";
	}
?> 
