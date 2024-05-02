<?php
session_start(); // Iniciar sesión para acceder a $_SESSION

// Verificar si se ha iniciado sesión
if (!isset($_SESSION['correoL'])) {
    header('Location: loginyregis.php'); // Redirigir a la página de inicio de sesión si no se ha iniciado sesión
    exit();
}

// Establecer conexión a la base de datos
$conexion = new mysqli("localhost", "root", "Coreanosexi1.", "midgard");

// Verificar si la conexión fue exitosa
if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}

// Obtener el correo del usuario desde la sesión
$correo = $_SESSION['correo'];

// Consulta SQL para obtener la imagen del usuario
$sql = "SELECT imagen FROM usuario WHERE Correo='$correo'";

// Ejecutar la consulta
$resultado = $conexion->query($sql);

if ($resultado && $resultado->num_rows > 0) {
    // Obtener la fila de resultado
    $fila = $resultado->fetch_assoc();
    
    // Obtener la imagen en formato BLOB
    $imagen_blob = $fila['imagen'];
    
    // Convertir la imagen BLOB a base64
    $imagen_base64 = base64_encode($imagen_blob);
} else {
    $imagen_base64 = ""; // Si no se encuentra la imagen, asignar una cadena vacía
}

// Cerrar conexión
$conexion->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
</head>
<body>
    <h1>Bienvenido</h1>
    <p style="font-size:15px">Correo electrónico: <?php echo $correo; ?>.</p>
    <?php if (!empty($imagen_base64)): ?>
        <img src="data:imagen/jpeg;base64,<?php echo $imagen_base64; ?>" alt="Imagen de perfil">
    <?php else: ?>
        <p>No se encontró la imagen del usuario.</p>
    <?php endif; ?>
    <a href="sesion.php">Cerrar sesión</a>
</body>
</html>