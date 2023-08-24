<?php 
	if(!isset($_SESSION)) {
		session_start();
	}
	
	$auth = $_SESSION['login'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes raices</title>
    <link rel="stylesheet" href="/bienesraices/build/css/app.css">
</head>
<body>
    <header class="header <?php echo $inicio ? 'inicio' : '' ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/bienesraices/index.php">
                    <img src="/bienesraices/build/img/logo.svg" alt="Logotipo de la pagina"> <!-- .svg es un formato de imagenes muy ligero y soportado -->
                </a>

                <div class="mobile-menu">
                    <img src="/bienesraices/build/img/barras.svg" alt="">
                </div>

                <div class="derecha">
                    <img src="/bienesraices/build/img/dark-mode.svg" class="dark-mode-boton">

                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>
						<?php if($auth): ?>
							<a href="cerrar-sesion.php">Cerrar sesión</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div>
            <?php if($inicio): ?>
                <h1>Venta de Casas y Apartamentos Exclusivos de lujo</h1>
            <?php endif; ?>
        </div> <!-- .barra -->
    </header>
