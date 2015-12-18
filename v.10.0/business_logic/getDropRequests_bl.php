<?php
	include_once './functions/database_logic.php';
	include_once './functions/user_logic.php';
	
	session_start();
	
	$ip = get_client_ip();
	$nick = $_SESSION['nick']; 
	$email = $_SESSION['email']; 
	$role = getRole($nick);

	if (isset($_GET['request'])) {
		$request = $_GET['request'];
		
		if (strcmp($request, "yes") == 0) {
			if (isset($nick)) {
				if ($role=="admin"){
					$dropRequest = getDropRequested($request); 
					if (!(is_null($dropRequest))){
						echo"<table align=center>
									<tr>
										<td><p>Usuario</p></td>
										<td><p>Aceptado</p></td>
										<td><p>Petición de Baja</p></td>
										<td><p>Validar</p></td>
									</tr>";
							foreach($dropRequest as $user ) {	
								$myUser=$user['nick'];
								$request=$user['request'];
								$dropReq=$user['dropRequest'];
								echo "<tr>
										<td>$myUser</td>
										<td><p>$request</p></td>
										<td><p>$dropReq</p></td>
										<td><button class='Basic Fancy' name='aceptar' onClick='dropUser(\"$myUser\");'>&#10008</button></a></td>
									  </tr>";
							}
							echo"</table>";
					}else{
						echo("No hay usuarios pendientes para dar de baja.");
					}
				}
			}
		}
	}
?> 

