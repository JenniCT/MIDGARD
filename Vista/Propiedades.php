<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis propiedades</title>
    <link rel="stylesheet" href="../Vista/css/Contenido.css">
    <script src="https://kit.fontawesome.com/e674bba739.js" crossorigin="anonymous"></script>
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
                <li><a href="Miinfo.php">Mi Informacion  <i class="fa-solid fa-user"></i> </a></li>
                <li><a href="../Modelo/Cerrarsesion.php">Cerrar Sesion  <i class="fa-solid fa-arrow-right"></i></a></li>
                <li><a href="../Vista/subircasa.php">Agregar usuario</a></li>
            </ul>
        </div>
    </div>
    <div class="Adentro">
        <div class="portafolio">
            <div class="container">
                <div class="propiedades">
                <h1>Mis Propiedades</h1>
                <?php if (!empty($propiedades)) : ?>
                    <ul>
                        <?php foreach ($propiedades as $propiedad) : ?>
                            <li><?php echo $propiedad['nombre']; ?></li>
                            <!-- Agregar más detalles de la propiedad según tu estructura de datos -->
                        <?php endforeach; ?>
                    </ul>
                <?php else : ?>
                    <p>No tienes propiedades registradas.</p>
                <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
    
</body>
</html>
