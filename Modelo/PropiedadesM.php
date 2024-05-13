<?php
class Propiedad {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function agregarPropiedad($idUsuario, $Tipo, $Direccion, $Estado, $Pais, $Capacidad, $Habitaciones, $Banos, $Tamano, $Precio, $Servicios, $Condicion, $Caracteristicas, $Disponibilidad, $Contrato, $imgPropiedad) {
        // Verificar si ya existe una propiedad con las mismas características
        $consulta = "SELECT idPropiedad FROM Propiedades WHERE Tipo = '$Tipo' AND Direccion = '$Direccion' AND Estado = '$Estado' AND Pais = '$Pais'";
        $resultado = $this->conexion->query($consulta);

        if($resultado->num_rows > 0) {
            return "Ya existe una propiedad con esas características";
        } else {
            // Insertar los datos de la propiedad en la base de datos
            $sql = "INSERT INTO Propiedades (IdVendedor, Tipo, Direccion, Estado, Pais, Capacidad, NoHabitaciones, NoBanos, Tamano, Precio, Servicios, Condicion, Caracteristicas, Disponibilidad, Contrato, imgPropiedad) 
                    VALUES ('$idUsuario', '$Tipo', '$Direccion', '$Estado', '$Pais', '$Capacidad', '$Habitaciones', '$Banos', '$Tamano', '$Precio', '$Servicios', '$Condicion', '$Caracteristicas', '$Disponibilidad', '$Contrato', '$imgPropiedad')";

            if ($this->conexion->query($sql) === TRUE) {
                return "Propiedad agregada correctamente.";
            } else {
                return "Error al agregar propiedad: " . $this->conexion->error;
            }
        }
    }

    public static function catalogoPropiedades() {
        $config = require __DIR__. '/../config.php';
        $conexion = new mysqli($config['servername'], $config['username'], $config['password'], $config['database']);
    
        $consulta = "SELECT imgPropiedad AS imagen_binaria, Estado, IdPropiedad, NoBanos, Precio, IdVendedor FROM Propiedades";
    
        $resultado = $conexion->query($consulta);
    
        $propiedades = array(); // Array para almacenar todas las propiedades
    
        if ($resultado && $resultado->num_rows > 0) {
            // Iterar sobre cada fila de resultado para obtener las propiedades
            while ($fila = $resultado->fetch_assoc()) {
                // Convertir la imagen binaria a base64 y agregarla al array
                $imagen_base64 = base64_encode($fila['imagen_binaria']);
                $fila['imagen_base64'] = $imagen_base64;
                // Eliminar la imagen binaria para evitar confusiones
                unset($fila['imagen_binaria']);
                $propiedades[] = $fila;
            }
        }
    
        return $propiedades;
    }
    
    
    

}

$imagen_base64 = Propiedad::catalogoPropiedades();
?>
