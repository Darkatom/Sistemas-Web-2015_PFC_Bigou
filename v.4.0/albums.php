<?php
	include_once './business_logic/functions/database_logic.php';
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
        <title>Bigou - Mis Álbumes</title>       
        <link href="style/bigou_style.css" rel="stylesheet" type="text/css" />
        <!--<link rel='stylesheet' type='text/css' media='only screen and (max-width: 480px)' href='estilos/smartphone.css'/>-->
	</head>  
    <body>
	<body>
		<div class="Canvas">
			<?php echo menuHeader(true, $nick, $_SESSION['role']); ?>
			<div class="Display">
				<?php
					$userAlbums = getAlbums($nick); 
					foreach($userAlbums as $album ) {				
						echo "<div class='Album'>
								<img src='".$album['cover']."'/>
								<p>".$album['name']."</p>
								<a href=''><button class='Basic Fancy' name='photos' onClick=''>Ver</button></a><!--
								--><button class='Basic Fancy' name='delete' onClick=''>&#10008</button>
							  </div>";	
							  // AJAX para borrar Álbumes
					}
				?> 
			</div>    
			<br/><br/>   
		</div>
	</body>
</html>