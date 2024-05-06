<?php
session_start();

require_once("../Modelo/SesionM.php");

class SesionController {
    public static function autenticar() {
        $config = require __DIR__ . '/../config.php';
        $conexion = new mysqli($config['servername'], $config['username'], $config['password'], $config['database']);

        $vcorreo = isset($_POST['correoL'])? $_POST['correoL'] : "";
        $vcontrasena = isset($_POST['contrasenaL'])? $_POST['contrasenaL'] : "";

        if($conexion->connect_error){
            die(json_encode(['success' => false, 'message' => 'La conexión falló: '. $conexion->connect_error]));
        }

        $sesionModelo = new Sesion($conexion);

        // Verificar si el correo existe en la base de datos
        $existeCorreo = $sesionModelo->existeCorreo($vcorreo);

        if ($existeCorreo) {
            // El correo existe, intentamos autenticar al usuario
            $mensaje = $sesionModelo->autenticarUsuario($vcorreo, $vcontrasena);

            // Redireccionar según el mensaje de autenticación
            if ($mensaje === 'BIENVENIDO') {
                // Obtener el idUsuario del usuario autenticado
                $idUsuario = $sesionModelo->obtenerIdUsuario($vcorreo);
                if ($idUsuario) {
                    // Guardar el idUsuario en la sesión
                    $_SESSION['idUsuario'] = $idUsuario;
                    header("Location: ../Vista/Miinfo.php");
                    exit();
                } else {
                    // No se pudo obtener el idUsuario
                    header("Location: ../Vista/SesionRegistro.php");
                    exit();
                }
            } else {
                // Contraseña incorrecta
                header("Location: ../Vista/SesionRegistro.php?error=password");
                exit();
            }
            
        } else {
            // El correo proporcionado no existe
        
            header("Location: ../Vista/SesionRegistro.php?error=email");
            exit();
        }

        $conexion->close();
    }
}

SesionController::autenticar();
?>
