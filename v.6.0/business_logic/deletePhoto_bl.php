<?php
	include_once './functions/database_logic.php';
	include './functions/photo_logic.php';
	
	session_start();
	
	$ip = get_client_ip();
	$nick = $_SESSION['nick']; 
	$email = $_SESSION['email']; 
	$albumName = $_GET['albumName'];
	$path = $_GET['path'];
		
	if (isAlbum($nick, $albumName)) {
		if (deletePhoto($nick, $albumName, $path, $email, $ip))
			echo "Se ha borrado la foto correctamente.";
	} else {
		echo "No se ha podido borrar foto, no existe.";
	}
	//En eliminar album deberia contemplarse la opcion de eliminar todas las fotos.
	//Si el mismo usuario borra y crea el mismo album recupera todas las fotos.
	
	//Hay que eliminar path y album, el nick va implícito en el path
?> 
