function validatePassword(password) {		
	if (window.XMLHttpRequest) {
		var xmlhttp = new XMLHttpRequest();
	} else {
		var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {	
			switch(xmlhttp.responseText) {
				case "true":
					$("#password_error").html("<h6>&#10004;/h6>");
					$("#password_error").attr("class", "Correct");
					break;
				case "false":
					$("#password_error").html("<h6>Su contraseña no es segura.</h6>");
					$("#password_error").attr("class", "Error");
					break;
				default:
					$("#password_error").html("<h6>Lo sentimos, ha habido un error.</h6>");
					$("#password_error").attr("class", "Error");
					break;
			}		 
		}
	}
	
	xmlhttp.open("GET", "checkPassword_NUSOAP_CALL.php?password=" + password, true);
	xmlhttp.send();
}

function isEmail(email) {				
	if (window.XMLHttpRequest) {
		var xmlhttp = new XMLHttpRequest();
	} else {
		var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			var result = xmlhttp.responseText;
			if (result == 0) {
					$("#email_error").html("<h6>&#10004;</h6>");
					$("#email_error").attr("class", "Correct");
					
			} else if (result == 1) {
					$("#email_error").html("<h6>Ese e-mail ya está en uso.</h6>");
					$("#email_error").attr("class", "Error");
					
			} else {
					$("#email_error").html("<h6>" + xmlhttp.responseText + "</h6>");
					$("#email_error").attr("class", "Error");
					
			}
		}
	}
	
	xmlhttp.open("GET","/business_logic/checkEmail_bl.php?email=" + email, true);
	xmlhttp.send();	
}

function isNick(nick) {				
	if (window.XMLHttpRequest) {
		var xmlhttp = new XMLHttpRequest();
	} else {
		var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			var result = xmlhttp.responseText;
			if (result == 0) {
					$("#user_error").html("<h6>&#10004;</h6>");
					$("#user_error").attr("class", "Correct");
					
			} else if (result == 1) {
					$("#user_error").html("<h6>Ese nombre de usuario ya está en uso.</h6>");
					$("#user_error").attr("class", "Error");
					
			} else {
					$("#user_error").html("<h6>" + xmlhttp.responseText + "</h6>");
					$("#user_error").attr("class", "Error");
					
			}
		}
	}
	
	xmlhttp.open("GET","/business_logic/checkNick_bl.php?nick=" + nick, true);
	xmlhttp.send();	
}

function changeAvatar() {
	var formData = new FormData($("#ajaxAvatar")[0]);
	$.ajax({
		url: "/business_logic/newAvatar_bl.php",
		type: "POST",
		data: formData,
		contentType: false,
		processData: false,
		success: function(avatarSRC) {
			$("#loggedAvatar").html("<img src='" + avatarSRC + "' width='120px' height='auto'>");
			$("#profileAvatar").html("<img src='" + avatarSRC + "' width='120px' height='auto'>");
		}
	});
}

function changePassword(oldPassword, newPassword, repeatPassword) {				
	if (window.XMLHttpRequest) {
		var xmlhttp = new XMLHttpRequest();
	} else {
		var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {			
			switch(xmlhttp.responseText) {
				case 0:
					document.getElementById("oldPassword").value = "";								
					document.getElementById("newPassword").value = "";
					document.getElementById("repeatPassword").value = "";
					$("#old_error").html("");
					$("#old_error").attr("class", "");
					$("#new_error").html("");
					$("#new_error").attr("class", "");
					$("#repeat_error").html("");
					$("#repeat_error").attr("class", "");
					break;
				case 1:
					$("#new_error").html("<h6>Su nueva contraseña no es segura.</h6>");
					$("#new_error").attr("class", "Error");
					break;
				case 2:
					$("#old_error").html("<h6>Ésta no es su contraseña.</h6>");
					$("#old_error").attr("class", "Error");
					break;
				case 3:
					$("#repeat_error").html("<h6>Sus contraseñas no coinciden.</h6>");
					$("#repeat_error").attr("class", "Error");
					break;
				default:
					document.getElementById("oldPassword").value = "";								
					document.getElementById("newPassword").value = "";
					document.getElementById("repeatPassword").value = "";
					$("#old_error").html("");
					$("#old_error").attr("class", "");
					$("#new_error").html("");
					$("#new_error").attr("class", "");
					$("#repeat_error").html("");
					$("#repeat_error").attr("class", "");
					alert("Lo sentimos, ha habido un error inesperado procesando su petición. Por favor, inténtelo de nuevo más tarde.");
					break;
			}
		}
	}
	
	xmlhttp.open("GET","/business_logic/newPassword_bl.php?oldPassword=" + oldPassword 
														+ "&newPassword=" + newPassword
														+ "&repeatPassword=" + repeatPassword, true);
	xmlhttp.send();	
}

