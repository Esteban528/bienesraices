 <?php 
    require '../../includes/app.php';
    use App\Propiedad;
    Use Intervention\Image\ImageManagerStatic as Image;
    
	autenticarUsuario();
	
    $errores = [];
   
    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones = '';
    $wc = '';
    $estacionamiento = '';
    $vendedor = '';
    $imagen = '';

    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta); 

    // Ejecutar el codigo despues de que el usuario envia el formuario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $propiedad = new Propiedad($_POST); 

        //Generar un nombre unico
        $imageName = md5(uniqid( rand(),true )).".jpg";

        $imageTmp = $_FILES['imagen']['tmp_name'];
        if ($imageTmp) {
            //Resize a la imagen                                // Setear imagen
            $image = Image::make($imageTmp)->fit(800, 600);
            $propiedad->setImagen($imageName);

        }
        
        //Validar
        $errores = $propiedad->validar();
        
        // Revisar que el arreglo de errores esté vacío
        if (empty($errores)) {
                       
            if (!is_dir(CARPETA_IMAGENES)) {
                mkdir(CARPETA_IMAGENES);
            }

            //Guarda en el servidor
            $image->save(CARPETA_IMAGENES.$imageName);

            // Subir la imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes."/".$imageName); 
            
            $resultado = $propiedad -> guardar();

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
                <select name="vendedores_id" value=<?php echo $vendedor; ?>>
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
