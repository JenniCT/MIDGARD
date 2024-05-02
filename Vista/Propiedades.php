<?php
session_start(); // Iniciar sesión para acceder a $_SESSION

// Verificar si se ha iniciado sesión
if (!isset($_SESSION['correo'])) {
    header("Location: ../Vista/SesionRegistro.php"); // Redirigir a la página de inicio de sesión si no se ha iniciado sesión
    exit();
}

// Establecer conexión a la base de datos
$conexion = new mysqli("localhost", "root", "i27bg2hhV_", "midgard");

// Verificar si la conexión fue exitosa
if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}

// Obtener el correo del usuario desde la sesión
$correo = $_SESSION['correo'];

// Consultar el idUsuario basado en el correo electrónico
$sql_idUsuario = "SELECT idUsuario FROM Usuario WHERE Correo = '$correo'";
$result_idUsuario = $conexion->query($sql_idUsuario);

if ($result_idUsuario && $result_idUsuario->num_rows > 0) {
    // Obtener el idUsuario
    $row_idUsuario = $result_idUsuario->fetch_assoc();
    $idUsuario = $row_idUsuario['idUsuario'];

    // Construir la consulta SQL con el idUsuario
    $sql = "SELECT Tipo, Direccion, Estado, Pais, Capacidad, NoHabitaciones, NoBanos, Tamano, Precio, Servicios, Condicion, Caracteristicas, Disponibilidad, Contrato, imgPropiedad FROM Propiedades WHERE IdVendedor = '$idUsuario'";

    // Ejecutar la consulta
    $resultado = $conexion->query($sql);

    // Variable para almacenar la información de las propiedades
    $propiedades_html = '';

    // Verificar si hay propiedades
    if ($resultado && $resultado->num_rows > 0) {
        // Construir la información de las propiedades
        while ($row = $resultado->fetch_assoc()) {
            // Comienza la tarjeta de propiedad
            $propiedades_html .= "<div class='Tarjeta'>";
            $propiedades_html .= "<h4>Tipo: " . $row['Tipo'] . "</h4>";
            $propiedades_html .= "<h4>Dirección: " . $row['Direccion'] . "</h4>";
            $propiedades_html .= "<h4>Estado: " . $row['Estado'] . "</h4>";
            $propiedades_html .= "<h4>País: " . $row['Pais'] . "</h4>";
            $propiedades_html .= "<h4>Capacidad de personas: " . $row['Capacidad'] . "</h4>";
            $propiedades_html .= "<h4>No. de Habitaciones: " . $row['NoHabitaciones'] . "</h4>";
            $propiedades_html .= "<h4>Baños: " . $row['NoBanos'] . "</h4>";
            $propiedades_html .= "<h4>Tamaño: " . $row['Tamano'] . "</h4>";
            $propiedades_html .= "<h4>Precio: " . $row['Precio'] . "</h4>";
            $propiedades_html .= "<h4>Servicio: " . $row['Servicios'] . "</h4>";
            $propiedades_html .= "<h4>Condicion: " . $row['Condicion'] . "</h4>";
            $propiedades_html .= "<h4>Caracteristicas: " . $row['Caracteristicas'] . "</h4>";
            $propiedades_html .= "<h4>Disponibilidad: " . $row['Disponibilidad'] . "</h4>";
            $propiedades_html .= "<h4>Contrato: " . $row['Contrato'] . "</h4>";
            // Mostrar la imagen
            
            if ($row['imgPropiedad'] !== null) {
                $imagen_base64 = base64_encode($row['imgPropiedad']);
                $imagen_src = 'data:image/jpeg;base64,'.$imagen_base64;
                $propiedades_html .= "<img  src='" . $imagen_src . "' alt='Imagen de la propiedad'>";
            } else {
                $propiedades_html .= "<p>No hay imagen disponible para esta propiedad.</p>";
            }
            
            // Cierra la tarjeta de propiedad
            $propiedades_html .= "</div>";
        }
    } else {
        // Si no hay propiedades
        $propiedades_html .= "<p>No se encontraron propiedades para este usuario.</p>";
    }
} else {
    // Si no se pudo obtener el idUsuario
    $propiedades_html .= "<p>No se pudo obtener el ID de usuario de la sesión.</p>";
}

// Cerrar conexión
$conexion->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../Vista/css/Miinfo.css">
    <script src="https://kit.fontawesome.com/e674bba739.js" crossorigin="anonymous"></script>
    <title>Mis propiedades</title>
    <style>
        .Tarjeta{
            border: 1px solid black;
            width: auto;
            padding: 10px;
            
        }
        img{
            width: 30%;
        }
    </style>

</head>
<body>
    <header>
        <div class="content">
            <div class="menu container">
                <!-- <a href="#" class="logo">logo</a> -->
                <img src="../Vista/img/logo.png" class="logo"><a href="index.php"></a></img>
                <input type="checkbox" id="menu">
                <label for="menu">
                    <img src="../Vista/img/menu-hamburguesa.png" alt="" class="menu-icono">
                </label>

                <nav class="navbar">
                    <ul>
                        <li><a href="index.php">Inicio</a></li>
                        <li><a href="#">Catalogo</a></li>
                        <li><a href="#">Contactanos</a></li>
                        <li><a href="#">Quienes Somos</a></li>
                        <li><a href="Vista/SesionRegistro.php">Registrate/Inicia Sesion</a></li>
                        <div class="search-box">
                            <input type="text" placeholder="¿Que estas buscando?">
                            <button><i class="fa fa-search"></i></button>

                        </div>

                    </ul>
                </nav>

            </div>
        </div>
    </header>

    <div class="lateral">
        <p>Hola, <?php echo $correo; ?></p>
        <div class="fotoperf">
            <?php if (!empty($imagen_base64)): ?>
                <img src="data:imagen/jpeg;base64,<?php echo $imagen_base64; ?>" alt="Imagen de perfil">
            <?php else: ?>
                <p>No se encontró la imagen del usuario.</p>
            <?php endif; ?>
        </div> 
        <!-- Agregar nombre del usuario y su foto de perfil-->
        <div class="acc">
            <ul>
                <li><a href="subircasa.php">Queiro vender  <i class="fa-solid fa-tag"></i> </a> </li>
                <li><a href="Propiedades.php">Mis Propiedades  <i class="fa-solid fa-house"></i></a></li>
                <li><a href="misventas.html">Mis Ventas  <i class="fa-solid fa-wallet"></i></a></li>
                <li><a href="Miinfo.php">Mi Informacion  <i class="fa-solid fa-user"></i> </a></li>
                <li><a href="../Modelo/cerrarsesion.php">Cerrar Sesion  <i class="fa-solid fa-arrow-right"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="Adentro">
        <div class="portafolio">
            <div class="container">
                <div class="propiedades">
                    <?php echo $propiedades_html; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
