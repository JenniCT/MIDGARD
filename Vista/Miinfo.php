
<!DOCTYPE html>
<html lang="es-Mex">
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

    <!-- Aquí ya iniciaste la sesión, no es necesario iniciarla de nuevo -->
    <div class="lateral">
    <p>Hola, <?php echo isset($_SESSION['idUsuario']) ? $_SESSION['idUsuario'] : ''; ?> </p>
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
                <li><a href="../Modelo/Cerrarsesion.php">Cerrar Sesion  <i class="fa-solid fa-arrow-right"></i></a></li>
            </ul>
        </div>
    </div>
    <!-- Parte de adentro donde esta el formulario-->
    <div class="Adentro">
        <div class="container">
            <h2>Mi informacion</h2>
            <form action="editar.php" method="post">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 login-container">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo isset($Usuario['Nombre']) ? $Usuario['Nombre'] : ''; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="aPaterno" class="form-label">Apellido Paterno</label>
                                <input type="text" class="form-control" id="aPaterno" name="aPaterno" value="<?php echo isset($Usuario['aPaterno']) ? $Usuario['aPaterno'] : ''; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="aMaterno" class="form-label">Apellido Materno</label>
                                <input type="text" class="form-control" id="aMaterno" name="aMaterno" value="<?php echo isset($Usuario['aMaterno']) ? $Usuario['aMaterno'] : ''; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="correo" name="correo" value="<?php echo isset($Usuario['Correo']) ? $Usuario['Correo'] : ''; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo isset($Usuario['Telefono']) ? $Usuario['Telefono'] : ''; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="fchNacimiento" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="fchNacimiento" name="fchNacimiento" value="<?php echo isset($Usuario['FchNacimiento']) ? $Usuario['FchNacimiento'] : ''; ?>" required>
                            </div>
                            <button type="submit" class="btn btn-dark">Actualizar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
