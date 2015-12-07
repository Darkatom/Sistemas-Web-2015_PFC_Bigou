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
        <!--<link rel='stylesheet' type='text/css' media='only screen and (max-width: 480px)' href='estilos/smartphone.css'/>-->
	</head>  
	<body>
		<div class="Canvas">
			<?php echo menuHeader(isset($_SESSION['nick']), $_SESSION['nick'], $_SESSION['role']); ?>
			
			<div class="GeneralDisplay">
			
			<?php echo '
				<h1>Mi Cuenta</h1>
				<table width="auto" border="3" align="center">
				  <tr>
					<td>Usuario</td>
					<td>'.$nick.'</td>
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
				<br>';
			?>
			
				<h1>Cambiar Avatar</h1>
				<p>Suba una nueva imagen.</p>
				<form class="Fancy" enctype="multipart/form-data" onSubmit='' action="./business_logic/newAvatar_bl.php" method="post" name="newAvatar" > 
					<input type="file" name="avatar" id="avatar" onChange="loadFile(event)">
					<br/><br/>
					<img id="output" align="center" width="150px" height="auto"/></br>
					<br/><br/>
						<script>
						  var loadFile = function(event) {
							var output = document.getElementById('output');
							output.src = URL.createObjectURL(event.target.files[0]);
						  };
						</script>
					<input type="submit" class="Basic Fancy" value="Cambiar Avatar" name="submit" >
				</form>
				
				<h1>Cambiar Contraseña</h1>
				<p>Rellene el formulario para cambiar de contraseña.</p>
				<form class="Fancy" enctype="multipart/form-data" onSubmit='' action="./business_logic/newPass_bl.php" method="post" name="newPass" > 
                    <table width="auto" border="0">
                      <tr>
                        <td><label>Anterior contraseña:</label></td>
                        <td><input type="password" name="oldPass" id="oldPass"></br></td>
                      </tr>
                      <tr>
                        <td><label>Nueva contraseña:</label></td>
                        <td><input type="password" name="newPass" id="newPass"></br></td>
                      </tr>
                      <tr>
                        <td><label>Repita la contraseña:</label></td>
                        <td><input type="password" name="newPassRepe" id="newPassRepe"></br></td>
                      </tr>
                    </table>

					<input type="submit" class="Basic Fancy" value="Cambiar Avatar" name="submit" >
				</form>
				<br/><br/>
			</div>
    	</div>
	</body>
</html>