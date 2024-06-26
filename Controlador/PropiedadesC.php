<?php
require_once __DIR__ . '/../config.php';
require_once '../Modelo/PropiedadesM.php';
require_once("../Modelo/DatosUsuarioM.php");

class ControladorPropiedades {
    public static function agregarPropiedad() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start(); // Iniciar sesión solo si no está activa
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $config = require __DIR__ . '/../config.php';
            $conexion = new mysqli($config['servername'], $config['username'], $config['password'], $config['database']);

            // Verificamos si la conexión fue exitosa
            if($conexion->connect_error){
                die(json_encode(['success' => false, 'message' => 'La conexión falló: '. $conexion->connect_error]));
            }

            // Verificar si se ha iniciado sesión y se ha almacenado el ID de usuario en la sesión
            if (!isset($_SESSION['idUsuario'])) {
                // No realizar redireccionamiento
            }

            // Obtener el ID de usuario desde la sesión
            $idVendedor = $_SESSION['idUsuario']; // Cambiado a 'idVendedor' según el formulario HTML

            // Recibir los datos del formulario
            $Tipo = isset($_POST['Tipo']) ? $_POST['Tipo']: '';
            $Direccion = $_POST['Direccion'];
            $Pais = $_POST['Pais'];
            $Estado = $_POST['Estado'];
            $Capacidad = $_POST['Capacidad'];
            $Habitaciones = $_POST['Habitaciones'];
            $Banos = $_POST['Banos'];
            $Tamano = $_POST['Tamano'];
            $Contrato = $_POST['Contrato'];
            $Precio = $_POST['Precio'];
            $Servicios = $_POST['Servicios'];
            $Condicion = $_POST['Condicion'];
            $Caracteristicas = $_POST['Caracteristicas'];
            $Disponibilidad = $_POST['Disponibilidad'];
            $imgPropiedad = $_FILES['foto']['tmp_name']; // Corregido el nombre del campo para obtener la imagen
            $img = addslashes(file_get_contents($imgPropiedad));

            // Crear una instancia del modelo Propiedad
            $propiedad = new Propiedad($conexion);

            // Llamar al método agregarPropiedad del modelo Propiedad
            $mensaje = $propiedad->agregarPropiedad($idVendedor, $Tipo, $Direccion, $Estado, $Pais, $Capacidad, $Habitaciones, $Banos, $Tamano, $Precio, $Servicios, $Condicion, $Caracteristicas, $Disponibilidad, $Contrato, $img);

            // Manejo de errores o mensajes de éxito
            if ($mensaje === "Propiedad agregada correctamente.") {
                echo "<script>alert('$mensaje'); window.location.href='../Vista/subircasa.php';</script>";
            } else {
                echo "<script>alert('$mensaje');</script>"; // Mostrar mensaje de error
            }

