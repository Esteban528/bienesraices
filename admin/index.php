<?php
	require '../includes/funciones.php';
	
	$auth = autenticarUsuario();
	if (!$auth) header('Location: /bienesraices');

   //importar la conexion
    require '../includes/config/database.php';
    $db = conectarDB();
	
    // Escribir el query
    $query = "SELECT * FROM propiedades";
    
    //  Consultar la DB
    $resultadoDB = mysqli_query($db, $query);
	
	// Mensaje condicional
    $mensajes = [
        'ERROR',
        'Propiedad agregada con éxito',
		'Propiedad actualizada con éxito',
		'Propiedad eliminada con éxito',
    ];
    $mensaje = '';
    $resultado = $_GET['result'] ?? null;
    if ($resultado) {
        $mensaje = $mensajes[$resultado];
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$id = $_POST['id'];
		var_dump($id);
		$id = filter_var($id, FILTER_VALIDATE_INT);
		if($id){
			// eliminar archivo
			$query = "SELECT imagen FROM propiedades WHERE id=${id}";
			$resultado = mysqli_query($db, $query);
			$propiedad = mysqli_fetch_assoc($resultado);

			unlink('../imagenes/'.$propiedad['imagen']);

			//eliminar propiedad
			$query = "DELETE FROM propiedades WHERE id=${id}";
			$resultado = mysqli_query($db, $query);

			if($resultado) {
				header('location: /bienesraices/admin?resultado=3');
			}
		}
	}

    // Importar el template
    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h1>Administrador de paǵinas</h1>
        <p class="alerta exito"> <?php echo $mensaje ?></p>
        <a href="/bienesraices/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
    </main>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>        <!--Mostrar los resultados-->
            <?php while( $propiedad = mysqli_fetch_assoc($resultadoDB)):  ?>
                <tr>
                    <td> <?php echo $propiedad['id']; ?> </td>
                    <td><?php echo $propiedad['titulo']; ?></td>
                    <td> <img src="/bienesraices/imagenes/<?php echo $propiedad['imagen']; ?>" class="imagen-tabla">  </td>
                    <td><?php echo $propiedad['precio']; ?></td>
                    <td> 
					<form method="POST" class="w-100">
					<input type="hidden" name="id" value="<?php echo $propiedad['id']; ?>">
                        <input type="submit" class="boton-rojo-block" value="Eliminar">
					</form>
                        <a href="/bienesraices/admin/propiedades/actualizar.php?id=<?php  echo $propiedad['id']; ?>" class="boton-amarillo-block">Actualizar</a>         
                    </td> 
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php
    //cerrar la conexion

    incluirTemplate('footer');
?>
