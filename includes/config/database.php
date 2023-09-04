<?php

function conectarDB () : mysqli {
    $db = new mysqli('localhost', 'admin', 'admin', 'bienesraices_crud');

    if (!$db) {
        echo "Error al conectarse a la base de datos";
        exit;
    }
    return $db;
}
