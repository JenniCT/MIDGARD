<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Iniciar sesión solo si no está activa
}

// Verificar si se ha iniciado sesión
if (!isset($_SESSION['correo'])) { 
    header('Location: ../Vista/SesionRegistro.php');
    exit();
}

// Establecer conexión a la base de datos
$config = require __DIR__ . '/../config.php';
$conexion = new mysqli($config['servername'], $config['username'], $config['password'], $config['database']);

// Verificar si la conexión fue exitosa
if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}

// Obtener el correo del usuario desde la sesión
$correo = $_SESSION['correo'];
$idUsuario = $_SESSION['idUsuario'];

// Consulta SQL para obtener la imagen y el tipo del usuario
$sql_imagen = "SELECT imagen FROM Usuario WHERE Correo='$correo'";
$sql_tipo = "SELECT tipo FROM Usuario WHERE Correo='$correo'";

// Ejecutar la consulta para obtener la imagen
$resultado_imagen = $conexion->query($sql_imagen);

// Ejecutar la consulta para obtener el tipo de usuario
$resultado_tipo = $conexion->query($sql_tipo);

// Verificar si se obtuvo algún resultado para la imagen
if ($resultado_imagen && $resultado_imagen->num_rows > 0) {
    // Obtener la fila de resultado para la imagen
    $fila_imagen = $resultado_imagen->fetch_assoc();
    // Obtener la imagen en formato BLOB
    $imagen_blob = $fila_imagen['imagen'];
    // Verificar si la imagen está presente antes de codificarla en base64
    if ($imagen_blob !== null) {
        $imagen_base64 = base64_encode($imagen_blob);
    } else {
        $imagen_base64 = ""; // Si no se encuentra la imagen, asignar una cadena vacía
    }
} else {
    $imagen_base64 = ""; // Si no se encuentra la imagen, asignar una cadena vacía
}

// Verificar si se obtuvo algún resultado para el tipo de usuario
if ($resultado_tipo && $resultado_tipo->num_rows > 0) {
    // Obtener la fila de resultado para el tipo de usuario
    $fila_tipo = $resultado_tipo->fetch_assoc();
    // Obtener el tipo de usuario de la fila
    $tipo_usuario = $fila_tipo['tipo'];
    
    // Comparar el tipo de usuario y redirigir según corresponda
    if ($tipo_usuario == 1) {
        include '../Vista/layout/headerV.php';
    } elseif ($tipo_usuario == 2) {
        include '../Vista/layout/headerC.php';
    }
    else{
        include '../Vista/layout/headerA.php';
    }
} else {
    // Si no se encontró ningún usuario con el correo proporcionado, redirigir a la página de inicio de sesión
    header('Location: ../Vista/layout/header_offline.php');
    exit();
}

// Cerrar conexión
$conexion->close();
?>
