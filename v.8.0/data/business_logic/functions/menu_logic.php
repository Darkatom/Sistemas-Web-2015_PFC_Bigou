<?php
	function notLogged() {							
        return '
		<div class="Login">
			<h1>Log in</h1>
			<form action="./business_logic/login_bl.php" method="post" name="login">
				<input name="nick" type="text"/><br/>
				<input name="password" type="password"/><br/>
				<input type="submit" class="Basic Fancy Login" value="Log in" name="login"/>
			</form>
			<p><a href="changePassword.php">¿Ha olvidado la contraseña?</a></p>
			<p>¡Aún no tienes una cuenta? <a href="register.php">Regístrate</a>.</p>		
		</div>';
	}
	
	function logged($nick) {			
        return '<div class="Login">
					<h1>'.$nick.'</h1>
					<a href="profile.php"><button class="Basic Fancy Login" name="profile">Mi cuenta</button></a>
					<a href="business_logic/logout_bl.php"><button class="Basic Fancy Login" name="logout">Cerrar sesión</button></a>	
				</div>';
	}
	
	function menuHeader($logged, $nick, $role) {
		$header = '<div class="Header"> 
					<table class="Cabecera">
						<tr>
							<td class="Title">
								<h1>Bigou</h1>
							</td>
							<td>';
		if (!$logged) {
			$header = $header.notLogged();
		} else {	
			$header = $header.logged($nick);
		}
		
		$header = $header.'</td>
						</tr>
						<tr>
							<td class="Menu" colspan="2">
								<a href="main.php"><button class="Basic Menu" name="main">Inicio</button></a><!--';
		if ($logged) {
			$header = $header.'--><a href="new_album.php"><button class="Basic Menu" name="newAlbum">Crear Álbum</button></a><!--
							   --><a href="new_photo.php"><button class="Basic Menu" name="newPhoto">Subir Foto</button></a><!--';
		}
							
		$header = $header.'--><a href=".html"><button class="Basic Menu" name="credits.php">Créditos</button></a>
						</td>
					</tr>
				</table>
			</div>';
						
		return $header;
	}
?>