<?php
	include './business_logic/functions/menu_logic.php';
	session_start();
	$nick = $_SESSION["nick"];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Bigou</title>
        <!--
		<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'/>
        <link href="estilos/personalizado.css" rel="stylesheet" type="text/css" />
        <link rel='stylesheet' type='text/css' media='only screen and (max-width: 480px)' href='estilos/smartphone.css' />
		-->
	</head>  
    <body>
		<?php echo notLogged(); ?>
    </body>
</html>