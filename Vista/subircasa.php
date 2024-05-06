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
        include '../Modelo/reflejarImagen.php';
    ?>

    <div class="lateral">
        <p>Hola, <?php echo $correo; ?></p>
        <div class="fotoperf">
            <?php if (!empty($imagen_base64)): ?>
                <img src="data:imagen/jpeg;base64,<?php echo $imagen_base64; ?>" alt="Imagen de perfil">
            <?php else: ?>
                <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="">
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
            <form action="" method="post">
                <label for="foto">Foto:</label>
                <input type="file" id="foto" name="foto" accept="image/*" onchange="mostrarVistaPrevia(this)" required>
                <div id="imagenPreviaContainer">
                    <img id="imagenPrevia" src="#" alt="Vista previa de la imagen">
                </div>
                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" required>
    
                <label for="habitaciones">Número de Habitaciones:</label>
                <input type="number" id="habitaciones" name="habitaciones" required>
    
                <label for="banos">Número de Baños:</label>
                <input type="number" id="banos" name="banos" required>
    
                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" required>
    
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" rows="4" required></textarea>
    
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