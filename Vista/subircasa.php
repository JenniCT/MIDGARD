<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Vista/css/Contenido.css">
    <script src="https://kit.fontawesome.com/e674bba739.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    
    
    <?php
        include '../Controlador/DatosUsuarioC.php';
    ?>
    <div class="lateral">
        <p>Hola, <?php echo isset($datosUsuario['idUsuario']) ? $datosUsuario['idUsuario'] : ''; ?></p>
        <div class="fotoperf">
            <?php if (!empty($imagen_base64)): ?>
                <img src="data:imagen/jpeg;base64,<?php echo $imagen_base64; ?>" alt="Imagen de perfil">
            <?php else: ?>
                <img src="img/user-image.png" alt="Yo poni mi imagen aki">
            <?php endif; ?>
        </div> 
            <!-- Agregar nombre del usuario y su foto de perfil-->
        <div class="acc">
            <ul>
                <li><a href="subircasa.php">Quiero vender  <i class="fa-solid fa-tag"></i> </a> </li>
                <li><a href="Propiedades.php">Mis Propiedades  <i class="fa-solid fa-house"></i></a></li>
                <li><a href="misventas.html">Mis Ventas  <i class="fa-solid fa-wallet"></i></a></li>
                <li><a href="miinfo.php">Mi Informacion  <i class="fa-solid fa-user"></i> </a></li>
                <li><a href="../Modelo/Cerrarsesion.php">Cerrar Sesion  <i class="fa-solid fa-arrow-right"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="Adentro">
        <div class="container">
            <h2>Registro de inmueble</h2>
            <form action="../Controlador/PropiedadesC.php" method="POST" enctype="multipart/form-data">
                <label for="tipo">Tipo:</label>
                <input type="text" name="tipo"><br>
                <label for="direccion">Dirección:</label>
                <input type="text" name="direccion"><br>
                <label for="estado">Estado:</label>
                <input type="text" name="estado"><br>
                <label for="pais">País:</label>
                <input type="text" name="pais"><br>
                <label for="capacidad">Capacidad:</label>
                <input type="number" name="capacidad"><br>
                <label for="habitaciones">Número de Habitaciones:</label>
                <input type="number" name="habitaciones"><br>
                <label for="banos">Baños:</label>
                <input type="number" name="banos"><br>
                <label for="tamano">Tamaño:</label>
                <input type="number" name="tamano"><br>
                <label for="precio">Precio:</label>
                <input type="number" name="precio"><br>
                <label for="servicios">Servicios:</label>
                <input type="text" name="servicios"><br>
                <label for="condicion">Condición:</label>
                <input type="text" name="condicion"><br>
                <label for="caracteristicas">Características:</label>
                <input type="text" name="caracteristicas"><br>
                <label for="disponibilidad">Disponibilidad:</label>
                <input type="text" name="disponibilidad"><br>
                <label for="contrato">Contrato:</label>
                <input type="text" name="contrato"><br>
                <label for="foto">Foto:</label>
                <input type="file" id="foto" name="foto" accept="image/*" onchange="mostrarVistaPrevia(this)" required>
                <div id="imagenPreviaContainer">
                    <img id="imagenPrevia" src="#" alt="Vista previa de la imagen">
                </div>
                <input type="submit" value="Guardar">
            </form>
        </div>
    </div>
        
    </div>
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
</body>
</html>