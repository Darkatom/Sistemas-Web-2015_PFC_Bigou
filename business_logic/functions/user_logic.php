<?php
	include_once 'database_logic.php';

	function newUser($ip, $nick, $password, $email, $name, $surname, $age, $gender) {
		if (strcmp($gender, 'female') != 0 and strcmp($gender, 'male') != 0)
				$gender = null;
	
		$hashedPassword = hash("sha256", $password, false);
		if (addUser($nick, $hashedPassword, $email, $name, $surname, $age, $gender)) {
			addAction($nick, $email, $ip, 'register');
			return true;
		}			
		
		return false;
	}
	
	function login($ip, $nick, $password) {
		/*$intentos = 0;
		if (isset($_COOKIE['intentos'])){ 
			$intentos = $_COOKIE['intentos'];
		}
				
		if ($intentos <= 3){*/
		
			$hashedPassword = hash("sha256", $password, false);
							
			if(checkNickPassword($nick,  $hashedPassword))
			{
				$_SESSION["nick"] = $nick;
				$_SESSION['role'] = getRole($email);
				$email = getEmail($email);
				
				//setcookie( 'intentos', 0, time() + 1800 ); //30 minutos
				
				newAction($nick, $email, $ip, 'logged_in'); 
				newConnection($nick, $email, $ip);
				
				return '0';	// Logged.
			} else { //if ($intentos < 3) {
				//setcookie( 'intentos', $intentos + 1, time() + 1800 ); //30 minutos
				
				return '1'; // Log in failed.
			}
		/*} 
		
		setcookie( 'intentos', 0, time() + 1800);
		return '2';	// Superado el límite de intentos.
		*/
	}
	
	function checkNickPassword($nick, $password) {		
		$truePassword = mysqli_fetch_array(getPassword($nick));
		
		if (strcmp($truePassword[0], $password) == 0)
			return true;
		
		return false;
	}
	
	function changePassword($nick, $newPassword) {	
		$hashedPassword = hash("sha256", $newPassword, false);		
		return setPassword($nick, $hashedPassword);
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
?>