<?php
session_start();
$config = require __DIR__ . '/../config.php';
$conexion = new mysqli($config['servername'], $config['username'], $config['password'], $config['database']);

// Verificar si el formulario se envió y las variables están seteadas
if(isset($_POST['correoL'], $_POST['contrasenaL'])){
    $vcorreo = $_POST['correoL'];
    $vcontrasena = $_POST['contrasenaL'];

    // Consulta preparada para evitar inyección de SQL
    $sql = "SELECT Correo, Contrasena FROM Usuario WHERE Correo = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $vcorreo);
    $stmt->execute();
    $stmt->store_result();

    if($stmt->num_rows > 0){
        $stmt->bind_result($correo, $contrasena);
        $stmt->fetch();

        // Verificar si la contraseña coincide utilizando password_verify()
        if(password_verify($vcontrasena, $contrasena)){
            // Contraseña correcta
            $_SESSION['correo'] = $correo;
            // Redireccionar
            header("Location: index.php");
            exit();
        } else {
            // Contraseña incorrecta
            $_SESSION['message'] = 'Contraseña incorrecta';
            header("Location: SesionRegistro.php");
            exit();
        }
    } else {
        // No se encontró ningún registro con el correo proporcionado
        $_SESSION['message'] = 'Correo no registrado';
        header("Location: SesionRegistro.php");
        exit();
    }
}


?>


