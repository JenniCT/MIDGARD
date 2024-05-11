<?php

class Sesion {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function autenticarUsuario($correo, $contrasena) {
        $correo = $this->conexion->real_escape_string($correo);
        $sql = "SELECT * FROM Usuario WHERE Correo = '$correo'";
        $result = $this->conexion->query($sql);
    
        if($result) {
            // Verificar si encontró un registro
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                
                
                // Verificar la contraseña
                if(password_verify($contrasena, $row['Contrasena'])) {
                    // Iniciar sesión y guardar los datos del usuario
                    $_SESSION['correo'] = $row['Correo'];
                    $_SESSION['idUsuario'] = $row['idUsuario']; // Guardar el IdUsuario en la sesión
                    // Verificar si el campo 'imagen' está definido y no está vacío
                    $_SESSION['imagen'] = isset($row['imagen']) && !empty($row['imagen']) ? $row['imagen'] : '';
    
                    return 'BIENVENIDO';
                } else {
                    // Contraseña incorrecta
                    return 'CONTRASEÑA INCORRECTA';
                }
            } else {
                // No se encontró ningún registro
                return 'El correo proporcionado no existe';
            }
        } else {
            return 'Error en la consulta: ' . $this->conexion->error;
        }
    }
    
    public function existeCorreo($correo) {
        $correo = $this->conexion->real_escape_string($correo);
        $sql = "SELECT * FROM Usuario WHERE Correo = '$correo'";
        $result = $this->conexion->query($sql);
        return $result && $result->num_rows > 0;
    }

    public function obtenerIdUsuario($correo) {
        $correo = $this->conexion->real_escape_string($correo);
        $sql = "SELECT idUsuario FROM Usuario WHERE Correo = '$correo'";
        $result = $this->conexion->query($sql);
        
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['idUsuario'];
        } else {
            return null;
        }
    }
}
?>