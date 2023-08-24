<?php 
	//Conexion db
	require 'includes/config/database.php';
	$db = conectarDB();

	//Autenticar el formulario

	$errores = [];

	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		/* echo '<pre>'; */
		/* var_dump($_POST); */
		/* echo '</pre>'; */

		$email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if(!$email) {
			$errores[] = "El email es obligatorio o no es válido";
		} 
		if (!$password) {
			$errores[] = "El password es obligatorio";
		}
		

		if(empty($errores)) {
			//Revisar si el usuario existe.
			$query = "SELECT * FROM usuarios WHERE email = '{$email}'";

			$resultado = mysqli_query($db, $query);

			if ($resultado -> num_rows) {
				//Revisar si el password es correcto	
				$usuario = mysqli_fetch_assoc($resultado);

				//Verificar si el password es igual
				$auth = password_verify($password, $usuario['password']);

				if ($auth) {
				// El usuario aesta autenticado
					session_start();

					// Llenar el array de la sesion

					$_SESSION['usuario'] = $usuario['email'];
					$_SESSION['login'] = true;

					header('Location: /bienesraices/admin/index.php');
					/* echo '<pre>'; */
					/* var_dump($_SESSION); */
					/* echo '</pre>'; */
				} else {
					$errores[] = "La contraseña es incorrecta.";
				}
			}else {
				$errores[] = "El usuario no existe";
			}
		}
	}

	//Header
	require 'includes/funciones.php';
	incluirTemplate("header");
?>
    <main class="contenedor seccion">
		<h1>Iniciar Sesión</h1> 
		<?php foreach ($errores as $error): ?>
			<div class="alerta error">
				<?php echo $error; ?>
			</div>
		<?php endforeach; ?>
		<form method="POST" class="formulario contenido-centrado">
			<fieldset>
                <legend>Email y password</legend>

                <label for="email">Correo Electrónico</label>
                <input type="email" name="email" placeholder="Tu Email" id="email" required>
                
                <label for="password">Contraseña</label>
                <input type="password" name="password" placeholder="Tu Contraseña" id="password" required>

                </textarea>
            </fieldset>

		<input type="submit" value="Iniciar sesión" class="boton boton-verde">	
		</form>
    </main>

<? incluirTemplate("footer") ?>
