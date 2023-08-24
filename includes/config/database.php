<?php

function conectarDB () : mysqli {
    $db = mysqli_connect('localhost', 'admin', 'admin', 'bienesraices_crud');

    if (!$db) {
        echo "Error al conectarse a la base de datos";
        exit;
    }
    return $db;
}
