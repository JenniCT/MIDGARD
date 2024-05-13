<?php
// Verificar si se ha enviado un ID válido por POST
if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];

    $config = require __DIR__ . '/../config.php';
    //Archivo de configuración para evitar la filtración de información

    $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['database']);
    $conn->set_charset("utf8");

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    

    // Asignar valores a las variables
    $IdPropiedad = $_POST["IdPropiedad"];
    $numero = $_POST["numero"];
    $IdVendedor = $_POST["IdVendedor"];
    $Tipo = $_POST["Tipo"];
    $Direccion = $_POST["Direccion"];
    $Estado = $_POST["Estado"];
    $Pais = $_POST["Pais"];
    $Capacidad = $_POST["Capacidad"];
    $NoHabitaciones = $_POST["NoHabitaciones"];
    $NoBanos = $_POST["NoBanos"];
    $Tamano = $_POST["Tamano"];
    $Precio = $_POST["Precio"];
    $Servicios = $_POST["Servicios"];
    $Condicion = $_POST["Condicion"];
    $Caracteristicas = $_POST["Caracteristicas"];
    $Disponibilidad = $_POST["Disponibilidad"];
    $Contrato = $_POST["Contrato"];
    $IdComentarios = $_POST["IdComentarios"];
    $FechaRegistro = $_POST["FechaRegistro"];
    $Comodidades = $_POST["Comodidades"];
    $Destinatario = $_POST["Destinatario"];

    // Preparar la consulta para actualizar los datos de la propiedad
    $sql = "UPDATE Propiedades SET IdPropiedad=?, numero=?, IdVendedor=?, Tipo=?, Direccion=?, Estado=?, Pais=?, Capacidad=?, NoHabitaciones=?, NoBanos=?, Tamano=?, Precio=?, Servicios=?, Condicion=?, Caracteristicas=?, Disponibilidad=?, Contrato=?, IdComentarios=?, FechaRegistro=?, Comodidades=?, Destinatario=? WHERE IdPropiedad=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sissssssssssssssssssss", $IdPropiedad, $numero, $IdVendedor, $Tipo, $Direccion, $Estado, $Pais, $Capacidad, $NoHabitaciones, $NoBanos, $Tamano, $Precio, $Servicios, $Condicion, $Caracteristicas, $Disponibilidad, $Contrato, $IdComentarios, $FechaRegistro, $Comodidades, $Destinatario, $IdPropiedad);
    //SIS

    // Ejecutar la consulta preparada
    if ($stmt->execute()) {
        // Redirigir a la página principal
        header("Location: ../Vista/admin.php");
        exit();
    } else {
        echo "Error al actualizar la propiedad: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "ID de propiedad no proporcionado";
}
?>
