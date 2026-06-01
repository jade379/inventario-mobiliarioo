<?php
$servidor = "localhost";
$usuario = "root";
$clave = ""; // Déjalo vacío, por defecto no tiene contraseña
$base = "mobiliario_aula"; // Nombre EXACTO de tu base de datos

$conexion = mysqli_connect($servidor, $usuario, $clave, $base);

// Verificar conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>