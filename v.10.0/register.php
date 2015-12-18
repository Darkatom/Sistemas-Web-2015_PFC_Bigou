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
		<script language="JavaScript" src="./business_logic/ajax_bl.js"></script>
		<script language="JavaScript" type="text/javascript" src="./business_logic/lib/jquery-1.11.3.min.js"></script>
		
		<script>
			function validateForm() {
				if (checkEmail() && comparePasswords())
					return true;
					
				return false;			
			}
			
			function checkNick() {
				var nick = document.getElementById('nick_form').value;
				
				if (nick.length < 3 || ! /^([_|-]?[a-zA-Z]*[_|-]?[0-9]*[_|-]?)+$/.test(nick) ) {
					$("#user_error").html("<h6>El nick debe contener al menos tres carácteres.</br>Sólo los carácteres especiales _ y - están aceptados, pero no más de uno seguido.<br/>El nick no puede contener espacios.</h6>");
					$("#user_error").attr("class", "Error");
					return false;
				}
				$("#user_error").html("<h6>&#10004;</h6>");
				$("#user_error").attr("class", "Correct");
				
				isNick(nick);			
			}
			
			function checkEmail() {
				var email = document.getElementById('email_form').value;
				if (! /^[a-zA-Z]+([a-zA-Z]*[.|_|-]?[0-9]*)*@[a-zA-Z]+\.[a-zA-Z]+\.?[a-zA-Z]?$/.test(email) ) {	
						$("#email_error").html("<h6>Introduzca un e-mail correcto.</h6>");
						$("#email_error").attr("class", "Error");
						return false;
					}
					
				$("#email_error").html("<h6>&#10004;</h6>");
				$("#email_error").attr("class", "Correct");
				
				isEmail(email);
				
				return true;			
			}
			
			function checkPassword() {	
				var password = document.getElementById('password_form').value;
			
				if (password.length < 6) {
					$("#password_error").html("<h6>La contraseña debe contener al menos seis carácteres.</h6>");
					$("#password_error").attr("class", "Error");
					return false;
				}
				$("#password_error").html("<h6>&#10004;</h6>");
				$("#password_error").attr("class", "Correct");
				
				//validatePassword(password);
				
				return true;
			
			}
			
			function comparePasswords() {
				var newPassword = document.getElementById('password_form').value;
				var repeatPassword = document.getElementById('repeatPassword_form').value;
			
				if (newPassword != repeatPassword) {
					$("#repeat_error").html("<h6>Las contraseñas deben coincidir.</h6>");
					$("#repeat_error").attr("class", "Error");
					return false;
				} 
				
				$("#repeat_error").html("<h6>&#10004;</h6>");
				$("#repeat_error").attr("class", "Correct");
			
				return true;
			}
		
		
		</script>		

	</head>  
	<body>
		<div class="Canvas">
			<?php echo menuHeader(false, "", ""); ?>	
			<div class="GeneralDisplay">
				<form class="Fancy" id="register" name="register" enctype="multipart/form-data" onSubmit='return validateForm()' action="./business_logic/register_bl.php" method="post" >
					<fieldset>
						<legend>Registro</legend>
						<label>Los campos marcados con (*) son obligatorios.</label><br/><br/>
						<!-- &emsp; y &nbsp; son un char especial que nos permite poner espacios extra, como si fuera una tabulación -->
						
						
						<label>(*) Usuario:</label><div class="" id="user_error"></div>
						<br/>
						<input type="text" id="nick_form" name="nick_form" onBlur = "checkNick()"/>
						<br/><br/>		
						<label>(*) Email:</label><div class="" id="email_error"></div>
						<br/>
						<input type="text" id="email_form" name="email_form" onBlur = "checkEmail()"/>
						<br/>
						

						
						<br/><br/>
						
						<label>(*) Contraseña:</label><div class="" id="password_error"></div>
						<br/>
						<input type="password" id="password_form" name="password_form" onBlur = "checkPassword()"/>
						<br/><br/>
						<label>(*) Repita la contraseña:</label><div class="" id="repeat_error"></div>
						<br/>				
						<input type="password" id="repeatPassword_form" name="repeatPassword_form" onBlur = "comparePasswords()"/>
						
						<br/><br/>
						<hr/>	
						<br/>					
						<label>Nombre:</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;<label>Apellido(s):</label>
						<br/>
						<input type="text" name="name"/>&emsp;&emsp;<input type="text" name="surname"/>
						
						<br/><br/>
											
						<label>Edad:</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp; <label>Género:</label>
						<br/>
						<input type="number" name="age" min="1" max="150" value="18"/>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
						<select name="gender">
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
		</div>			
    </body>
</html>
