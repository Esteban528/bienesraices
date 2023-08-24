# BienesRaices - Sitio inmoboliario

## Pasos para ejecutar

###1. Cargar dependencias
```bash
npm install
```
###2. Compilar sass y ejecutar gulp
```bash
npx gulp
```
###3. Crear la base de datos
Debes ejecutar el `bienesraices_crud.sql`

###4. Crear los usuarios administradores con 
```php
<?php
// Importar la conexión
require 'includes/config/database.php';
$db = conectarDB();

//crear un email y password
$email = "correo@correo.com";
$password = "123456";

$passwordHash = password_hash($password, PASSWORD_BCRYPT);
//var_dump($passwordHash);

// Query para crear el usuario
$query = "INSERT INTO usuarios (email, password) VALUES ( '${email}', '${passwordHash}' )";

//echo $query;

//Agregarlo a la base de datos
mysqli_query($db, $query);
?>
```
### Inquietudes
Si hay problemas al cargar el sitio es probable que haya que editar el src y href en todos los formatos html. *Solo la ruta*