<?php
session_start();
$config = require __DIR__ . '/../config.php';
$conexion = new mysqli($config['servername'], $config['username'], $config['password'], $config['database']);

$vcorreo = isset($_POST['correoL'])? $_POST['correoL'] : "";
$vcontrasena = isset($_POST['contrasenaL'])? $_POST['contrasenaL'] : "";

if($conexion->connect_error){
    die(json_encode(['success' => false, 'message' => 'La conexión falló: '. $conexion->connect_error]));
}

$sql = "SELECT * FROM Usuario WHERE Correo = '$vcorreo'";
$result = $conexion->query($sql);

$inputStyle = isset($_SESSION['message'])?'border: solid 1px red;' : '';
$messageStyle = isset($_SESSION['message'])? 'color:red;': '';

if($result){
    //verificar si encontró un registro
    if ($result->num_rows > 0){
        $row  = $result->fetch_assoc();

        //comparar contraseñas
        if($row['Contrasena']== $vcontrasena){

            // Iniciar sesión y guardar los datos del usuario
            $_SESSION['correo'] = $row['Correo'];
            // Verificar si el campo 'imagen' está definido y no está vacío
            $_SESSION['imagen'] = isset($row['imagen']) && !empty($row['imagen']) ? $row['imagen'] : '';

            // Las contraseñas coinciden
            echo "<script>alert('BIENVENIDO');</script>";
            echo "<meta http-equiv='refresh' content='0;url=Miinfo.php'>";
            exit();
            
        }else{
            //caso contrario
            echo "<script>alert('CONTRASEÑA INCORRECTA');</script>";
            echo "<script>window.location.href = 'SesionRegistro.php';</script>";
            exit();
        }
    }else{
        // No se encontró ningún registro
    }
}else{
    $_SESSION['message'] = 'Error en la consulta:'.$conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>


