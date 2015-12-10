<?php
	include './business_logic/functions/menu_logic.php';
	include_once './business_logic/functions/database_logic.php';
	session_start();
	$nick = $_SESSION['nick'];
	$role = getRole($nick);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Bigou - Perfil</title>       
        <link href="style/bigou_style.css" rel="stylesheet" type="text/css" />
        <!--<link rel='stylesheet' type='text/css' media='only screen and (max-width: 480px)' href='estilos/smartphone.css'/>-->
	</head>  
	<body>
		<div class="Canvas">
			<?php echo menuHeader(isset($_SESSION['nick']), $_SESSION['nick'], $_SESSION['role']); 
			$userProfile=$_GET['nick']; //Recogemos la variable que nos dice el nombre del album.
			$avatar=getAvatar($userProfile);
			$lastConnection = getLastConnection($userProfile);
			//Falta sacar el rol del usuario.
			echo '
				<div class="GeneralDisplay">
					<h1>Perfil de '.$userProfile.'</h1>
					<table width="auto" border="3" align="center">
					  <tr>
						<td>Usuario</td>
						<td>'.$userProfile.'</td>
					  </tr>
					  <tr>
						<td>Avatar</td>
						<td><a href="/'.$avatar.'"><img src="/'.$avatar.'" width="120px" height="auto"></a></td>
					  </tr>
					  <tr>
						<td>Rol</td>
						<td>'.$role.'</td>
					  </tr>
					  <tr>
						<td>Última Conexión</td>
						<td>'.$lastConnection.'</td>
					  </tr>
					</table>
					<br>
					<h1>Mis Álbumes</h1>
					<p>Aquí se mostrarán los álbumes del usuario</p>
					<br><br/>
				</div>';
			?>
    	</div>
	</body>
</html>