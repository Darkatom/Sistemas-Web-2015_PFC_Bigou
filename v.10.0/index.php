<?php
	include './business_logic/functions/menu_logic.php';
	session_start();
	$nick = $_SESSION['nick'];
	$message = $_GET['message'];
	
	if (!isset($message) or $message == 200)
		header("Location: main.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Bigou</title>       
        <link href="style/bigou_style.css" rel="stylesheet" type="text/css" />
        <script language="JavaScript" src="./business_logic/ajax_bl.js"></script>
		<script language="JavaScript" type="text/javascript" src="./business_logic/lib/jquery-1.11.3.min.js"></script>
	</head>  
	<body>
		<div class="Canvas">
			<?php echo menuHeader(isset($_SESSION['nick']), $_SESSION['nick'], $_SESSION['role']); ?>
			<div id="display" class="Display">
				<?php
					switch($message) {
						case 101:	// 100 - Register
							echo "<h2>Se ha registrado correctamente.<br/>Un administrador se encargará de validar su cuenta pronto.</h2>";
							break;
						case 102:
							echo "<h2>Las contraseñas no coincidían.<br/>No se ha podido registrar en Bigou©.</h2>";
							break;
						case 103:
							echo "<h2>El nick elegido no era válido.<br/>No se ha podido registrar en Bigou©.</h2>";
							break;
						case 104:
							echo "<h2>El e-mail proporcionado no era válido.<br/>No se ha podido registrar en Bigou©.</h2>";
							break;
						case 105:
							echo "<h2>Uno o varios de los campos no han sido correctamente rellenados.<br/>No se ha podido registrar en Bigou©.</h2>";
							break;
						case 301:	// 300 - 
							echo "<h2></h2>";
							break;
						case 302:
							echo "<h2></h2>";
							break;	
						case 996:
							echo "<h2>El usuario o la contraseña son incorrectos.</h2>";
							break;
						case 997:
							echo "<h2>Ha superado el límite de intentos.<br/>Espere 30 minutos antes de volver a intentarlo.<br/>Puede disfrutar de nuestra web mientras tanto.</h2>";
							break;
						case 998:
							echo "<h2>Tu cuenta no ha sido activada por un administrador todavía.</h2>";
							break;
						case 999:
							echo "<h2>Lo sentimos. Un error del servidor ha impedido que podamos loggearle.<br/>Vuelva a intentarlo.</h2>";
							break;
						default:
							echo "<h2>".$message."</h2>";
							break;
					}				
				?>
			</div>    
			<br/><br/>   
		</div>
	</body>
</html>