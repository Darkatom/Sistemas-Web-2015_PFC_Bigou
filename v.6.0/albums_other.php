<?php
	include_once './business_logic/functions/database_logic.php';
	include './business_logic/functions/menu_logic.php';
	session_start();
	if (!isset($_SESSION['nick'])){
		$nick="Guest";
	}else{
		$nick = $_SESSION['nick'];
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Bigou - Álbumes</title>       
        <link href="style/bigou_style.css" rel="stylesheet" type="text/css" />
        <!--<link rel='stylesheet' type='text/css' media='only screen and (max-width: 480px)' href='estilos/smartphone.css'/>-->
	</head>  
    <body>
	<body>
		<div class="Canvas">
			<?php echo menuHeader(true, $nick, $_SESSION['role']); ?>
			<div class="Display">
				<?php
					$userAlbums = getPublicAlbums(); 
					foreach($userAlbums as $album ) {	
						$mialbum=$album['name'];
						echo "<div class='Album'>
								<img src='".$album['cover']."'/>
								<p>".$album['name']."</p>
								<a href='./photos.php?var=$mialbum'><button class='Basic Fancy' name='photos' onClick=''>Ver</button></a>
								<a href='./business_logic/deleteAlbum_bl.php?albumName=$mialbum'><button class='Basic Fancy' name='delete' onclick='deleteAlbum($nick, $miAlbum );'>&#10008</button></a>
							  </div>";	
							  //La variable por la que le paso el nombre del album es "var".
							  // AJAX para borrar Álbumes
					}
					if ($nick != "Guest"){
						$userAlbums = getLimitedAlbums(); 
						foreach($userAlbums as $album ) {	
							$mialbum=$album['name'];
							echo "<div class='Album'>
									<img src='".$album['cover']."'/>
									<p>".$album['name']."</p>
									<a href='./photos.php?var=$mialbum'><button class='Basic Fancy' name='photos' onClick=''>Ver</button></a>
									<a href='./business_logic/deleteAlbum_bl.php?albumName=$mialbum'><button class='Basic Fancy' name='delete' onclick='deleteAlbum($nick, $miAlbum );'>&#10008</button></a>
								  </div>";	
								  //La variable por la que le paso el nombre del album es "var".
								  // AJAX para borrar Álbumes
						}
					}
				?> 
			</div>    
			<br/><br/>   
		</div>
	</body>
</html>