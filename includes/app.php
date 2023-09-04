<?php

//Este archivo se usará como principal para usar funciones

require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

//Conectarnos a la DB
$db = conectarDB();

use App\Propiedad;
Propiedad::setDB($db);