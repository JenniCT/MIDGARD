<?php
session_start();

require_once("../Modelo/RegistroM.php");

class RegistroController {
    public static function registrarUsuario() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $config = require __DIR__ . '/../config.php';
            $conexion = new mysqli($config['servername'], $config['username'], $config['password'], $config['database']);

            // Verificamos si la conexión fue exitosa
            if($conexion->connect_error){
                die(json_encode(['success' => false, 'message' => 'La conexión falló: '. $conexion->connect_error]));
            }

            $nombre = $_POST['nombre'];
            $aPaterno = $_POST['aPaterno'];
            $aMaterno = $_POST['aMaterno'];
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];
            $telefono = $_POST['telefono'];
            $fechaNacimiento = $_POST['fechaNacimiento'];

            $registro = new Registro($conexion);
            $mensaje = $registro->registrarUsuario($nombre, $aPaterno, $aMaterno, $correo, $contrasena, $telefono, $fechaNacimiento);

            // Si el mensaje es de correo ya registrado, lo mostramos en la misma página
            if ($mensaje === "Ya existe un usuario con ese correo") {
                echo "<script>alert('".$mensaje."');</script>";
                echo "<script>window.location.href = '../Vista/SesionRegistro.php';</script>";
            } elseif (strpos($mensaje, 'Error') !== false) {
                // Si ocurre algún otro error, mostramos el mensaje de error en la misma página
                echo "<script>alert('".$mensaje."');</script>";
            } else {
                // Si el registro es exitoso, redirigimos a miinfo.php
                // header("Location: ../Vista/Miinfo.php");
                echo "<script>window.location.href = '../Vista/TipoUsuario.php';</script>";
                exit();
            }

            // Cerramos la conexión después de utilizarla
            $conexion->close();
        }
    }
}

// Llamamos a la función registrarUsuario del controlador RegistroController
RegistroController::registrarUsuario();
?>
