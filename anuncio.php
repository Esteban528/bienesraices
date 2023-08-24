<?php 
	require 'includes/funciones.php';
	incluirTemplate("header");
		$id = $_GET['id'];
		$id = filter_var($id, FILTER_VALIDATE_INT);
	if ($id) {
		// Conectar a la base de datos
		require 'includes/config/database.php';
		$db = conectarDB();

		// Consultar
		$query = "SELECT * FROM propiedades WHERE id={$id}";

		// Obtener resultados
		$resultado = mysqli_query($db, $query);
		if ($resultado->num_rows === 0) {
			header('Location: /bienesraices');
		}
		$propiedad = mysqli_fetch_assoc($resultado);

	}else {
		header('Location: /bienesraices');
	}
?>

    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad['titulo']; ?></h1>

		<img loading="lazy" src="<?php echo 'imagenes/'.$propiedad['imagen']; ?>" alt="Imagen de la propiedad">

        <div class="resumen-propiedad">
		<p class="precio"><?echo $propiedad['precio'];?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" src="build/img/icono_wc.svg" alt="icono baño" loading="lazy">
                    <p><?php echo $propiedad['wc']; ?></p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" loading="lazy">
                    <p><?php echo $propiedad['estacionamiento']; ?></p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono habitaciones" loading="lazy">
                    <p><?php echo $propiedad['habitaciones']; ?></p>
                </li>
            </ul>
			<p><?php echo $propiedad['descripcion']; ?> </p>
        </div>
    </main>
<?php 
	mysqli_close($db);
	incluirTemplate("footer");
?>
