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
        <title>Bigou - Nuevo Álbum</title>       
        <link href="style/bigou_style.css" rel="stylesheet" type="text/css" />
        <!--<link rel='stylesheet' type='text/css' media='only screen and (max-width: 480px)' href='estilos/smartphone.css'/>-->
	</head>  
    <body>
	<body>
		<div class="canvas">
			<?php echo menuHeader(true, $nick, $_SESSION['role']); ?>	
		
			<p> Los campos marcados con (*) son obligatorios.</p><br/>
			<form enctype="multipart/form-data" onSubmit='' action="./business_logic/newAlbum_bl.php" method="post" name="newAlbum" > 
				(*) Nombre del Álbum:<br/>
				<input type="text" name="albumName" onBlur = ""> 
				<br/><br/>
						
				<!-- Subida del archivo -->
				Portada:
				<input type="file" name="albumCover" id="albumCover" onChange="loadFile(event)"></br>
				<p>Vista previa de la portada:</p>
				<img id="output" width="150px" height="auto"/></br>
					<script>
					  var loadFile = function(event) {
						var output = document.getElementById('output');
						output.src = URL.createObjectURL(event.target.files[0]);
					  };
					</script>
				<br/>
				<input type="submit" value="Crear nuevo álbum" name="submit" >
			</form>       
		</div>
	</body>
</html>