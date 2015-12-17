<?php
	include_once './functions/database_logic.php';
	include './functions/photo_logic.php';
	
	session_start();
	
	$ip = get_client_ip();
	$nick = $_SESSION['nick']; 
	$email = $_SESSION['email']; 

	if (isset($_GET['target'])) {
		$targetNick = $_GET['target'];
		$result = "";
		
		switch($target) {
			case "ADMIN":
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
	
	function printAlbums($albums, $self) {
		$line = "";
		foreach($albums as $alb ) {	
			$nick = $alb['nick'];
			$albumName = $alb['name'];
			$line = $line . "<div class='Album'>
					<img src='".$alb['cover']."'/>
					<p>".$alb['name']."</p>
					<a href='./photos.php?nick=$nick&album=$albumName'><button class='Basic Fancy' name='photos' onClick=''>Ver</button></a>";
			
			if ($self) {
				$line = $line . "<button class='Basic Fancy' name='delete' onClick='deleteAlbum(\"$albumName\");'>&#10008</button></a>";
			}
								
			$line = $line . "</div>";	
		}
		
		return $line;
	}
?> 
