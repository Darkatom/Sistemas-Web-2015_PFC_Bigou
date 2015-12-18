<?php
	include_once './functions/database_logic.php';
	include './functions/photo_logic.php';
	
	session_start();
	
	$ip = get_client_ip();
	$nick = $_SESSION['nick'];
	$role = $_SESSION['role'];
	$email = $_SESSION['email'];

	if (isset($_GET['target'])) {
		$targetNick = $_GET['target'];
		$result = "";
		
		switch($targetNick) {
			case "ADMIN":
				if (strcmp($role, "admin")==0) {
					$result = $result . printAlbums(getAllAlbums("public", $nick), true); 
					$result = $result . printAlbums(getAllAlbums("limited", $nick), true); 
					$result = $result . printAlbums(getAllAlbums("private", $nick), true);  	
					addAction($nick, $email, $ip, "all_albums");
				}
				break;
							
			case "ALL":
				if (isset($nick)) {
					$result = $result . printAlbums(getAlbums($nick), false);
					$result = $result . printAlbums(getAllAlbums("limited", $nick), false); 
				} 	
				$result = $result . printAlbums(getAllAlbums("public", $nick), false);
				addAction($nick, $email, $ip, "all_albums");
				break;
				
			case $nick:
				$result = $result . printAlbums(getAlbums($nick), true); 
				addAction($nick, $email, $ip, "self_albums");
				break;
				
			default:
				if (isset($nick)) {
					$result = $result . printAlbums(getAlbums($targetNick), false);
					$result = $result . printAlbums(getAlbumsByAccess("limited", null), false); 
				} 	
				$result = $result . printAlbums(getAlbumsByAccess("public", null), false);
				addAction($nick, $email, $ip, "others_albums");				
				break;	
		}
				
		echo $result;
		
	} else {
		echo "No se ha especificado ningún usuario.";
	}
?> 
