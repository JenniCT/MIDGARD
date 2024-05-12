<?php

session_start(); // Iniciar la sesión
require_once("../Modelo/DatosUsuarioM.php");

class UsuarioController {
    
    public static function actualizarDatos() {
        $config = require __DIR__ . '/../config.php';
        $conexion = new mysqli($config['servername'], $config['username'], $config['password'], $config['database']);
    
        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error en la conexión: " . $conexion->connect_error);
        }
    
        // Obtener datos del usuario actual
        $correo = $_SESSION['correo'];
        $actualizacionModelo = new Usuario($conexion);
        $datosUsuario = $actualizacionModelo->obtenerDatosUsuario($correo);
    
        // Verificar si se envió el formulario de actualización
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $datosActualizados = array(
                'idUsuario' => isset($_POST['idUsuario']) ? $_POST['idUsuario'] : '',
                'Nombre' => isset($_POST['Nombre']) ? $_POST['Nombre'] : '',
                'aPaterno' => isset($_POST['aPaterno']) ? $_POST['aPaterno'] : '',
                'aMaterno' => isset($_POST['aMaterno']) ? $_POST['aMaterno'] : '',
                'Correo' => isset($_POST['Correo']) ? $_POST['Correo'] : '',
                'Telefono' => isset($_POST['Telefono']) ? $_POST['Telefono'] : '',
                'FchNacimiento' => isset($_POST['FchNacimiento']) ? $_POST['FchNacimiento'] : '',
                'imagen' => isset($_FILES["foto"]) ? $_FILES["foto"] : ''
            );

            // Actualizar los datos en la base de datos
            $actualizacionModelo->actualizarDatos($correo, $datosActualizados);
        }
    
        return $datosUsuario;
    }
    public static function actualizarTipo() {
        $config = require __DIR__ . '/../config.php';
        $conexion = new mysqli($config['servername'], $config['username'], $config['password'], $config['database']);

        if ($conexion->connect_error) {
            die("Error en la conexión: " . $conexion->connect_error);
        }

        $correo = $_SESSION['correo'];
        $usuarioModelo = new Usuario($conexion);
        $tipo = '';

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tipo'])) {
            $tipo = $_POST['tipo'];
            $usuarioModelo->actualizarTipo($correo, $tipo);
        }

        return $tipo;
    }
    
    
    
}

UsuarioController::actualizarTipo();

$datosUsuario = UsuarioController::actualizarDatos();

?>
