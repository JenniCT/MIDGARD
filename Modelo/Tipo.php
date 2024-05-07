<?php
session_start();
// Verificar si se ha iniciado sesión
if (!isset($_SESSION['correo'])) {
    include '../Vista/layout/header_offline.php';
    
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
$Correo = $_SESSION['Correo'];

// Consulta SQL para obtener el valor de tipo
$sql = "SELECT tipo FROM Usuario WHERE Correo='$Correo'";
$resultado = $conexion->query($sql);

// Verificar si se obtuvo algún resultado
if ($resultado->num_rows > 0) {
    // Obtener la fila de resultado
    $fila = $resultado->fetch_assoc();
    
    // Obtener el tipo de usuario de la fila
    $tipo_usuario = $fila['tipo'];
    
    // Comparar el tipo de usuario y redirigir según corresponda
    if ($tipo_usuario == 1) {
       include '../Vista/layout/header_Vendedor.php';
    } else {
        // Redirigir a la página de inicio de sesión para otros tipos de usuarios
        include '../Vista/layout/header_Comprador.php';
    }
} else {
    // Si no se encontró ningún usuario con el correo proporcionado, redirigir a la página de inicio de sesión
    header('Location: ../Vista/layout/header_offline.php');
    exit();
}



?>
