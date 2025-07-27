<?php

// CONEXIÓN A MYSQL - SCRIPT

$host = 'localhost';
$usuario = 'root';
$contrasena = '';
$bd = 'AGENCIA';

$conexion = new mysqli($host, $usuario, $contrasena, $bd, 3307);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// CHARSET
$conexion->set_charset("utf8");

?>
