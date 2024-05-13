<?php
// Verificar si se ha enviado un ID válido por POST
if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];

    $config = require __DIR__ . '/../config.php';
    //Archivo de configuración para evitar la filtración de información

    $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['database']);
    $conn->set_charset("utf8");

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    

    // Asignar valores a las variables
    $idUsuario = $_POST["idUsuario"];
    $tipo = $_POST["tipo"];
    $Nombre = $_POST["Nombre"];
    $aPaterno = $_POST["aPaterno"];
    $aMaterno = $_POST["aMaterno"];
    $Correo = $_POST["Correo"];
    $Contrasena = $_POST["Contrasena"];
    $Telefono = $_POST["Telefono"];
    $FchNacimiento = $_POST["FchNacimiento"];
    $FechaRegistro = $_POST["FechaRegistro"];

    // Preparar la consulta para actualizar los datos de la propiedad
    $sql = "UPDATE Usuario SET idUsuario=?, tipo=?, Nombre=?, aPaterno=?, aMaterno=?, Correo=?, Contrasena=?, Telefono=?, FchNacimiento=?, FechaRegistro=? WHERE idUsuario=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisssssssss", $idUsuario, $tipo, $Nombre, $aPaterno, $aMaterno, $Correo, $Contrasena, $Telefono, $FchNacimiento, $FechaRegistro, $idUsuario);
    //SIS sissssssss

    // Ejecutar la consulta preparada
    if ($stmt->execute()) {
        // Redirigir a la página principal
        header("Location: ../Vista/admin.php");
        exit();
    } else {
        echo "Error al actualizar la propiedad: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "ID de Usuario no proporcionado";
}
?>
