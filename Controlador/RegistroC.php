<?php
session_start();
require_once("../Modelo/RegistroM.php");
require_once("../Modelo/SesionM.php");

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

            $sesion = new Sesion($conexion); // Instancia un objeto de la clase Sesion
            $existeCorreo = $sesion->existeCorreo($correo); // Llama al método existeCorreo()

            if ($existeCorreo) {
                // Si el correo ya existe, redireccionar a la página de inicio de sesión
                echo "<script>alert('Ya existe un usuario con ese correo');</script>";
                header("Location: ../Vista/SesionRegistro.php");
                exit();
            } else {
                // Si el correo no existe, continuar con el registro
                $registro = new Registro($conexion); // Instancia un objeto de la clase Registro
                $mensaje = $registro->registrarUsuario($nombre, $aPaterno, $aMaterno, $correo, $contrasena, $telefono, $fechaNacimiento);
                
                // Redireccionar según el mensaje del registro
                if ($mensaje === "Usuario agregado correctamente.") {
                    session_start();
                    // Guardamos el correo del usuario en la sesión
                    $_SESSION['correo'] = $correo;
                    
                    header("Location: ../Vista/TipoUsuario.php");
                    exit();
                } else {
                    echo $mensaje; // Manejo de errores si es necesario
                }
            }

            // Cerramos la conexión después de utilizarla
            $conexion->close();
        }
    }
}

// Llamamos a la función registrarUsuario del controlador RegistroController
RegistroController::registrarUsuario();
?>