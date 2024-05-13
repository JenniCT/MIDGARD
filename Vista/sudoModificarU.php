<?php

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $config = require __DIR__ . '/../config.php';
    $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['database']);
    $conn->set_charset("utf8");
    
    
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta para obtener los datos de la usuario
    $sql = "SELECT * FROM Usuario WHERE IdUsuario = ?";
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
            
            <form action="../Modelo/sudoGuardarDTU.php" method="post" enctype="multipart/form-data">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 login-container">
                            <input type="hidden" name="id" value="<?php echo $row['tipo']; ?>">
                            <div class="col-md-6 login-container">
                                <label for="foto">Foto:</label>
                                <input type="file" id="foto" name="foto" accept="image/*" onchange="mostrarVistaPrevia(this)">
                                <div id="imagenPreviaContainer">
                                    <img id="imagenPrevia" src="#" alt="Vista previa de la imagen">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="idUsuario" class="form-label">ID de Usuario</label>
                                <input type="text" class="form-control" id="idUsuario" name="idUsuario" placeholder ="<?php echo $row['idUsuario']; ?>" value="<?php echo $row['idUsuario']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="tipo" class="form-label">Tipo de Usuario</label>
                                <input type="text" class="form-control" id="tipo" name="tipo" placeholder ="<?php echo $row['tipo']; ?>" value="<?php echo $row['tipo']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Nombre" class="form-label">Nombre(s)</label>
                                <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="<?php echo $row['Nombre']; ?>" value="<?php echo $row['Nombre']; ?>" >
                            </div>
                            <div class="mb-3">
                                <label for="aPaterno" class="form-label">Apellido Paterno</label>
                                <input type="text" class="form-control" id="aPaterno" name="aPaterno" placeholder="<?php echo $row['aPaterno']; ?>" value="<?php echo $row['aPaterno']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="aMaterno" class="form-label">Apellido Materno</label>
                                <input type="text" class="form-control" id="aMaterno" name="aMaterno" placeholder="<?php echo $row['aMaterno']; ?>" value="<?php echo $row['aMaterno']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Correo" class="form-label">Correo</label>
                                <input type="text" class="form-control" id="Correo" name="Correo" placeholder="<?php echo $row['Correo']; ?>" value="<?php echo $row['Correo']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Contrasena" class="form-label">Contraseña</label>
                                <input type="text" class="form-control" id="Contrasena" name="Contrasena" placeholder="<?php echo $row['Contrasena']; ?>" value="<?php echo $row['Contrasena']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Telefono" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="<?php echo $row['Telefono']; ?>" value="<?php echo $row['Telefono']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="FchNacimiento" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="FchNacimiento" name="FchNacimiento" value="<?php echo $row['FchNacimiento']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="FechaRegistro" class="form-label">Fecha de Registro</label>
                                <input type="date" class="form-control" id="FechaRegistro" name="FechaRegistro" value="<?php echo $row['FechaRegistro']; ?>">
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
    echo "ID de usuario no proporcionado";
}
?>

