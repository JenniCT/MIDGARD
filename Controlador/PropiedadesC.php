<?php
require_once __DIR__ . '/../config.php';
require_once '../Modelo/PropiedadesM.php';
require_once("../Modelo/DatosUsuarioM.php");

class ControladorPropiedades {
    private $conexion;
    private $AgregarPropiedad;

    public function __construct($conexion) {
        $this->conexion = $conexion;
        $this->AgregarPropiedad = new AgregarPropiedad($conexion);
    }

    public function agregarPropiedad($idUsuario, $tipo, $direccion, $estado, $pais, $capacidad, $habitaciones, $banos, $tamano, $precio, $servicios, $condicion, $caracteristicas, $disponibilidad, $contrato, $imagen) {
        return $this->modeloAgregarPropiedad->agregarPropiedad($idUsuario, $tipo, $direccion, $estado, $pais, $capacidad, $habitaciones, $banos, $tamano, $precio, $servicios, $condicion, $caracteristicas, $disponibilidad, $contrato, $imagen);
    }
    
}
// Verificar si se ha iniciado sesión
if (!isset($_SESSION['correo'])) {
    header("Location: ../Vista/SesionRegistro.php");
    exit();
}
// Obtener el ID de usuario desde la sesión
$idUsuario = $_SESSION['idUsuario'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $tipo = $_POST['tipo'];
    $direccion = $_POST['direccion'];
    $estado = $_POST['estado'];
    $pais = $_POST['pais'];
    $capacidad = $_POST['capacidad'];
    $habitaciones = $_POST['habitaciones'];
    $banos = $_POST['banos'];
    $tamano = $_POST['tamano'];
    $precio = $_POST['precio'];
    $servicios = $_POST['servicios'];
    $condicion = $_POST['condicion'];
    $caracteristicas = $_POST['caracteristicas'];
    $disponibilidad = $_POST['disponibilidad'];
    $contrato = $_POST['contrato'];
    $imagen = $_FILES['imagen']['tmp_name']; // Aquí asumo que estás recibiendo la imagen desde un formulario

    // Crear instancia del controlador
    $controlador = new ControladorAgregarPropiedad(new mysqli($config['servername'], $config['username'], $config['password'], $config['database']));

    // Agregar la propiedad
    $idPropiedad = $controlador->agregarPropiedad($idUsuario, $tipo, $direccion, $estado, $pais, $capacidad, $habitaciones, $banos, $tamano, $precio, $servicios, $condicion, $caracteristicas, $disponibilidad, $contrato, $imagen);

    if ($idPropiedad) {
        echo "Propiedad agregada con éxito. ID de la propiedad: " . $idPropiedad;
    } else {
        echo "Error al agregar la propiedad.";
    }
} else {
    // Si no es una solicitud POST, redirigir a la página de inicio
    header("Location: ../Vista/AgregarPropiedad.php");
    exit();
}
?>

?>
