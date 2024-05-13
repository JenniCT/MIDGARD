<?php
include "../Modelo/verificacionTipoImg.php";
include '../Controlador/DatosUsuarioC.php';
?>
<!DOCTYPE html>
<html lang="es-Mex">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis propiedades</title>
    <link rel="stylesheet" href="../Vista/css/propiedades.css">
    <script src="https://kit.fontawesome.com/e674bba739.js" crossorigin="anonymous"></script>
</head>
<body>
<?php
    include '../Controlador/PropiedadesC.php';
    $propiedades = ControladorPropiedades::PropiedadesNoDis();
?>
    <section>
    <div class="propiedades">
        <div class="containercasa">
            <div class="grid_cards">
                <?php 
                    foreach ($propiedades as $propiedad): 
                        // Acceder a los datos de la propiedad
                        $Estado = $propiedad['Estado'];
                        $IdPropiedad = $propiedad['IdPropiedad'];
                        $Banos = $propiedad ['NoBanos'];
                        $Precio = $propiedad ['Precio'];
                        $vendedor = $propiedad ['IdVendedor'];
                        $Disponible = $propiedad ['Disponibilidad'];
                ?>
                <article class="card_ui">
                    <div class="car_header">
                        <div class="car_header_status">
                            <div class="status_disponibility status_available">
                                <span><?php echo $Disponible ?></span> 
                            </div>
                        </div>
                    </div>
                    <div class="car_body">
                        <div class="car_body_img_container">
                            <a href="" class="car_img_content_link">
                                <figure class="car_img_content">
                                <img src="data:image/jpeg;base64,<?php echo $propiedad['imagen_base64']; ?>" alt="Imagen de perfil">

                                </figure>
                            </a>
                        </div>
                        <div>
                            <p class="car_name">Estado: <?php echo $Estado; ?> </p>
                            <div class="car_price_container">
                                <a href="#" class="car_model_link">
                                    <h2 class="car_model" title="FOCUS"><?php echo  $IdPropiedad; ?></h2>
                                </a>
                                <p class="car_price">$<?php echo $Precio; ?></p> <!-- Precio de la casa -->
                            </div>
                        </div>
                    </div>
                    <div class="car_footer">
                        <ul class="car_list_characteristics">
                            <li>
                                <i class="fas fa-sliders-h"></i>
                                <span title="Manual">Baños <?php echo $Banos; ?></span>
                            </li>
                            <li>
                                <i class="fas fa-tachometer-alt"></i>
                                <span title="Kilometraje ilimitado">Habitaciones Poner aqui</span>
                            </li>
                            <li>
                                <i class="fas fa-user"></i>
                                <span title="5"><?php echo $vendedor; ?></span>
                            </li>
                        </ul>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
            
        </div>
    </section>
</body>
</html>
