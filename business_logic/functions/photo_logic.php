<?php
	include_once 'database_logic.php';
	
	function newAlbum($ip, $nick, $email, $albumName) {
		if (addAlbum($ip, $nick, $email, $albumName)) {			
			addAction($nick, $email, $ip, 'new_album');
			return true;
		}
		
		return false;
	}
	
	function deleteAlbum($nick, $albumName) {
		/*
		if (makeQuery("DELETE FROM album WHERE...") {
			newAction($nick, $email, $ip, 'delete_album');
			return true;
		}
		
		return false;
		*/
	}
	
	function uploadPhoto($ip, $image, $nick, $email, $path, $albumName) {
		$existsAlbum = isAlbum($nick, $albumName) > 0; 
		
		if (!$existsAlbum)
			if (!newAlbum($ip, $nick, $email, $albumName))
				return '1';
		
	
		if (uploadImage($image, $path)){
			$avatar_real_path = $path.basename($image["name"]);
			$newPhoto = addPhoto($nick, $avatar_real_path, $albumName);
			
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
		return move_uploaded_file($_SERVER['DOCUMENT_ROOT']."/bigou/business_logic".$image["tmp_name"], 
								  $_SERVER['DOCUMENT_ROOT']."/bigou/".$path."/".$image["name"]);
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