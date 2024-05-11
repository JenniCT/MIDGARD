<?php
    include "../Modelo/verificacionTipoImg.php";
    include '../Controlador/DatosUsuarioC.php';
?>
<!DOCTYPE html>
<html lang="es-Mex">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Vista/css/Info.css">
    <script src="https://kit.fontawesome.com/e674bba739.js" crossorigin="anonymous"></script>
    <title>Mi informacion</title>
</head>
<body>
    
    <div class="Adentro">
        <div class="contenido">
            <h2>Mi informacion</h2>
            
            <form action="../Controlador/DatosUsuarioC.php" method="post" enctype="multipart/form-data">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 login-container">
                            <div class="col-md-6 login-container">
                                <label for="foto">Foto:</label>
                                <input type="file" id="foto" name="foto" accept="image/*" onchange="mostrarVistaPrevia(this)">
                                <div id="imagenPreviaContainer">
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
