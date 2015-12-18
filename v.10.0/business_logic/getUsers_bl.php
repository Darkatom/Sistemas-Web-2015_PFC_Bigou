<?php
	include_once './functions/database_logic.php';
	include_once './functions/user_logic.php';
	
	session_start();
	
	$ip = get_client_ip();
	$nick = $_SESSION['nick']; 
	$email = $_SESSION['email']; 
	$role = getRole($nick);

	if (isset($_GET['accepted'])) {
		$accepted = $_GET['accepted'];
		
		if (strcmp($accepted, "no") == 0) {
			if (isset($nick)) {
				if ($role=="admin"){
					$noAceptados = getUsers($accepted); 
					if (!(is_null($noAceptados))){
						echo"<table class='Fancy' align=center>
									<tr class='Header'>
										<td><p>Usuario</p></td>
										<td><p>Aceptado</p></td>
										<td><p>Petición de Baja</p></td>
										<td><p>Validar</p></td>
									</tr>";
							foreach($noAceptados as $user ) {	
								$myUser=$user['nick'];
								$accepted=$user['accepted'];
								$dropReq=$user['dropRequest'];
								echo "<tr>
										<td>$myUser</td>
										<td><p>$accepted</p></td>
										<td><p>$dropReq</p></td>
										<td><button class='Basic Fancy' name='aceptar' onClick='accept(\"$myUser\");'>&#10003</button></a></td>
									  </tr>";
							}
							echo"</table>";
					}else{
						echo("No hay usuarios pendientes de aceptación.");
					}
				}
			}
		}
	}
?> 
