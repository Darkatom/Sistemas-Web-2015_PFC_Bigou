<?php
	function notLogged() {							
        return '
		<div class="login">
			<h1>Log in</h1>
			<form action="./business_logic/login_bl.php" method="post" name="login">
				<input name="nick" type="text"/><br/>
				<input name="password" type="password"/><br/>
				<input type="submit" value="Log in" name="login"/>
			</form>
			<p><a href="changePassword.php">¿Ha olvidado la contraseña?</a></p>
			<p>¡Aún no tienes una cuenta? <a href="register.php">Regístrate</a>.</p>		
		</div>';
	}
	
	function logged($nick) {			
        return '<div class="login">
					<h1>'.$nick.'</h1>
					<p><a href="viewAccount.php">Mi cuenta</a></p>
					<p><a href="business_logic/logout_bl.php">Cerrar sesión</a>.</p>		
				</div>';
	}
	
	function menuHeader($logged, $nick, $role) {
		$header = '<div class="header"> 
					<table class="cabecera">
						<tr>
							<td class="title">
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
							<td class="menu" colspan="2">
								<a href="main.php"><button class="botonMenu" name="inicio">Inicio</button></a><!-- Poner el comentario así hace que 
							--><a href=".html"><button class="botonMenu" name="">Opción A</button></a><!--no haya espacio entre los botones
							--><a href=".html"><button class="botonMenu" name="">Opción B</button></a><!--
							--><a href=".html"><button class="botonMenu" name="">Opción C</button></a>
						</td>
					</tr>
				</table>
			</div>';
						
		return $header;
	}
?>