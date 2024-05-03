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

        $usuarioModelo = new Usuario($conexion);

        $usuario = $usuarioModelo->verificarUsuario($vcorreo, $vcontrasena);

        if ($usuario) {
            $_SESSION['mensaje'] = 'BIENVENIDO';
            $_SESSION['correo'] = $usuario['Correo'];
            $_SESSION['imagen'] = isset($usuario['imagen']) && !empty($usuario['imagen']) ? $usuario['imagen'] : '';
        } else {
            // Verificar si el correo existe en la base de datos
            $existeCorreo = $usuarioModelo->existeCorreo($vcorreo);
            if ($existeCorreo) {
                $_SESSION['mensaje'] = 'CONTRASEÑA INCORRECTA';
            } else {
                $_SESSION['mensaje'] = 'El correo proporcionado no existe';
            }
        }

        echo "<script>window.onload = function() { alert('".$_SESSION['mensaje']."'); window.location.href = '../Vista/" . ($usuario ? "Miinfo.php" : "SesionRegistro.php") . "'; }</script>";
        exit();

        $conexion->close();
    }
}

SesionController::autenticar();
?>
