<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', __DIR__ . '../imagenes/');

function incluirTemplate($nombre, $inicio = false) {
    include TEMPLATES_URL . "/{$nombre}.php";
}

function autenticarUsuario () : bool {
	session_start();
	
	if (!$_SESSION['login']) {
		header('Location: /bienesraices');
	} 
   	return true;
}

function formatear($element, $isExitable = false) {
	echo "<pre>";
	var_dump($element);
	echo "</pre>";
	if ($isExitable){
		exit;
	}
}