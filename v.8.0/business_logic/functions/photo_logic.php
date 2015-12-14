<?php
	include_once 'database_logic.php';
	
	function newAlbum($ip, $nick, $email, $albumName, $access, $coverPath) {
		if (!addAlbum($nick, $albumName, $access, $coverPath)) 			
			return false;
		
		addAction($nick, $email, $ip, 'new_album');
		return true;
	}
	
	function deleteAlbum($nick, $albumName, $email, $ip) {	
		if (removeAlbum($nick, $albumName)) {
			addAction($nick, $email, $ip, 'delete_album');
			return true;
		}
		return false;
	}
	
	function deletePhoto($nick, $albumName, $path, $email, $ip) {
		
		if (removePhoto($nick, $path, $albumName)) {
			addAction($nick, $email, $ip, 'delete_photo');
			return true;
		}
		return false;
	}
	
	function uploadPhoto($ip, $image, $nick, $email, $path, $albumName) {
		$existsAlbum = isAlbum($nick, $albumName); 
	
		if (!$existsAlbum) {
			if (!newAlbum($ip, $nick, $email, $albumName, "private", "DEFAULT"))
				return '1';
		}		
	
		if (uploadImage($image, $path)){
			$newPhoto = addPhoto($nick, $path, $albumName);
			
			if (!newPhoto and !$existsAlbum) {
				deleteAlbum($nick, $albumName);
				// Remove Photo
				return '2';
			}
				
			addAction($nick, $email, $ip, 'new_photo');
			return '0';
		}			
		return '3';
	}	
	
	function uploadImage($image, $path) {
		return move_uploaded_file($image["tmp_name"], "../".$path);
	}
	
	function acceptImage($image) {
		if(getimagesize($image["tmp_name"])) {
			$extension = pathinfo(basename($image["name"]),PATHINFO_EXTENSION);
			return checkSize($image['size']) and checkFileExtension($extension);
		}
		
		return false;
	}
	
	function checkSize($size) {
		return $size <= 500000000;		
	}
	
	function checkFileExtension($extension) {
		return $extension == "jpg" or $extension == "png" 
			or $extension == "jpeg" or $extension == "gif";
	}
	
?>