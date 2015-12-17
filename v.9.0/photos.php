<?php
	include_once './business_logic/functions/database_logic.php';
	include_once './business_logic/functions/photo_logic.php';
	include './business_logic/functions/menu_logic.php';
	session_start();
			
	$nick = $_SESSION['nick']; 
	$targetNick = $_GET['user'];
	$album = $_GET['album']; 	
	
	if (!(isset($targetNick) or isset($nick) or isset($_GET['album'])))
		header('Location: main.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo "Bigou - (".$nick.") - ".$album; ?></title>       
        <link href="style/bigou_style.css" rel="stylesheet" type="text/css" />
		<script language="JavaScript" src="./business_logic/ajax_bl.js"></script>
		<script language="JavaScript" type="text/javascript" src="./business_logic/lib/jquery-1.11.3.min.js"></script>
		<script>
			var nick = "<?php echo $nick; ?>";
			var album = "<?php echo $album;?>";
			getPhotosOf(nick, album); 
			//var intervalID = window.setInterval( function () { getPhotosOf(nick, album); }, 5000);	
			
		</script>
	</head> 
	<body>
		<div class="Canvas">
			<?php 
				echo menuHeader(true, $nick, $_SESSION['role']);
				
				if (strcmp($nick, $targetNick) == 0 and isAlbum($targetNick, $album))
					echo newPhotoForm($album).'<br/><br/><hr/><br/><br/>'; 				
			?>  
			<div id="display" class="Display"></div>    
			<br/><br/>   
		</div>
	</body>
</html>