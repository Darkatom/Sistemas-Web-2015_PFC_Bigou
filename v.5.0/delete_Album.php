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
        <title>Bigou - Eliminar Álbum</title>       
        <link href="style/bigou_style.css" rel="stylesheet" type="text/css" />
        <!--<link rel='stylesheet' type='text/css' media='only screen and (max-width: 480px)' href='estilos/smartphone.css'/>-->
	</head>  
    <body>
	<body>
		<div class="Canvas">
			<?php echo menuHeader(true, $nick, $_SESSION['role']); ?>	
			<div class="GeneralDisplay">
				<p> Los campos marcados con (*) son obligatorios.</p><br/>
				<form enctype="multipart/form-data" onSubmit='' action="./business_logic/deleteAlbum_bl.php" method="post" name="deleteAlbum" > 
					(*) Nombre del Álbum:<br/>
					<input type="text" name="albumName" onBlur = ""> 
					<br/><br/>
					<!--Estaría bien hacer un desplegable select para que el usuario elija un álbum para eliminar.-->
					<input type="submit" value="Eliminar álbum" name="submit" >
				</form>     
			</div>
		</div>
	</body>
</html>