            // Cerramos la conexión después de utilizarla
            $conexion->close();
        }
    }


    public static function reflejarPropiedades() {
        // Iniciar la sesión
        // session_start();
    
        // Establecer la conexión a la base de datos
        $config = require __DIR__ . '/../config.php';
        $conexion = new mysqli($config['servername'], $config['username'], $config['password'], $config['database']);
    
        // Verificar si la conexión fue exitosa
        if($conexion->connect_error){
            die(json_encode(['success' => false, 'message' => 'La conexión falló: '. $conexion->connect_error]));
        }
    
        // Verificar si se ha iniciado sesión y se ha almacenado el ID de usuario en la sesión
        if (!isset($_SESSION['idUsuario'])) {
            // No realizar redireccionamiento
        }
    
        // Obtener el ID de usuario desde la sesión
        $idVendedor = $_SESSION['idUsuario'];
    
        // Consulta SQL para obtener todas las imágenes de las propiedades del usuario
        $consulta = "SELECT imgPropiedad, Estado, IdPropiedad, NoBanos, Precio, IdVendedor, Disponibilidad  FROM Propiedades WHERE idVendedor = '$idVendedor' AND Disponibilidad = 'Disponible'";
        $resultado = $conexion->query($consulta);
    
        $propiedades= array(); // Array para almacenar todas las imágenes en formato base64
    
        if ($resultado && $resultado->num_rows > 0) {
            // Iterar sobre cada fila de resultado para obtener las propiedades
            while ($fila = $resultado->fetch_assoc()) {
                // Convertir la imagen binaria a base64 y agregarla al array
                $imagen_base64 = base64_encode($fila['imgPropiedad']);
                $fila['imagen_base64'] = $imagen_base64;
                // Eliminar la imagen binaria para evitar confusiones
                unset($fila['imgPropiedad']);
                $propiedades[] = $fila;
            }
        }
    
        return $propiedades;
    }
    
    public static function PropiedadesNoDis() {
        // Iniciar la sesión
        // session_start();
    
        // Establecer la conexión a la base de datos
        $config = require __DIR__ . '/../config.php';
        $conexion = new mysqli($config['servername'], $config['username'], $config['password'], $config['database']);
    
        // Verificar si la conexión fue exitosa
        if($conexion->connect_error){
            die(json_encode(['success' => false, 'message' => 'La conexión falló: '. $conexion->connect_error]));
        }
    
        // Verificar si se ha iniciado sesión y se ha almacenado el ID de usuario en la sesión
        if (!isset($_SESSION['idUsuario'])) {
            // No realizar redireccionamiento
        }
    
        // Obtener el ID de usuario desde la sesión
        $idVendedor = $_SESSION['idUsuario'];
    
        // Consulta SQL para obtener todas las imágenes de las propiedades del usuario
        $consulta = "SELECT imgPropiedad, Estado, IdPropiedad, NoBanos, Precio, IdVendedor, Disponibilidad  FROM Propiedades WHERE idVendedor = '$idVendedor' AND Disponibilidad = 'No Disponible'";
        $resultado = $conexion->query($consulta);
    
        $propiedades= array(); // Array para almacenar todas las imágenes en formato base64
    
        if ($resultado && $resultado->num_rows > 0) {
            // Iterar sobre cada fila de resultado para obtener las propiedades
            while ($fila = $resultado->fetch_assoc()) {
                // Convertir la imagen binaria a base64 y agregarla al array
                $imagen_base64 = base64_encode($fila['imgPropiedad']);
                $fila['imagen_base64'] = $imagen_base64;
                // Eliminar la imagen binaria para evitar confusiones
                unset($fila['imgPropiedad']);
                $propiedades[] = $fila;
            }
        }
    
        return $propiedades;
    }
    
    public static function Reservas() {
        // Iniciar la sesión
        // session_start();
    
        // Establecer la conexión a la base de datos
        $config = require __DIR__ . '/../config.php';
        $conexion = new mysqli($config['servername'], $config['username'], $config['password'], $config['database']);
    
        // Verificar si la conexión fue exitosa
        if($conexion->connect_error){
            die(json_encode(['success' => false, 'message' => 'La conexión falló: '. $conexion->connect_error]));
        }
    
        // Verificar si se ha iniciado sesión y se ha almacenado el ID de usuario en la sesión
        if (!isset($_SESSION['idUsuario'])) {
            // No realizar redireccionamiento
        }
    
        // Obtener el ID de usuario desde la sesión
        $idVendedor = $_SESSION['idUsuario'];
    
        // Consulta SQL para obtener todas las imágenes de las propiedades del usuario
        $consulta = "SELECT imgPropiedad, Estado, IdPropiedad, NoBanos, Precio, IdVendedor, Disponibilidad  FROM Propiedades WHERE idVendedor = '$idVendedor' AND Contrato = 'Reservar'";
        $resultado = $conexion->query($consulta);
    
        $propiedades= array(); // Array para almacenar todas las imágenes en formato base64
    
        if ($resultado && $resultado->num_rows > 0) {
            // Iterar sobre cada fila de resultado para obtener las propiedades
            while ($fila = $resultado->fetch_assoc()) {
                // Convertir la imagen binaria a base64 y agregarla al array
                $imagen_base64 = base64_encode($fila['imgPropiedad']);
                $fila['imagen_base64'] = $imagen_base64;
                // Eliminar la imagen binaria para evitar confusiones
                unset($fila['imgPropiedad']);
                $propiedades[] = $fila;

                
            }
        }
    
        return $propiedades;
    }


}

ControladorPropiedades::agregarPropiedad();

$propiedades = ControladorPropiedades::reflejarPropiedades();
$propiedades = ControladorPropiedades::PropiedadesNoDis();
$propiedades = ControladorPropiedades::Reservas();

?>
