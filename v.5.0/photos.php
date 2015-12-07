<?php
	include_once './business_logic/functions/database_logic.php';
	include_once './business_logic/functions/photo_logic.php';
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
        <title>Bigou - Fotografías</title>       
        <link href="style/bigou_style.css" rel="stylesheet" type="text/css" />
        <!--<link rel='stylesheet' type='text/css' media='only screen and (max-width: 480px)' href='estilos/smartphone.css'/>-->
	</head>  
    <body>
	<body>
		<div class="Canvas">
			<?php echo menuHeader(true, $nick, $_SESSION['role']); ?>
			<div class="PhotoDisplay">
				<?php
					$album=$_GET['var']; //Recogemos la variable que nos dice el nombre del album.
					$albumPics = getPhotos($nick, $album); 
					foreach($albumPics as $photo ) {
						$miPath=$photo['path'];
						echo "<div class='Album'>
								<a href='".$photo['path']."'><img src='".$photo['path']."' width=\"400\"/><a>
								<a href='./business_logic/deletePhoto_bl.php?albumName=$album&path=$miPath'><button class='Basic Fancy' name='delete' onclick='deleteAlbum($nick, $miAlbum );'>&#10008</button></a>
								<br></br>
							  </div>";	
							  // AJAX para borrar Fotos
					}
				?> 
			</div>    
			<br/><br/>   
		</div>
	</body>
</html>