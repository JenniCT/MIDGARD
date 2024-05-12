<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="../Vista/css/Contenido.css">
    <link rel="stylesheet" href="../Vista/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/e674bba739.js" crossorigin="anonymous"></script>
    <style>
           
           form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px; 
            background-color: #f9f9f9;
        }
        label {
            display: block;
            margin-bottom: 15px; 
            font-weight: bold; 
        }
        input[type="text"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px; 
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        textarea {
            height: 100px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px; 
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .contenido{
            display: none;
            margin-top: 10px;
            padding: 10px;
            border: 1px solid #aaa;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <?php
            include '../Controlador/DatosUsuarioC.php';
            
            include "../Modelo/adminconsulta.php";
    ?>
    <div class="lateral">
        <p>Hola, <?php echo isset($datosUsuario['idUsuario']) ? $datosUsuario['idUsuario'] : ''; ?></p>
        <div class="fotoperf">
            <?php if (!empty($imagen_base64)): ?>
                <img src="data:imagen/jpeg;base64,<?php echo $imagen_base64; ?>" alt="Imagen de perfil">
            <?php else: ?>
                <img src="img/user-image.png" alt="Imagen no cargada">
            <?php endif; ?>
        </div>
        
        <div class="acc">
            <ul>
                <li onclick="mostrarContenido('prop')">Propiedades <i class="fa-solid fa-house"></i></li>
                <li onclick="mostrarContenido('facturas')">Facturas <i class="fa-solid fa-wallet"></i></li>
                <li onclick="mostrarContenido('usuarios')">Usuarios <i class="fa-solid fa-user"></i></li>
                <li><a href="../Modelo/Cerrarsesion.php">Cerrar Sesion  <i class="fa-solid fa-arrow-right"></i></a></li>
            </ul>
        </div>
    </div>
    <div id="prop" class="contenido">
    <div class="Adentro">
        <div class="portafolio">
            <div class="container">
                <div class="propiedades">
                    <h1>Propiedades</h1><br>
                    <main class="table">
                        <div class="table-container">
                            <section class="table__body">
                                <table id="edit-table" class="table table-striped-columns table-info">
                                    <thead>
                                        <th>ID Propiedad</th>
                                        <th>Número</th>
                                        <th>Dirección</th>
                                        <th>País</th>
                                        <th>Capacidad</th>
                                        <th>Tamaño (m^2)</th>
                                        <th>Disponibilidad</th>
                                        <th>Comentarios</th>
                                        <th>Fecha de registro</th>
                                        <th></th><!-- botón de añadir probablemente -->
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $resultado = consulta("Propiedades");
                                        echo "<tbody>";
                                        foreach ($resultado as $row){
                                            echo "<tr>";
                                            echo "<td>" . $row['IdPropiedad'] . "</td>";
                                            echo "<td>" . $row['numero'] . "</td>";
                                            echo "<td>" . $row['Direccion'] . "</td>";
                                            echo "<td>" . $row['Pais'] . "</td>";
                                            echo "<td>" . $row['Capacidad'] . "</td>";
                                            echo "<td>" . $row['Tamano'] . "</td>";
                                            echo "<td>" . $row['Disponibilidad'] . "</td>";
                                            echo "<td>" . $row['IdComentarios'] . "</td>";
                                            echo "<td>" . $row['FechaRegistro'] . "</td>";
                                            echo "<td><a href='../vista/sudoModificar.php?id=" . $row['id'] . "' class='btn btn-warning btn-modificar'>Modificar</a></td>";
                                            echo "<td><a href='../vista/sudoEliminar.php?id=" . $row['id'] . "' class='btn btn-danger btn-eliminar'>Eliminar</a></td>";
                                            echo "</tr>";
                                        }
                                        echo "</tbody>";
                                        ?>
                                    </tbody>
                                </table>
                            </section>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div id="facturas" class="contenido">
    <div class="Adentro">
        <div class="portafolio">
            <div class="container">
                <div class="propiedades">
                    <h1>Facturas</h1> <br>
                    <main class="table">
                        <div class="table-container">
                            <section class="table__body">
                                <table id="edit-table" class="table table-striped-columns table-info">
                                    <thead>
                                        <th>Factura</th>
                                        <th>Vendedor</th>
                                        <th>Comprador</th>
                                        <th>Monto</th>
                                        <th>Emisión</th>
                                        <th>Vencimiento</th>
                                        <th>Estado</th>
                                        <th>Método de pago</th>
                                        <th></th><!-- botón de añadir probablemente -->
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $resultado = consulta("Factura");
                                        echo "<tbody>";
                                        foreach ($resultado as $row){
                                            echo "<tr>";
                                            echo "<td>" . $row['IdFactura'] . "</td>";
                                            echo "<td>" . $row['IdVendedor'] . "</td>";
                                            echo "<td>" . $row['IdComprador'] . "</td>";
                                            echo "<td>" . $row['Monto'] . "</td>";
                                            echo "<td>" . $row['FchaEmision'] . "</td>";
                                            echo "<td>" . $row['FchaVencimiento'] . "</td>";
                                            echo "<td>" . $row['Estado'] . "</td>";
                                            echo "<td>" . $row['MetodoPago'] . "</td>";
                                            echo "<td><a href='../vista/sudoModificar.php?id=" . $row['IdFactura'] . "' class='btn btn-warning btn-modificar'>Modificar</a></td>";
                                            echo "<td><a href='../vista/sudoEliminar.php?id=" . $row['idFactura'] . "' class='btn btn-danger btn-eliminar'>Eliminar</a></td>";
                                            echo "</tr>";
                                        }
                                        echo "</tbody>";
                                        ?>
                                    </tbody>
                                </table>
                            </section>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div id="usuarios" class="contenido">
    <div class="Adentro">
        <div class="portafolio">
            <div class="container">
                <div class="propiedades">
                    <h1>Usuarios</h1>
                    <main class="table">
                        <div class="table-container">
                            <section class="table__body">
                                <table id="edit-table" class="table table-striped-columns table-info">
                                    <thead>
                                        <th>N</th>
                                        <th>ID</th>
                                        <th>Tipo</th>
                                        <th>Nombre</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Correo</th>
                                        <th>Contraseña</th>
                                        <th>Teléfono</th>
                                        <th>Fecha de Nacimiento</th>
                                        <th>Fecha de Registro</th>
                                        <th>Imagen</th>
                                        <th>Número</th>
                                        <th></th><!-- botón de añadir probablemente -->
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $num = 1;
                                        $resultado = consulta("Usuario");
                                        echo "<tbody>";
                                        foreach ($resultado as $row){
                                            echo "<tr>";
                                            echo "<td>" . $num . "</td>";
                                            echo "<td>" . $row['idUsuario'] . "</td>";
                                            echo "<td>" . $row['tipo'] . "</td>";
                                            echo "<td>" . $row['Nombre'] . "</td>";
                                            echo "<td>" . $row['aPaterno'] . "</td>";
                                            echo "<td>" . $row['aMaterno'] . "</td>";
                                            echo "<td>" . $row['Correo'] . "</td>";
                                            echo "<td>" . $row['Contrasena'] . "</td>";
                                            echo "<td>" . $row['Telefono'] . "</td>";
                                            echo "<td>" . $row['FchNacimiento'] . "</td>";
                                            echo "<td>" . $row['FechaRegistro'] . "</td>";
                                            echo "<td><img src='data:imagen/jpeg;base64," . base64_encode($row['imagen']) . "' alt='Imagen'></td>";
                                            echo "<td>" . $row['numero'] . "</td>";
                                            echo "<td><a href='../vista/sudoModificar.php?id=" . $row['idUsuario'] . "' class='btn btn-warning btn-modificar'>Modificar</a></td>";
                                            echo "<td><a href='../vista/sudoEliminar.php?id=" . $row['idUsuario'] . "' class='btn btn-danger btn-eliminar'>Eliminar</a></td>";
                                            echo "</tr>";
                                            $num++;
                                        }
                                        echo "</tbody>";
                                        ?>
                                    </tbody>
                                </table>
                            </section>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
<script>
        function mostrarContenido(idContenido) {
            var contenidos = document.querySelectorAll('.contenido'); // Obtener todos los elementos con clase 'contenido'
            contenidos.forEach(function(contenido) {
                contenido.style.display = 'none'; // Ocultar todos los contenidos
            });
            var contenidoMostrar = document.getElementById(idContenido); // Obtener el contenido a mostrar
            if (contenidoMostrar) {
                contenidoMostrar.style.display = 'block'; // Mostrar el contenido correspondiente al botón presionado
            }
        }
    </script>
</html>