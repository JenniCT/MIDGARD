<?php
class Propiedad {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function obtenerPropiedadesUsuario($idUsuario) {
        $sql = "SELECT * FROM Propiedades WHERE IdVendedor ='$idUsuario' ";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("s", $idUsuario);
        $stmt->execute();
        $result = $stmt->get_result();

        $propiedades = [];
        while ($row = $result->fetch_assoc()) {
            $propiedades[] = $row;
        }

        $stmt->close();
        return $propiedades;
    }
}
?>
