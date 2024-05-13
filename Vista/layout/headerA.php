<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Midgard</title>
    <link rel="stylesheet" href="../Vista/css/style.css">
    <link rel="stylesheet" href="../Vista/css/index.css">
    <link rel="stylesheet" href="../Vista/css/Catalogo.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://kit.fontawesome.com/e674bba739.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div class="content">
            <div class="menu container">
                <!-- <a href="#" class="logo">logo</a> -->
                <img src="img/logo.png" class="logo"><a href="index.php"></a></img>
                <input type="checkbox" id="menu">
                <label for="menu">
                    <img src="../Vista/img/menu-hamburguesa.png" alt="" class="menu-icono">
                </label>
                

                <nav class="navbar">
                        
                    <ul>
                        
                        <li><a href="index.php">Inicio</a></li>
                        <li onclick="mostrarContenido('prop')">Propiedades <i class="fa-solid fa-house"></i></li>
                        <li onclick="mostrarContenido('facturas')">Facturas <i class="fa-solid fa-wallet"></i></li>
                        <li onclick="mostrarContenido('usuarios')">Usuarios <i class="fa-solid fa-user"></i></li>
                        <li>
                            <div class="user-info">
                                <div class="fotoperf">
                                    <?php if (!empty($imagen_base64)): ?>
                                        <img class="dropdown-btn rounded-image" src="data:imagen/jpeg;base64,<?php echo $imagen_base64; ?>" alt="Imagen de perfil">
                                        <div class="dropdown-content">
                                            <a href="../Vista/Miinfo.php"><box-icon name='user' ></box-icon>Mi Perfil</a>
                                            <a href="../Modelo/cerrarsesion.php"><box-icon name='exit'></box-icon>Cerrar Sesion </a>
                                        </div>
                                    <?php else: ?>
                                        <img src="img/user-image.png" alt="Yo poni mi imagen aki" class="rounded-image">
                                        <div class="dropdown-content">
                                            <a href="../Vista/Miinfo.php"><box-icon name='user' ></box-icon>Mi Perfil</a>
                                            <a href="../Modelo/cerrarsesion.php"><box-icon name='exit'></box-icon>Cerrar Sesion </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="idusuario">Hola, <?php echo $idUsuario; ?></div>
                            </div>
                        </li>
                        <div class="search-box">
                            <input type="text" placeholder="¿Que estas buscando?">
                            <button><i class="fa fa-search"></i></button>

                        </div>

                    </ul>
                </nav>
                

            </div>
        </div>
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
    </header>