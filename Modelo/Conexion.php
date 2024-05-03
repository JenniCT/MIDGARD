<?php
    $config = require __DIR__ . '/../config.php';
    $conexion = new mysqli($config['servername'], $config['username'], $config['password'], $config['database']);
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }
    
?>