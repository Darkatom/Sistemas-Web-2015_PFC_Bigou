<?php
	function notLogged() {							
        return '<p>Hola, usuario anónimo</p>
		<form action="./business_logic/login_bl.php" method="post" name="login">
            <h1>Log in</h1>
            <ul>
                <li class="nick">
                    <input name="nick" type = "text" class = "login-input" />
                </li>
                <li class="password">
                    <input name="password" type = "password" class = "login-input" />
                </li>
            </ul>
            <input type = "submit" value = "Entrar" name = "Entrar"/>
        </form>
		<p><a href="changePassword.php">¡Ha olvidado la contraseña?</a></p>
		<p>¡Aún no tienes una cuenta? <a href="register.html">Regístrate</a>.</p>';
	}
?>