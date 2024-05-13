<?php

$config = require __DIR__ . '/../config.php';
//Archivo de configuración para evitar la filtración de información

$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['database']);
$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("Conexion Fallida". $conn->connect_error);
} else {
    echo" <br>";
}
