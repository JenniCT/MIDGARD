<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Midgard</title>
    <link rel="stylesheet" href="../Vista/css/style.css">
    <link rel="stylesheet" href="../Vista/css/index.css">
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
                        <li><a href="#">Propiedades</a></li>
                        <li><a href="#">Usuarios</a></li>
                        <li><a href="#">Ventas</a></li>
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
    </header>