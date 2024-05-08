<?php
class Propiedad {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function agregarPropiedad($idUsuario, $tipo, $direccion, $estado, $pais, $capacidad, $habitaciones, $banos, $tamano, $precio, $servicios, $condicion, $caracteristicas, $disponibilidad, $contrato, $imagen) {
        $sql = "INSERT INTO Propiedades (IdVendedor, Tipo, Direccion, Estado, Pais, Capacidad, NoHabitaciones, NoBanos, Tamano, Precio, Servicios, Condicion, Caracteristicas, Disponibilidad, Contrato, imgPropiedad) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("issssiississssss", $idUsuario, $tipo, $direccion, $estado, $pais, $capacidad, $habitaciones, $banos, $tamano, $precio, $servicios, $condicion, $caracteristicas, $disponibilidad, $contrato, $imagen);
        $stmt->execute();
        $stmt->close();
        return $this->conexion->insert_id;
    }
}
?>
