<?php

class Usuario{
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function obtenerDatosUsuario($correo) {
        $sql = "SELECT * FROM Usuario WHERE Correo = '$correo'";
        $result = $this->conexion->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            echo "No se encontraron datos para el usuario con el correo: $correo";
            return null;
        }
    }

    public function actualizarDatos($correo, $datosActualizados) {
        // Verificar la conexión
        if ($this->conexion->connect_error) {
            die("Error en la conexión: " . $this->conexion->connect_error);
        }

        // Construir la consulta de actualización
        $sql = "UPDATE Usuario SET ";
        $updates = array();
        foreach ($datosActualizados as $campo => $valor) {
            if ($campo == 'imagen') {
                // Si el campo es la imagen, procesarla y agregarla al array de actualizaciones
                if (isset($valor["tmp_name"]) && is_uploaded_file($valor["tmp_name"])) {
                    $imagen = addslashes(file_get_contents($valor["tmp_name"]));
                    $updates[] = "imagen = '$imagen'";
                }
            } else {
                // Si es otro campo, agregarlo al array de actualizaciones
                $updates[] = "$campo = '$valor'";
            }
        }
        // Combinar todos los campos actualizados en una sola cadena
        $sql .= implode(", ", $updates);
        // Condición WHERE
        $sql .= " WHERE Correo = '$correo'";

        // Ejecutar la consulta
        if ($this->conexion->query($sql) === TRUE) {
            echo "Los cambios se han actualizado correctamente.";
            header("Location: ../Vista/Miinfo.php");
            exit;
        } else {
            echo "Error al actualizar los datos: " . $this->conexion->error;
        }

        // Cerrar la conexión
        $this->conexion->close();
    }
}
?>
