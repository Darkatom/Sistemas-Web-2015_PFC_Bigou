<?php
	include_once './business_logic/functions/database_logic.php';
	include './business_logic/functions/menu_logic.php';
	
	session_start();
	
	if (!isset($_SESSION['nick']))
		header('Location: main.php');
	
	//$ip = get_client_ip();
	$nick = $_SESSION['nick']; 
	//$email = $_SESSION['email']; 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Bigou - Mis Álbumes</title>       
        <link href="style/bigou_style.css" rel="stylesheet" type="text/css" />
		<script language="JavaScript" src="./business_logic/ajax_bl.js"></script>
		<script language="JavaScript" type="text/javascript" src="./business_logic/lib/jquery-1.11.3.min.js"></script>
		<script>
			var nick = "<?php echo $nick; ?>";
			getAlbumsOf(nick); 
			//var intervalID = window.setInterval( function () { getAlbumsOf(nick); }, 5000);	
			
			function uploadAlbum() {
				var album = document.getElementById('albumName').value;
				var access = document.getElementById('access').value;
				addAlbum(album, access, loadFile);
				// Vaciar formulario
			}
			
			function removeAlbum(albumName) {
				deleteAlbum(albumName);
			}
			
		</script>
	</head>  
	<body>
		<div class="Canvas">
			<?php echo menuHeader(true, $nick, $_SESSION['role']); ?>
			<div class="GeneralDisplay">
				<form class="Fancy">
					<fieldset>
						<legend>Crear álbum</legend>
						<label>Los campos marcados con (*) son obligatorios.</label><br/><br/>
						
						<label>(*) Nombre del álbum:</label> &emsp; <input type="text" id="albumName" onBlur = ""> 
						<br/><br/>					
						<label>(*) Acceso:</label> &emsp; <select id="access" onBlur="checkAccess()">
																<option value="private" selected>Privado</option>
																<option value="limited">Acceso Limitado (Sólo usuarios registrados)</option>
																<option value="public">Público</option>
															</select>
						<br/><br/>
						<hr/>	
						<br/>					
						
						<span> Portada: </span>
						<br/><br/>
						<input type="file" name="albumCover" id="albumCover" onChange="loadFile(event)">
						<br/><br/>
						<img id="output" align="center" width="150px" height="auto"/></br>
							<script>
								var loadFile = function(event) {
								var output = document.getElementById('output');
								output.src = URL.createObjectURL(event.target.files[0]);
							  };
							</script>
						<br/><br/>
					</fieldset>
					<br/>
					<div style="text-align: center;">
						<button class="Basic Fancy" onClick="uploadAlbum()"> Crear nuevo álbum </button>
					</div> 
				</form>				
			</div>
			<br/><br/>
			<hr/>
			<br/><br/>  
			<div id="display" class="Display"></div>    
			<br/><br/>   
		</div>
	</body>
</html>