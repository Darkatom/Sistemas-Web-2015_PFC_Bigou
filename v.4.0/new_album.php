<?php
	include './business_logic/functions/menu_logic.php';
	session_start();
	if (!isset($_SESSION['nick']))
		header('Location: main.php');
	$nick = $_SESSION['nick'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Bigou - Crear Álbum</title>       
        <link href="style/bigou_style.css" rel="stylesheet" type="text/css" />
        <!--<link rel='stylesheet' type='text/css' media='only screen and (max-width: 480px)' href='estilos/smartphone.css'/>-->
	</head>  
    <body>
	<body>
		<div class="Canvas">
			<?php echo menuHeader(true, $nick, $_SESSION['role']); ?>	
		
			<form class="Fancy" enctype="multipart/form-data" onSubmit='' action="./business_logic/newAlbum_bl.php" method="post" name="newAlbum" > 
				<fieldset>
					<legend>Crear Álbum</legend>
					<label>Los campos marcados con (*) son obligatorios.</label><br/><br/>
					
					<label>(*) Nombre del Álbum:</label> &emsp; <input type="text" name="albumName" onBlur = ""> 
					<br/><br/>					
					<label>(*) Acceso:</label> &emsp; <select name="access" onBlur="checkAccess()">
															<option value="private" selected>Privado</option>
															<option value="limited">Acceso Limitado (Sólo usuarios registrados)</option>
															<option value="public">Público</option>
														</select>
					<br/><br/>
					<hr/>	
					<br/>					
					
					<span> Portada: </span>
					<br/><br/>
					<input type="file" name="avatar" id="avatar" onChange="loadFile(event)">
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
					<input type="submit" class="Basic Fancy" value="Crear nuevo álbum" name="submit" >
				</div>
			</form>    
			<br/><br/>   
		</div>
	</body>
</html>