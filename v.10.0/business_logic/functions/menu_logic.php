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
        $result = '<div class="Login">
					<h1>'.$nick.'</h1>
					<div id="loggedAvatar">';
					
		if (strlen ($avatarPath) > 0)
			$result = $result . '<img src="'.$avatarPath.'" width="100" height="auto"/>';
			
		$result = $result . '</div>
					<br/><br/>
					<a href="profile.php"><button class="Basic Fancy Login" name="profile">Mi perfil</button></a>
					<a href="business_logic/logout_bl.php"><button class="Basic Fancy Login" name="logout">Cerrar sesión</button></a>	
				</div>';
				
		return $result;
	}
	
	function menuHeader($logged, $nick, $role) {
		$header = '<div class="Header"> 
					<table class="Cabecera">
						<tr>
							<td class="Title">
								<img class="Logo" src="data/Logo_Bigou.png"/>
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
								<a href="main.php"><button class="Basic Menu" name="main">Inicio</button></a>';
		if ($logged) {
			if ($role=="partner"){
				$header = $header.'<a href="albums.php"><button class="Basic Menu" name="albums">Mis Álbumes</button></a>
								   <a href="index.php"><button class="Basic Menu" name="albums">Buscar</button></a>
								   <a href="users.php"><button class="Basic Menu" name="albums">Usuarios</button></a>';

			}else{
				$header = $header.'<a href="albums.php"><button class="Basic Menu" name="albums">Administrar Álbumes</button></a>
								   <a href="users.php"><button class="Basic Menu" name="administrate_users">Administrar Usuarios</button></a>';
			}
		}
							
		$header = $header.'<a href="credits.php"><button class="Basic Menu" name="credits">Créditos</button></a>
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
	
	function profileTable($nick, $targetNick) {
		$selfProfile = (strcmp($nick, $targetNick) == 0);
		$role = getRole($targetNick);
		$avatar = getAvatar($targetNick);
		$lastConnection = getLastConnection($targetNick);
		$width = 150;
		$colspan = "";
		
		if ($selfProfile)
			$colspan = 'colspan="2"';
		
		$profile ='<table class="Fancy">
					  <tr>
						<td class="Header" width="'.$width.'"><h2>Avatar</h2></td>
						<td><div id="profileAvatar"><img src="'.$avatar.'" width="120px" height="auto"></div></td>';
		if ($selfProfile) {
			$profile = $profile.'
						<td>
							<h2>Cambiar Avatar</h2>
							<form id="ajaxAvatar" method="post" enctype="multipart/form-data">
								<input type="file" name="new_avatar" id="new_avatar" onChange="loadFile(event)">
							</form>
							<br/><br/>
							<img id="output" width="150px" height="auto"/></br>
							<br/><br/>
								<script>
									var loadFile = function(event) {
										var output = document.getElementById("output");
										output.src = URL.createObjectURL(event.target.files[0]);
									  };
								</script>
							<button class="Basic Fancy" onClick="changeAvatar()">Cambiar Avatar</button>
						</td>';
		}
		
		$profile = $profile.'
					  </tr>
					  <tr>
						<td class="Header"><h2>Rol</h2></td>
						<td ' . $colspan . '>'.$role.'</td>
					  </tr>
					  <tr>
						<td class="Header"><h2>Última Conexión</h2></td>
						<td ' . $colspan . '>'.$lastConnection.'</td>
					  </tr>';
					  
		if ($selfProfile) {
			$profile = $profile.'	
					  <tr>
						<td class="Header"><h2>Contraseña</h2></td>
						<td ' . $colspan . '>
							<label>Contraseña actual:</label>
							<input type="password" name="oldPassword" id="oldPassword">&emsp;&emsp;<div class="" id="old_error"></div>
							</br></br>
							<label>Nueva contraseña:</label>
							<input type="password" name="newPassword" id="newPassword">&emsp;&emsp;<div class="" id="new_error"></div>
							</br></br>
							<label>Repita la contraseña:</label>
							<input type="password" name="repeatPassword" id="repeatPassword" onBlur="checkPassword()">&emsp;&emsp;<div class="" id="repeat_error"></div>
							</br></br>
							<button class="Basic Fancy" onClick="uploadPassword()"> Cambiar Contraseña </button>
						</td>
					  </tr>';
			if (strcmp($role, 'partner') == 0)
				$profile = $profile.'<tr>
										<td class="Header"><h2>Borrar Cuenta</h2></td>
										<td ' . $colspan . '>
											<button class="Basic Fancy" onClick="makeDropRequest(\''.$nick.'\')">Pedir Baja</button>
										</td>
									  </tr>';
		}
		
		$profile = $profile.'</table>
				<br>';	

		return $profile;
	}
?>