<?php
	include_once './business_logic/functions/database_logic.php';
	include './business_logic/functions/menu_logic.php';
	session_start();
	if (!isset($_SESSION['nick'])){
		$nick="Guest";
	}else{
		$nick = $_SESSION['nick'];
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Bigou - Usuarios Registrados</title>       
        <link href="style/bigou_style.css" rel="stylesheet" type="text/css" />
        <!--<link rel='stylesheet' type='text/css' media='only screen and (max-width: 480px)' href='estilos/smartphone.css'/>-->
	</head>  
    <body>
	<body>
		<div class="Canvas">
			<?php echo menuHeader(true, $nick, $_SESSION['role']); ?>
			<div class="GeneralDisplay">
				<?php
					if($nick=="Guest"){
						echo"<table>
								<tr>
									<td><p>Usuario<p></td>
									<td><p>Avatar<p></td>
								</tr>";
						$usersList = getUsers(); 
						foreach($usersList as $user ) {	
							$myUser=$user['nick'];
							$avatar=$user['avatar'];
							echo "<tr>
									<td>$myUser</td>
									<td><img src='$avatar' width=40px/></td>
								  </tr>";	
						}
						echo"</table>";
					}else{
						echo"<table align=center>
								<tr>
									<td><p>Usuario<p></td>
									<td><p>Avatar<p></td>
									<td><p>Perfil<p></td>
								</tr>";
						$usersList = getUsers(); 
						foreach($usersList as $user ) {	
							$myUser=$user['nick'];
							$avatar=$user['avatar'];
							echo "<tr>
									<td>$myUser</td>
									<td><img src='$avatar' width=40px/></td>
									<td><a href='otherProfile.php?nick=$myUser'>Ver Perfil</a></td>
								  </tr>";
						}
						echo"</table>";
					}
				?> 
			</div>    
			<br/><br/>   
		</div>
	</body>
</html>