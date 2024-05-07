<?php
require_once __DIR__ . '/../config.php';
require_once '../Modelo/PropiedadesM.php';
require_once("../Modelo/DatosUsuarioM.php");

class ControladorPropiedades {
    private $conexion;
    private $propiedad;

    public function __construct($conexion) {
        $this->conexion = $conexion;
        $this->propiedad = new Propiedad($conexion);
    }

    public function mostrarPropiedades() {
        session_start();
        // Obtener datos del usuario actual
        $idUsuario = $_SESSION['idUsuario'];
        $actualizacionModelo = new Usuario($conexion);
        $datosUsuario = $actualizacionModelo->obtenerDatosUsuario($idUsuario);

        // Verificar si el usuario ha iniciado sesión
        if (!isset($_SESSION['idUsuario'])) {
            header("Location: ../Vista/Sesion.php");
            exit();
        }

        $idUsuario = $_SESSION['idUsuario'];

        // Obtener las propiedades del usuario
        $propiedades = $this->propiedad->obtenerPropiedadesUsuario($idUsuario);

        // Incluir la vista
        require_once '../Vista/Propiedades.php';
    }
}

// Crear instancia del controlador y llamar al método correspondiente
$controlador = new ControladorPropiedades(new mysqli($config['servername'], $config['username'], $config['password'], $config['database']));
$controlador->mostrarPropiedades();
?>
