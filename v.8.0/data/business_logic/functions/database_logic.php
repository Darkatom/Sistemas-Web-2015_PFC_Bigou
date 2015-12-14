<?php
	
	/*////////// UserID //////////
	Olatz	=	u623652398_;	//
	José	=	u837753965_;	//
	////////////////////////////*/
	
	function makeQuery($sql) {	
		$server = 'mysql.hostinger.es';
		$database = 'u623652398_bigou';
		$user = 'u623652398_admin';
		$password = 'FU6k1nGM4s7e5S';
	
		$conexion = new mysqli($server, $user, $password, $database);	
		if ($conexion->connect_error) {		
			return false;
		}
		$query = $conexion->query($sql);
		$conexion->close();
		return $query;
	}
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
	function addUser($nick, $password, $email, $name, $surname, $age, $gender) {
		return makeQuery("INSERT INTO user (nick, password, email, name, surname, age, gender)
							   VALUES ('{$nick}','{$password}', '{$email}',
									   '{$name}', '{$surname}', '{$age}', '{$gender}')");	
	
	}
	
	function addConnection($nick, $email, $ip) { 
		return makeQuery("INSERT INTO connection (nick, email, ip) 
						  VALUES ('{$nick}', '{$email}', '{$ip}')");
	}
	
	function addAction($nick, $email, $ip, $action) {
		// 'register', 'logged_in', 'logout', 'new_photo', 'new_album'
		// 'delete_photo', 'delete_album', 'change_password', 'deleted_account'		
		
		if (strcmp($action, 'register') != 0 and 
			strcmp($action, 'logged_in') != 0 and strcmp($action, 'logout') != 0 and 
			strcmp($action, 'new_photo') != 0 and strcmp($action, 'new_album') != 0 and 
			strcmp($action, 'delete_photo') != 0 and strcmp($action, 'delete_album') != 0 and 
			strcmp($action, 'change_password') != 0 and strcmp($action, 'deleted_account') != 0 )
				return false;
		
		return makeQuery("INSERT INTO action (nick, email, ip, action) VALUES ('{$nick}', '{$email}', '{$ip}', '{$action}')");	
	}

	function addAlbum($nick, $albumName, $coverPath) {
		if (strcmp($coverPath, "DEFAULT") == 0)
			return makeQuery("INSERT INTO album (nick, name, cover) VALUES ('{$nick}', '{$albumName}', DEFAULT)");
		
		return makeQuery("INSERT INTO album (nick, name, cover) VALUES ('{$nick}', '{$albumName}', '{$coverPath}')");
	}
	
	function addPhoto($nick, $path, $albumName) {
		return makeQuery("INSERT INTO photo (nick, path, album) VALUES ('{$nick}', '{$path}', '{$albumName}')");
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	
	function getPassword($nick) {
		return mysqli_fetch_assoc(makeQuery("SELECT password FROM user WHERE nick = '{$nick}'"))['password'];		
	}
	
	function getEmail($nick) {
		return mysqli_fetch_assoc(makeQuery("SELECT email FROM user WHERE nick='{$nick}'"))['email'];
	}
	
	function getRole($nick) {
		return mysqli_fetch_assoc(makeQuery("SELECT role FROM user WHERE nick='{$nick}'"))['role'];
	}
	
	function getAlbums($nick) {
		return makeQuery("SELECT * FROM album WHERE nick='{$nick}'");
	}
	
	function setPassword($nick, $password) {
		return makeQuery("UPDATE user SET password='{$password}' WHERE nick='{$nick}'");
	}
	
	function setAvatar($nick, $avatar_path) {
		return makeQuery("UPDATE user SET avatar='{$avatar_path}' WHERE nick='{$nick}'");
	}
	
	function setAlbumCover($nick, $albumName, $albumCoverPath) {
		if (strcmp($albumCoverPath, "DEFAULT") == 0)
			return makeQuery("UPDATE album SET cover=DEFAULT WHERE nick='{$nick}' AND name='{$albumName}''");
			
		return makeQuery("UPDATE album SET cover='{$albumCoverPath}' WHERE nick='{$nick}' AND name='{$albumName}'");
	}
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	function isAlbum($nick, $albumName) {
		return makeQuery("SELECT COUNT[*] FROM album WHERE nick='{$nick}' AND name='{$albumName}'") > 0;
	}	
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	function get_client_ip() {
		$ipaddress = '';
		if (getenv('HTTP_CLIENT_IP'))
			$ipaddress = getenv('HTTP_CLIENT_IP');
		else if(getenv('HTTP_X_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		else if(getenv('HTTP_X_FORWARDED'))
			$ipaddress = getenv('HTTP_X_FORWARDED');
		else if(getenv('HTTP_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		else if(getenv('HTTP_FORWARDED'))
		   $ipaddress = getenv('HTTP_FORWARDED');
		else if(getenv('REMOTE_ADDR'))
			$ipaddress = getenv('REMOTE_ADDR');
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}
?> 