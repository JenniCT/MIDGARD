<!DOCTYPE html>
<html lang="es-Mex">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Vista/css/Contenido.css">
    <script src="https://kit.fontawesome.com/e674bba739.js" crossorigin="anonymous"></script>
    <title>Registro de inmueble</title>
</head>
<body>
    <?php include '../Controlador/DatosUsuarioC.php'; ?>
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
                <li><a href="subircasa.php">Quiero vender  <i class="fa-solid fa-tag"></i> </a></li>
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
                <label for="Vendedor">Vendedor:</label>
                <input type="text" name="idVendedor"  placeholder="<?php echo isset($datosUsuario['Nombre']) ? $datosUsuario['Nombre'] : ''; ?>"><br>

                <label for="Tipo">Tipo:</label>
                <select id="Tipo" name="Tipo">
                    <option value="" selected disabled>Tipo</option>
                    <option value="CA">Casa</option>
                    <option value="DE">Departamento</option>
                    <option value="TE">Terreno</option>
                    <option value="CB">Cabaña</option>
                    <option value="CD">Condominio</option>
                </select>
                
                <label for="Direccion">Dirección:</label>
                <input type="text" name="Direccion"><br>

                <label for="Pais">País:</label>
                <input type="text" name="Pais"><br>

                <label for="Estado">Estado:</label>
                <input type="text" name="Estado"><br>
                
                <label for="Capacidad">Capacidad:</label>
                <input type="number" name="Capacidad" placeholder="Ingresa el número de personas"><br>

                <label for="Habitaciones">Número de Habitaciones:</label>
                <input type="number" name="Habitaciones"><br>

                <label for="Banos">Baños:</label>
                <input type="number" name="Banos"><br>

                <label for="Tamano">Tamaño:</label>
                <input type="number" name="Tamano"><br>

                <label for="Contrato">Contrato:</label>
                <select id="Contrato" name="Contrato">
                    <option value="" selected disabled>Contrato</option>
                    <option value="Renta">Renta</option>
                    <option value="Venta">Venta</option>
                </select>

                <label for="Precio">Precio:</label>
                <input type="number" name="Precio"><br>

                <label for="Servicios">Servicios:</label>
                <input type="text" name="Servicios"><br>

                <label for="Condicion">Condición:</label>
                <select id="Condicion" name="Condicion">
                    <option value="" selected disabled>Condición</option>
                    <option value="N">Nuevo</option>
                    <option value="U">Usado</option>
                </select>
                
                <label for="Caracteristicas">Características:</label>
                <input type="text" name="Caracteristicas" placeholder="Describe tu Propiedad"><br>
                
                <label for="Disponibilidad">Disponibilidad:</label>
                <select id="Disponibilidad" name="Disponibilidad">
                    <option value="" selected disabled>Disponibilidad</option>
                    <option value="Disponible">Disponible</option>
                    <option value="No Disponible">No Disponible</option>
                </select>

                <label for="foto">Foto:</label>
                <input type="file" id="foto" name="foto" accept="image/*" onchange="mostrarVistaPrevia(this)">
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
