<?php

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $config = require __DIR__ . '/../config.php';
    $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['database']);
    $conn->set_charset("utf8");
    
    
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta para obtener los datos de la propiedad
    $sql = "SELECT * FROM Propiedades WHERE IdPropiedad = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id); // Asignar el valor de $id como entero
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Registro</title>
    <link rel="stylesheet" href="../Vista/css/Info.css">
</head>

<body>
<div class="Adentro">
        <div class="contenido">
            <h2>Información</h2>
            
            <form action="../Modelo/sudoGuardarDTP.php" method="post" enctype="multipart/form-data">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 login-container">
                            <input type="hidden" name="id" value="<?php echo $row['IdPropiedad']; ?>">
                            <div class="col-md-6 login-container">
                                <label for="foto">Foto:</label>
                                <input type="file" id="foto" name="foto" accept="image/*" onchange="mostrarVistaPrevia(this)">
                                <div id="imagenPreviaContainer">
                                    <img id="imagenPrevia" src="#" alt="Vista previa de la imagen">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="IdPropiedad" class="form-label">ID Propiedad</label>
                                <input type="text" class="form-control" id="IdPropiedad" name="IdPropiedad" placeholder ="<?php echo $row['IdPropiedad']; ?>" value="<?php echo $row['IdPropiedad']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="numero" class="form-label">Número</label>
                                <input type="text" class="form-control" id="numero" name="numero" placeholder ="<?php echo $row['numero']; ?>" value="<?php echo $row['numero']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="IdVendedor" class="form-label">ID Vendedor</label>
                                <input type="text" class="form-control" id="IdVendedor" name="IdVendedor" placeholder="<?php echo $row['IdVendedor']; ?>" value="<?php echo $row['IdVendedor']; ?>" >
                            </div>
                            <div class="mb-3">
                                <label for="Tipo" class="form-label">Tipo</label>
                                <input type="text" class="form-control" id="Tipo" name="Tipo" value="<?php echo htmlspecialchars($row['Tipo']); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Direccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="Direccion" name="Direccion" placeholder="<?php echo $row['Direccion']; ?>" value="<?php echo $row['Direccion']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Estado" class="form-label">Estado</label>
                                <input type="text" class="form-control" id="Estado" name="Estado" placeholder="<?php echo $row['Estado']; ?>" value="<?php echo $row['Estado']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Pais" class="form-label">País</label>
                                <input type="text" class="form-control" id="Pais" name="Pais" placeholder="<?php echo $row['Pais']; ?>" value="<?php echo $row['Pais']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Capacidad" class="form-label">Capacidad</label>
                                <input type="text" class="form-control" id="Capacidad" name="Capacidad" placeholder="<?php echo $row['Capacidad']; ?>" value="<?php echo $row['Capacidad']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="NoHabitaciones" class="form-label">Habitaciones</label>
                                <input type="text" class="form-control" id="NoHabitaciones" name="NoHabitaciones" placeholder="<?php echo $row['NoHabitaciones']; ?>" value="<?php echo $row['NoHabitaciones']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="NoBanos" class="form-label">Baños</label>
                                <input type="text" class="form-control" id="NoBanos" name="NoBanos" placeholder="<?php echo $row['NoBanos']; ?>" value="<?php echo $row['NoBanos']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Tamano" class="form-label">Tamaño</label>
                                <input type="text" class="form-control" id="Tamano" name="Tamano" placeholder="<?php echo $row['Tamano']; ?>" value="<?php echo $row['Tamano']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Precio" class="form-label">Precio</label>
                                <input type="text" class="form-control" id="Precio" name="Precio" placeholder="<?php echo $row['Precio']; ?>" value="<?php echo $row['Precio']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Servicios" class="form-label">Servicios</label>
                                <input type="text" class="form-control" id="Servicios" name="Servicios" placeholder="<?php echo $row['Servicios']; ?>" value="<?php echo $row['Servicios']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Condicion" class="form-label">Condición</label>
                                <input type="text" class="form-control" id="Condicion" name="Condicion" placeholder="<?php echo $row['Condicion']; ?>" value="<?php echo $row['Condicion']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Caracteristicas" class="form-label">Características</label>
                                <input type="text" class="form-control" id="Caracteristicas" name="Caracteristicas" placeholder="<?php echo $row['Caracteristicas']; ?>" value="<?php echo $row['Caracteristicas']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Disponibilidad" class="form-label">Disponibilidad</label>
                                <input type="text" class="form-control" id="Disponibilidad" name="Disponibilidad" placeholder="<?php echo $row['Disponibilidad']; ?>" value="<?php echo $row['Disponibilidad']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Contrato" class="form-label">Contrato</label>
                                <input type="text" class="form-control" id="Contrato" name="Contrato" placeholder="<?php echo $row['Contrato']; ?>" value="<?php echo $row['Contrato']; ?>">
                            </div>
                            <!--IMG-->
                            <div class="mb-3">
                                <label for="IdComentarios" class="form-label">Comentarios</label>
                                <input type="text" class="form-control" id="IdComentarios" name="IdComentarios" placeholder="<?php echo $row['IdComentarios']; ?>" value="<?php echo $row['IdComentarios']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="FechaRegistro" class="form-label">Fecha de Registro</label>
                                <input type="date" class="form-control" id="FechaRegistro" name="FechaRegistro" value="<?php echo $row['FechaRegistro']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Comodidades" class="form-label">Comodidades</label>
                                <input type="text" class="form-control" id="Comodidades" name="Comodidades" placeholder="<?php echo $row['Comodidades']; ?>" value="<?php echo $row['Comodidades']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Destinatario" class="form-label">Destinatario</label>
                                <input type="text" class="form-control" id="Destinatario" name="Destinatario" placeholder="<?php echo $row['Destinatario']; ?>" value="<?php echo $row['Destinatario']; ?>">
                            </div>
                            <button type="submit" class="btn btn-dark">Actualizar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
<script>
        function mostrarVistaPrevia(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
    
                reader.onload = function(e) {
                    document.getElementById('imagenPrevia').setAttribute('src', e.target.result);
                }
    
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</html>
<?php
    } else {
        echo "ID no encontrado";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "ID de propiedad no proporcionado";
}
?>

