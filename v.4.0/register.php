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
		<div class="Canvas">
			<?php echo menuHeader(false, "", ""); ?>	
			<form class="Fancy" name="register" enctype="multipart/form-data" onSubmit='' action="./business_logic/register_bl.php" method="post" >
				<fieldset>
					<legend>Registro</legend>
					<label>Los campos marcados con (*) son obligatorios.</label><br/><br/>
					<!-- &emsp; y &nbsp; son un char especial que nos permite poner espacios extra, como si fuera una tabulación -->
					
					<label>(*) Usuario:</label> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;<label>(*) Email:</label> 
					<br/>
					<input type="text" name="nick" onBlur = "checkNick()">&emsp;&emsp;<input type="text" name="email" onBlur = "checkEmail()"> 
					
					<br/><br/>
					
					<label>(*) Contraseña:</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;<label>(*) Repita la contraseña:</label> 
					<br/>				
					<input type="password" name="password" onBlur = "checkPassword()">&emsp;&emsp;<input type="password" name="repeatPassword" onBlur = "comparePasswords()">
					
					<br/><br/>
					<hr/>	
					<br/>					
					<label>Nombre:</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;<label>Apellido(s):</label>
					<br/>
					<input type="text" name="name">&emsp;&emsp;<input type="text" name="surname">
					
					<br/><br/>
										
					<label>Edad:</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp; <label>Género:</label>
					<br/>
					<input type="number" name="age" min="1" max="150" value="18">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
																				<select name="gender" onBlur="checkGender()">
																					<option value="null" selected>No especificar</option>
																					<option value="male">Hombre</option>
																					<option value="female">Mujer</option>
																				</select>
					<br/><br/>
					<hr/>		
					<br/>
		
					<span>Avatar:</span>
					<br/><br/>
					<input type="file" name="avatar" id="avatar" onChange="loadFile(event)">
					<br/><br/>
					<img id="output" align="center" width="150px" height="auto"/></br>
						<script>
						  var loadFile = function(event) {
							var output = document.getElementById('output');
							output.src = URL.createObjectURL(event.target.files[0]);
						  };
						</script>
					<br/><br/>
				</fieldset>
				<br/>
				<div style="text-align: center;">
					<input type="submit" class="Basic Fancy" value="Registrar" name="submit" >
				</div>
			</form>
			<br/><br/>
		</div>			
    </body>
</html>
