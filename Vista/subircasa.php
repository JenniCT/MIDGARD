<?php
    include "../Modelo/verificacionTipoImg.php";
    include '../Controlador/DatosUsuarioC.php';
?>
<!DOCTYPE html>
<html lang="es-Mex">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Vista/css/propiedades.css">
    <script src="https://kit.fontawesome.com/e674bba739.js" crossorigin="anonymous"></script>
    <title>Registro de inmueble</title>
</head>
<body>
    <div class="Adentro">
        <div class="contenido">
            <h2>Registro de inmueble</h2>
            <form action="../Controlador/PropiedadesC.php" method="POST" enctype="multipart/form-data">
                <label for="Vendedor">Vendedor:</label>
                <input type="text" name="idVendedor"  placeholder="<?php echo isset($datosUsuario['Nombre']) ? $datosUsuario['Nombre'] : ''; ?>"><br>

                <label for="Tipo">Tipo:</label>
                <select id="Tipo" name="Tipo" required>
                    <option value="" selected disabled>Tipo</option>
                    <option value="CA">Casa</option>
                    <option value="DE">Departamento</option>
                    <option value="TE">Terreno</option>
                    <option value="CB">Cabaña</option>
                    <option value="CD">Condominio</option>
                </select>
                <br> <br>
                <label for="Direccion">Dirección:</label>
                <input type="text" name="Direccion" required><br>

                <label for="Pais">País:</label>
                <input type="text" name="Pais" required><br>

                <label for="Estado">Estado:</label>
                <input type="text" name="Estado" required><br>
                
                <label for="Capacidad">Capacidad:</label>
                <input type="number" name="Capacidad" placeholder="Ingresa el número de personas" required><br>

                <label for="Habitaciones">Número de Habitaciones:</label>
                <input type="number" name="Habitaciones" required><br>

                <label for="Banos">Baños:</label>
                <input type="number" name="Banos" required><br>

                <label for="Tamano">Tamaño:</label>
                <input type="number" name="Tamano" required><br>

                <label for="Contrato">Contrato:</label>
                <select id="Contrato" name="Contrato" required>
                    <option value="" selected disabled>Contrato</option>
                    <option value="Renta">Renta</option>
                    <option value="Venta">Venta</option>
                </select>
                <br> <br>
                <label for="Precio">Precio:</label>
                <input type="number" name="Precio" required><br>

                <label for="Servicios">Servicios:</label>
                <input type="text" name="Servicios" required><br>

                <label for="Condicion">Condición:</label>
                <select id="Condicion" name="Condicion" required>
                    <option value="" selected disabled>Condición</option>
                    <option value="N">Nuevo</option>
                    <option value="U">Usado</option>
                </select>
                <br> <br>
                <label for="Caracteristicas">Características:</label>
                <input type="text" name="Caracteristicas" placeholder="Describe tu Propiedad" required><br>
                
                <label for="Disponibilidad">Disponibilidad:</label>
                <select id="Disponibilidad" name="Disponibilidad" required>
                    <option value="" selected disabled>Disponibilidad</option>
                    <option value="Disponible">Disponible</option>
                    <option value="No Disponible">No Disponible</option>
                </select>
                <br> <br>
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
