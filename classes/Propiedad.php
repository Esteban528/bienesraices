<?php

namespace App;

class Propiedad{
    // DB
    protected static $db; 
    protected static $columnasDB = [
        "id",
        "titulo",
        "precio",
        "imagen",
        "descripcion",
        "habitaciones",
        "wc",
        "estacionamiento",
        "creado",
        "vendedores_id",
    ]; 

    //Errores 
    protected static $errores = [];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedores_id;
    
    // definir lña conexion a la base de datos
    public static function setDB($database){
        self::$db = $database;
    }

    public function __construct($args = [])
    {
        $this -> id = $args['id'] ?? '';
        $this -> titulo = $args['titulo'] ?? '';
        $this -> precio = $args['precio'] ?? '';
        $this -> imagen = $args['imagen'] ?? '';
        $this -> descripcion = $args['descripcion'] ?? '';
        $this -> habitaciones = $args['habitaciones'] ?? '';
        $this -> wc = $args['wc'] ?? '';
        $this -> estacionamiento = $args['estacionamiento'] ?? '';
        $this -> creado = date('Y/m/d');
        $this -> vendedores_id = $args['vendedores_id'] ?? '';

        $this->validar();
    }

    public function guardar(){
        //Sanitizar los datos
        $atributos = $this->sanitizarDatos();

        $query = " INSERT INTO propiedades (";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES ( '";
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        $result = self::$db->query($query);
        return $result;

    }

    //Identificar los atributos de la base de datos
    public function atributos () {
        $atributos = [];
        foreach(self::$columnasDB as $columna){
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarDatos() {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }

        return $sanitizado;
    }
    
    public static function getErrores() {
        return self::$errores;
    }

    //Subida de archivos
    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function validar() {
        if (!$this->titulo) {
            self::$errores[] = "Debes añadir un titulo";
        }
        if (!$this->precio) {
            self::$errores[] = "Debes añadir un precio";
        }
        if (strlen($this->descripcion) < 50) {
            self::$errores[] = "Debes añadir una descripción y debe tener almenos 50 carácteres";
        }
        if (!$this->habitaciones) {
            self::$errores[] = "Debes añadir un número de habitaciones válido";
        }
        if (!$this->wc) {
            self::$errores[] = "Debes añadir un número de baños válido";
        }
        if (!$this->estacionamiento) {
            self::$errores[] = "Debes añadir un número de estacionamientos válido";
        }
        if (!$this->vendedores_id) {
            self::$errores[] = "Debes añadir un vendedor válido";
        }
        
        
        if (!$this->imagen) {
            self::$errores[] = "Debes añadir una imagen válida";
        }
        return self::$errores;
    }
}