<?php
	require '../../includes/funciones.php';
	$auth = autenticarUsuario();
	if (!$auth) header('Location: /bienesraices');

    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h1>Titulo Página</h1>
    </main>

<?php
    incluirTemplate('footer');
?>
