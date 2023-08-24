 <?php 
require '../../includes/funciones.php';
	$auth = autenticarUsuario();
	if (!$auth) header('Location: /bienesraices');

    require '../../includes/config/database.php';
    $db = conectarDB();

    // Consultar para obetener valores de la base de datos
    
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta); 

    // Arreglo con mensajes de errores
    $errores = [];

    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones = '';
    $wc = '';
    $estacionamiento = '';
    $vendedor = '';
    $imagen = '';

    // Ejecutar el codigo despues de que el usuario envia el formuario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        /*echo '<pre>';
        var_dump($_POST);
        var_dump($_FILES);
        echo '</pre>'; */

        $titulo = mysqli_real_escape_string($db, $_POST['titulo'] );
        $precio = mysqli_real_escape_string($db, $_POST['precio'] );
        $descripcion = mysqli_real_escape_string($db, $_POST['descripcion'] );
        $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones'] );
        $wc = mysqli_real_escape_string($db, $_POST['wc'] );
        $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento'] );
        $vendedor = mysqli_real_escape_string($db, $_POST['vendedor'] );
        $creado = mysqli_real_escape_string($db, date('Y/m/d') );

        // Asiganar files hacia una variable

        $imagen = $_FILES['imagen'];
#        var_dump($imagen);
        

        if (!$titulo) {
            $errores[] = "Debes añadir un titulo";
        }
        if (!$precio) {
            $errores[] = "Debes añadir un precio";
        }
        if (strlen($descripcion) < 50) {
            $errores[] = "Debes añadir una descripción y debe tener almenos 50 carácteres";
        }
        if (!$habitaciones) {
            $errores[] = "Debes añadir un número de habitaciones válido";
        }
        if (!$wc) {
            $errores[] = "Debes añadir un número de baños válido";
        }
        if (!$estacionamiento) {
            $errores[] = "Debes añadir un número de estacionamientos válido";
        }
        if (!$vendedor) {
            $errores[] = "Debes añadir un vendedor válido";
        }
        if (!$imagen || $imagen['error']) {
            $errores[] = "Debes añadir una imagen valida";
        }

        // Validar por tamaño
        $medida = 1000 * 1000; // Max 1mb

       if ($imagen['size'] > $medida) {
            $errores[] = "La imagen es demasiado pesada";
        }

        // Revisar que el arreglo de errores esté vacío
        if (empty($errores)) {
            /** Subida de archivos**/ 
            $carpetaImagenes = '../../imagenes';

            if (!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
                echo "Carpeta creada en ".$carpetaImagenes;
            }
            //Generar un nombre unico
            $imageName = md5(uniqid( rand(),true )).".jpg";

            // Subir la imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes."/".$imageName);

            // Insertar en la base de datos
            $query = " INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado,vendedores_id ) VALUES ( '$titulo', '$precio','$imageName', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado' ,'$vendedor' )";
            
            $resultado = mysqli_query($db, $query);

            if ($resultado) {
                header('Location: /bienesraices/admin?result=1');  
                exit;
            }
        }
    }

    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h1>Crear</h1>
        <a href="/bienesraices/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>
                                                                                                           <!--enctype= multipart/form-data --> 
        <form action="" class="formulario" method="POST" action="/bienesraices/admin/propiedades/crear.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value=<?php echo $titulo; ?> >

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value=<?php echo $precio; ?>>

                <label for="imagen">Imagen:</label>
                <input type="file" name="imagen" id="imagen"  accept="image/jpeg, image/png" value=<?php echo $imagen; ?>>

                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="10"><?php echo $descripcion; ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Información de la Propiedad</legend>
                <label for="habitaciones">Habitaciones:</label>
                <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9" value=<?php echo $habitaciones; ?>>

                <label for="wc">Baños:</label>
                <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9" value=<?php echo $wc; ?>>

                <label for="estacionamiento">Estacionamientos:</label>
                <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9" value=<?php echo $estacionamiento; ?>>
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>
                <select name="vendedor" value=<?php echo $vendedor; ?>>
                    <option value="">-- SELECCIONA UN VENDEDOR --</option>
                    <?php while ($row = mysqli_fetch_assoc($resultado)):  ?>
                        <option <?php echo $vendedor === $row['id'] ? 'selected' :''; ?> value="<?php echo $row['id'] ?>"> <?php echo $row['nombre'] . " " . $row['apellido']; ?>  </option>
                    <?php endwhile; ?>
                </select>
            </fieldset>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>

    </main>
    

<?php
    incluirTemplate('footer');
?>
