<?php
class Usuario {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function verificarUsuario($correo, $contrasena) {
        $correo = $this->conexion->real_escape_string($correo);
        $sql = "SELECT * FROM Usuario WHERE Correo = '$correo'";
        $result = $this->conexion->query($sql);

        if($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Verificar si la contraseña coincide utilizando password_verify
            if(password_verify($contrasena, $row['Contrasena'])) {
                return $row;
            }
        }
        return null;
    }

    public function existeCorreo($correo) {
        $correo = $this->conexion->real_escape_string($correo);
        $sql = "SELECT * FROM Usuario WHERE Correo = '$correo'";
        $result = $this->conexion->query($sql);
        return $result && $result->num_rows > 0;
    }
}
?>
