<?php
class Registro {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function registrarUsuario($nombre, $aPaterno, $aMaterno, $correo, $contrasena, $telefono, $fechaNacimiento) {
        // Verificamos si ya existe un usuario con las características anteriores
        $consulta = "SELECT Correo FROM Usuario WHERE correo = '$correo'";
        $resultado = $this->conexion->query($consulta);

        if($resultado->num_rows > 0) {
            return "Ya existe un usuario con ese correo";
        } else {
            // Encriptamos la contraseña antes de almacenarla
            $contrasenaEncriptada = password_hash($contrasena, PASSWORD_DEFAULT);

            // Insertamos los datos del usuario sin la foto
            $consulta = "INSERT INTO Usuario (Nombre, aPaterno, aMaterno, Correo, Contrasena, Telefono, FchNacimiento) 
                VALUES ('$nombre', '$aPaterno', '$aMaterno', '$correo', '$contrasenaEncriptada', '$telefono', '$fechaNacimiento')";
                
            if ($this->conexion->query($consulta) === TRUE) {
                return "Usuario agregado correctamente.";
            } else {
                return "Error al agregar usuario: " . $this->conexion->error;
            }
        }
    }
}
?>
