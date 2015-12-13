<?php
	include './business_logic/functions/menu_logic.php';
	include_once './business_logic/functions/database_logic.php';
	session_start();
	$nick = $_SESSION['nick'];
	$role = getRole($nick);
	$avatar = getAvatar($nick);
	$lastConnection = getLastConnection($nick);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Bigou - Mi Perfil</title>       
        <link href="style/bigou_style.css" rel="stylesheet" type="text/css" />
		<script language="JavaScript" src="./business_logic/ajax_bl.js"></script>
		<script language="JavaScript" type="text/javascript" src="./business_logic/lib/jquery-1.11.3.min.js"></script>
		<script>
			var nick = "<?php echo $nick; ?>";
			
			function checkPass() {
				var pass = document.getElementByName("newPass").newPass.value;
				var passRepe = document.getElementByName("newPass").newPassRepe.value;
				
				if (pass != passRepe) {
					alert("La contraseña no coincide.\n");
					return false;
				}
				return true;		
			}
			
			function uploadPassword() {
			
			
			}
			
		</script>
	</head>  
	<body>
		<div class="Canvas">
			<?php echo menuHeader(isset($_SESSION['nick']), $_SESSION['nick'], $_SESSION['role']); ?>
			
			<div class="GeneralDisplay">	
				<?php echo '
					<h1>Mi Cuenta</h1>
					<table class="Fancy">
					  <tr>
						<td width="150"><h2>Usuario</h2></td>
						<td colspan="2">'.$nick.'</td>
					  </tr>
					  <tr>
						<td><h2>Avatar</h2></td>
						<td><div id="avatar"><img src="'.$avatar.'" width="120px" height="auto"></div></td>
						<td>
							<h2>Cambiar Avatar</h2>
							<input type="file" name="new_avatar" id="new_avatar" onChange="loadFile(event)">
							<br/><br/>
							<img id="output" width="150px" height="auto"/></br>
							<br/><br/>
								<script>
									var loadFile = function(event) {
										var output = document.getElementById("output");
										output.src = URL.createObjectURL(event.target.files[0]);
									  };
								</script>
							<button class="Basic Fancy" onClick="changeAvatar(loadFile)">Cambiar Avatar</button>
						</td>
					  </tr>
					  <tr>
						<td><h2>Rol</h2></td>
						<td colspan="2">'.$role.'</td>
					  </tr>
					  <tr>
						<td><h2>Última Conexión</h2></td>
						<td colspan="2">'.$lastConnection.'</td>
					  </tr>
					  <tr>
						<td><h2>Contraseña</h2></td>
						<td colspan="2">
							<label>Contraseña actual:</label>
							<input type="password" name="oldPass" id="oldPass"></br></br>
							<label>Nueva contraseña:</label>
							<input type="password" name="newPass" id="newPass"></br></br>
							<label>Repita la contraseña:</label>
							<input type="password" name="newPassRepe" id="newPassRepe" onBlur = "checkPass()"></br></br>
							<button class="Basic Fancy"> Cambiar Contraseña </button>
						</td>
					  </tr>
					</table>
					<br>';
				?>				
				<h1>Mis Álbumes</h1>
				<div class="Display">
				<?php
					$userAlbums = getAlbums($nick); 
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
				?> 
				</div>							
				<br/><br/>
			</div>
    	</div>
	</body>
</html>