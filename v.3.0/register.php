<?php
	include './business_logic/functions/menu_logic.php';
	session_start();
	
	if (isset($_SESSION['nick']))
		header("Location: main.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Bigou - Registro</title>      
        <link href="style/bigou_style.css" rel="stylesheet" type="text/css" />
        <!--<link rel='stylesheet' type='text/css' media='only screen and (max-width: 480px)' href='estilos/smartphone.css'/>-->
	</head>  
	<body>
		<div class="canvas">
			<?php echo menuHeader(false, "", ""); ?>	
		
			<p> Los campos marcados con (*) son obligatorios.</p><br/>
			<form enctype="multipart/form-data" onSubmit='' action="./business_logic/register_bl.php" method="post" name="register" > 
				(*) Usuario:<br/>
				<input type="text" name="nick" onBlur = "checkNick()"> 
				<br/><br/>
				
				(*) E-mail:<br/>
				<input type="text" name="email" onBlur = "checkEmail()"> 
				<br/><br/>
				
				(*) Contraseña:<br/>
				<input type="password" name="password" onBlur = "checkPassword()">
				<br/><br/>
				
				(*) Repita la contraseña:<br/>
				<input type="password" name="repeatPassword" onBlur = "comparePasswords()">
				<br/><br/>
				
				Nombre:<br/>
				<input type="text" name="name"> 
				<br/><br/>
				
				Apellido:<br/>
				<input type="text" name="surname">
				<br/><br/>
				
				Edad:<br/>
				<input type="number" name="age" min="1" max="150" value="18">
				<br/><br/>
				
				Género: <br/>
				<select name="gender" onBlur="checkGender()">
					<option value="null" selected>No especificar</option>
					<option value="male">Hombre</option>
					<option value="female">Mujer</option>
				</select><br/><br/>
						   
				<!-- Subida del archivo -->
				Avatar:
				<input type="file" name="avatar" id="avatar" onChange="loadFile(event)"></br>
				<p>Vista previa de la imagen:</p>
				<img id="output" width="150px" height="auto"/></br>
					<script>
					  var loadFile = function(event) {
						var output = document.getElementById('output');
						output.src = URL.createObjectURL(event.target.files[0]);
					  };
					</script>
				<br/>
				<input type="submit" value="Registrar" name="submit" >
			</form>   
		</div>			
    </body>
</html>
