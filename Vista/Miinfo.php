<!DOCTYPE html>
<html lang="es-Mex">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Vista/css/Contenido.css">
    <script src="https://kit.fontawesome.com/e674bba739.js" crossorigin="anonymous"></script>
    <title>Mi informacion</title>
</head>
<body>
    <?php
        include '../Controlador/DatosUsuarioC.php';
    ?>

    <!-- Aquí ya iniciaste la sesión, no es necesario iniciarla de nuevo -->
    <div class="lateral">
    <p>Hola, <?php echo isset($datosUsuario['idUsuario']) ? $datosUsuario['idUsuario'] : ''; ?> </p>
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
            </ul>
        </div>
    </div>
    <!-- Parte de adentro donde esta el formulario-->
    <div class="Adentro">
        <div class="container">
            <h2>Mi informacion</h2>
            
            <form action="../Controlador/DatosUsuarioC.php" method="post" enctype="multipart/form-data">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 login-container">
                            <div class="col-md-6 login-container">
                                <label for="foto">Foto:</label>
                                <input type="file" id="foto" name="foto" accept="image/*" onchange="mostrarVistaPrevia(this)">
                                <div id="imagenPreviaContainer">
                                <img id="imagenPrevia" src="#" alt="Vista previa de la imagen">
                            </div>

                            <div class="mb-3">
                                <label for="idUsuario" class="form-label">ID Usuario</label>
                                <input type="text" class="form-control" id="idUsuario" name="idUsuario" placeholder ="<?php echo $datosUsuario['idUsuario']; ?>" value="<?php echo $datosUsuario['idUsuario']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="Nombre" placeholder ="<?php echo $datosUsuario['Nombre']; ?>" value="<?php echo $datosUsuario['Nombre']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="aPaterno" class="form-label">Apellido Paterno</label>
                                <input type="text" class="form-control" id="aPaterno" name="aPaterno" placeholder="<?php echo $datosUsuario['aPaterno']; ?>" value="<?php echo $datosUsuario['aPaterno']; ?>" >
                            </div>
                            <div class="mb-3">
                                <label for="aMaterno" class="form-label">Apellido Materno</label>
                                <input type="text" class="form-control" id="aMaterno" name="aMaterno" placeholder="<?php echo $datosUsuario['aMaterno']; ?>" value="<?php echo $datosUsuario['aMaterno']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="Correo" name="Correo" placeholder="<?php echo $datosUsuario['Correo']; ?>" value="<?php echo $datosUsuario['Correo']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" id="Telefono" name="Telefono" placeholder="<?php echo $datosUsuario['Telefono']; ?>" value="<?php echo $datosUsuario['Telefono']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="fchNacimiento" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="FchNacimiento" name="FchNacimiento" value="<?php echo $datosUsuario['FchNacimiento']; ?>">
                            </div>

                            <div class="input-box mb-3">
                                <select name="tipo" required>
                                    <option value="1">Vendedor</option>
                                    <option value="2" selected>Comprador</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-dark">Actualizar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="js/mostrarVistaPrevia.js"></script>
</body>
</html>
