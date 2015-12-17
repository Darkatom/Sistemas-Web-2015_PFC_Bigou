<?php
	include_once './business_logic/functions/database_logic.php';
	include './business_logic/functions/menu_logic.php';
	session_start();
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
			<?php echo menuHeader(isset($_SESSION['nick']), $_SESSION['nick'], $_SESSION['role']); ?>
			<div class="GeneralDisplay">
				<?php
					echo"<table class='Fancy' align=center>
							<tr class='Header'>
								<td><p>Avatar<p></td>
								<td><p>Usuario<p></td>
								<td><p>Perfil<p></td>
								<td><p>Álbumes<p></td>
							</tr>";
					$usersList = getAllUsers(); 
					foreach($usersList as $user ) {	
						$nick = $user['nick'];
						$avatar = $user['avatar'];
						echo "<tr>
								<td class='Avatar'><img src='$avatar' width=40px/></td>
								<td>$nick</td>
								<td><a href='profile.php?nick=$nick'><button class='Basic Fancy Login' name='profile'>Ver Perfil</button></a></td>
								<td><a href='albums.php?nick=$nick'><button class='Basic Fancy Login' name='profile'>Ver Álbumes</button></a></td>
							  </tr>";
					}
					echo"</table>";
					
				?> 
			</div>    
			<br/><br/>   
		</div>
	</body>
</html>