<?php
session_start(); // Iniciar sesión para acceder a $_SESSION

// Verificar si se ha iniciado sesión
if (!isset($_SESSION['correo'])) { // Cambiar 'correoL' por 'correo'
    header('Location: SesionRegistro.php'); // Redirigir a la página de inicio de sesión si no se ha iniciado sesión
    exit();
}

// Establecer conexión a la base de datos
$conexion = new mysqli("localhost", "root", "i27bg2hhV_", "midgard");

// Verificar si la conexión fue exitosa
if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}

// Obtener el correo del usuario desde la sesión
$correo = $_SESSION['correo'];

// Consulta SQL para obtener la imagen del usuario
$sql = "SELECT img FROM usuario WHERE Correo='$correo'";

// Ejecutar la consulta
$resultado = $conexion->query($sql);

if ($resultado && $resultado->num_rows > 0) {
    // Obtener la fila de resultado
    $fila = $resultado->fetch_assoc();
    
    // Obtener la imagen en formato BLOB
    $imagen_blob = $fila['img'];
    
    // Convertir la imagen BLOB a base64
    $imagen_base64 = base64_encode($imagen_blob);
} else {
    $imagen_base64 = ""; // Si no se encuentra la imagen, asignar una cadena vacía
}

// Cerrar conexión
$conexion->close();
?>