function addAlbum(albumName, access) {
	var cover = new FormData($("#newAlbum")[0]);

	var parametros = new FormData();
	parametros.append("albumName", albumName);
	parametros.append("access", access);
	parametros.append("albumCover", cover);
			
	$.ajax({
		url: "/business_logic/newAlbum_bl.php",
		type: "POST",
		data: parametros,
		contentType: false,
		processData: false,
		success: function(datos) {
			alert(datos);
			getAlbumsOf(targetNick); 	
		}
	});				
}

function addPhoto(albumName, image) {				
	if (window.XMLHttpRequest) {
		var xmlhttp = new XMLHttpRequest();
	} else {
		var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			getPhotosOf(targetNick, albumName); 	
		}
	}
	
	xmlhttp.open("GET","/business_logic/newPhoto_bl.php?albumName=" + albumName + "&image=" + image, true);
	xmlhttp.send();	
}

function getAlbumsOf(target) {		
	if (window.XMLHttpRequest) {
		var xmlhttp = new XMLHttpRequest();
	} else {
		var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			$("#display").html(xmlhttp.responseText);
		}
	}
	
	xmlhttp.open("GET","/business_logic/getAlbums_bl.php?target=" + target, true);
	xmlhttp.send();
}

function getPhotosOf(target, album) {		
	if (window.XMLHttpRequest) {
		var xmlhttp = new XMLHttpRequest();
	} else {
		var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			$("#display").html(xmlhttp.responseText);
		}
	}
	
	xmlhttp.open("GET","/business_logic/getPhotos_bl.php?target=" + target + "&album=" + album, true);
	xmlhttp.send();
}

function getAllUsers() {
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		var xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			$("#display").html(xmlhttp.responseText);
		}
	}
	
	xmlhttp.open("GET","/business_logic/getUsers_bl.php", true);
	xmlhttp.send();
}

function getUnacceptedUsers(accepted) {		
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		var xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			$("#display").html(xmlhttp.responseText);
		}
	}
	
	xmlhttp.open("GET","/business_logic/getUsers_bl.php?accepted=" + accepted, true);
	xmlhttp.send();
}

function getDropRequested(request) {		
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		var xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			$("#display2").html(xmlhttp.responseText);
		}
	}
	
	xmlhttp.open("GET","/business_logic/getDropRequests_bl.php?request=" + request, true);
	xmlhttp.send();
}

function deleteAlbum(albumName, owner) {				
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		var xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			getAlbumsOf(targetNick); 	
		}
	}
	
	xmlhttp.open("GET","/business_logic/deleteAlbum_bl.php?albumName=" + albumName + "&nick=" + owner, true);
	xmlhttp.send();	
}

function deletePhoto(targetNick, albumName, path) {				
	if (window.XMLHttpRequest) {
		var xmlhttp = new XMLHttpRequest();
	} else {
		var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			getPhotosOf(targetNick, albumName); 	
		}
	}
	
	xmlhttp.open("GET","/business_logic/deletePhoto_bl.php?albumName=" + albumName + "&path=" + path, true);
	xmlhttp.send();	
}

function accept(user){
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		var xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			getAllUsers();
		}
	}
	
	xmlhttp.open("GET","/business_logic/acceptUsers_bl.php?user=" + user, true);
	xmlhttp.send();
}

function dropUser(user){
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		var xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			getAllUsers();
		}
	}
	
	xmlhttp.open("GET","/business_logic/dropUser_bl.php?user=" + user, true);
	xmlhttp.send();
}

function makeDropRequest(user){
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		var xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			var result = xmlhttp.responseText;
			alert("Un administrador borrará su cuenta en breves.\nEsperamos que haya disfrutado de su tiempo con nosotros.");						
		}
	}
	
	xmlhttp.open("GET","/business_logic/makeDropRequest_bl.php?user=" + user, true);
	xmlhttp.send();
}