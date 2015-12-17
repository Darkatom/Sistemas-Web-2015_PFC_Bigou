<?php
	include_once 'database_logic.php';
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
		$avatarPath = getAvatar($nick);
        return '<div class="Login">
					<h1>'.$nick.'</h1>
					<div id="avatar"><img src="'.$avatarPath.'" width="100" height="auto"/></div>
					<br/><br/>
					<a href="profile.php"><button class="Basic Fancy Login" name="profile">Mi perfil</button></a>
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
			$header = $header.'--><a href="albums.php"><button class="Basic Menu" name="albums">Mis Álbumes</button></a><!--
							   --><a href="albums.php"><button class="Basic Menu" name="albums">Buscar</button></a><!--
							   --><a href="albums.php"><button class="Basic Menu" name="albums">Usuarios</button></a><!--';
		}
							
		$header = $header.'--><a href=".html"><button class="Basic Menu" name="credits.php">Créditos</button></a>
						</td>
					</tr>
				</table>
			</div>';
						
		return $header;
	}
	
	function newAlbumForm() {
		return '<div class="GeneralDisplay">
					<form class="Fancy" enctype="multipart/form-data" onSubmit="" action="./business_logic/newAlbum_bl.php" method="post" name="newAlbum" > 
					<fieldset>
						<legend>Crear Álbum</legend>
						<label>Los campos marcados con (*) son obligatorios.</label><br/><br/>
						
						<label>(*) Nombre del Álbum:</label> &emsp; <input type="text" name="albumName" onBlur = ""> 
						<br/><br/>					
						<label>(*) Acceso:</label> &emsp; <select name="access" onBlur="checkAccess()">
																<option value="private" selected>Privado</option>
																<option value="limited">Acceso Limitado (Sólo usuarios registrados)</option>
																<option value="public">Público</option>
															</select>
						<br/><br/>
						<hr/>	
						<br/>					
						
						<span> Portada: </span>
						<br/><br/>
						<input type="file" name="albumCover" id="albumCover" onChange="loadFile(event)">
						<br/><br/>
						<img id="output" align="center" width="150px" height="auto"/></br>
							<script>
							  var loadFile = function(event) {
								var output = document.getElementById("output");
								output.src = URL.createObjectURL(event.target.files[0]);
							  };
							</script>
						<br/><br/>
					</fieldset>
					<br/>
					<div style="text-align: center;">
						<input type="submit" class="Basic Fancy" value="Crear nuevo álbum" name="submit" >
					</div>
				</form>    
				</div>';
		
	}
	
	function newPhotoForm($album) {
		return '<div class="GeneralDisplay">
				<form class="Fancy" enctype="multipart/form-data" onSubmit="" action="./business_logic/newPhoto_bl.php" method="post" name="newPhoto" > 
					<fieldset>
						<legend>Subir Foto</legend>
						<label>Los campos marcados con (*) son obligatorios.</label><br/><br/>			
						<input type="hidden" name="albumName" value="'.$album.'"/>					
						<span> (*) Foto: </span>
						<br/><br/>
						<input type="file" name="image" id="image" onChange="loadFile(event)">
						<br/><br/>
						<img id="output" align="center" width="150px" height="auto"/></br>
							<script>
							  var loadFile = function(event) {
								var output = document.getElementById("output");
								output.src = URL.createObjectURL(event.target.files[0]);
							  };
							</script>
						<br/><br/>
					</fieldset>
					<br/>
					<div style="text-align: center;">
						<input type="submit" class="Basic Fancy" value="Subir Foto" name="submit" >
					</div>
				</form>      
			</div>';
		
	}
?>