<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["imagen"])) {
        $config = require __DIR__ . '/../config.php';
        $conexion = new mysqli($config['servername'], $config['username'], $config['password'], $config['database']);
    

        //FILTROS
        $max_size = 300 * 300;
        $tiposPermitidos = array('image/jpeg', 'image/jpg', 'image/png');

        $extensionArchivo = strtolower(pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION));
        //  1024 * 1024;

        if($conexion->connect_error){
            die("Error en la conexion".$conexion->connect_error);
        }

        $nombre = $_POST['nombre'];
        $aPaterno = $_POST['aPaterno'];
        $aMaterno = $_POST['aMaterno'];
        $correo = $_POST['correo'];
        $contrasena =$_POST['contrasena'];
        $telefono = $_POST['telefono'];
        $fechaNacimiento = $_POST['fechaNacimiento'];

        $imagen = $_FILES["imagen"]["tmp_name"];
        $img = addslashes(file_get_contents($imagen));

        //Verificamos si ya existe un usuario con las caracteristicas anteriores

        $consulta = "SELECT Correo FROM Usuario WHERE correo = '$correo'";
        $resultado = $conexion ->query($consulta);

        if($resultado->num_rows > 0) {
            echo "<script>alert('Ya existe un usuario con ese correo');</script>";
            echo "<script>window.location.href = 'SesionRegistro.php';</script>";
        }else {

                    // Verifica si el tamaño de la imagen está dentro del límite permitido
            if ($_FILES["imagen"]["size"] <= $max_size && in_array($_FILES["imagen"]["type"], $tiposPermitidos) && ($extensionArchivo == 'jpg' || $extensionArchivo == 'jpeg' || $extensionArchivo == 'png')) {

                    //Si no existe un usuario con las caracteristicas anteriores instertamos los datos
                $consulta = "INSERT INTO usuario (Nombre, aPaterno, aMaterno, Correo, Contrasena, Telefono, imagen, FechaNacimiento) 
                VALUES (
                    '$nombre',
                    '$aPaterno', 
                    '$aMaterno', 
                    '$correo', 
                    '$contrasena', 
                    '$telefono', 
                    '$img',
                    '$fechaNacimiento')";



            } 
            else{
                echo "Error: El TAMAÑO o FORMATO de la imagen NO esta permitido.";
            }    
    
            }
            
            if ($conexion->query($consulta) === TRUE) {
                echo "Usuario agregado correctamente.";
            } else {
                echo " Intentelo de Nuevo: " . $conexion->error;
            }

        $conexion->close();
            
        }
    

?>

