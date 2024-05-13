
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descripción de la Casa</title>
    <!-- Enlace al archivo CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    
</head>
<body>
    
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-md-8">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/c1.jpg" class="d-block w-100" alt="Foto de la casa">
                        </div>
                        <div class="carousel-item">
                            <img src="img/c11.jpg" class="d-block w-100" alt="Foto de la casa">
                        </div>
                        <div class="carousel-item">
                            <img src="img/c111.jpg" class="d-block w-100" alt="Foto de la casa">
                        </div>
                        <!-- Agrega más imágenes según sea necesario -->
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <h2 class="mt-4">Descripción:</h2>
                <p><p>"Encantadora casa de una planta en venta en el fraccionamiento Los Laureles, frente al parque. Recién remodelada y lista para estrenar, cuenta con 3 amplias habitaciones, cada una con baño completo y closet. Ofrece un espacioso ambiente que incluye sala, comedor, recibidor, ante comedor y medio baño de visitas. Además, tiene estacionamiento para 4 autos con portones eléctricos, cuarto de servicio con baño, área de lavado, amplios jardines, terraza y bodega. Disfruta de un entorno encantador junto al parque y una distribución que garantiza una agradable luminosidad y ventilación en toda la casa. Documentación en orden y lista para escriturar. ¡Agenda tu cita hoy y haz realidad tu sueño de tener un hogar propio!"</p></p>
            </div>
                <div class="col-md-4">
                    <figure class="text-center">
                        <blockquote class="blockquote">
                            <p>Casa 1</p>
                        </blockquote>
                        <figcaption class="blockquote-footer">
                            "Midgard: <cite title="Source Title"> Donde tus sueños encuentran hogar." </cite>
                        </figcaption>
                    </figure>
                    
            <!-- Panel de opciones de compra -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Opciones de Compra</h5>
                    <p class="card-text">Precio: $500,000</p>
                    <!-- Botones de agregar al carrito y comprar -->
                    <div class="d-grid gap-2">
                        <button class="btn btn-dark" type="button" onclick="buyNow()">Comprar</button>
                    </div>
                    <!-- Botón de contacto -->
                    <button class="btn btn-secondary mt-3 mx-auto d-block" type="button" onclick="contactMe()">Contactarme</button>
                </div>
                
            </div>
            <div class="container mt-3">
                <div class="row">
                    <div class="col-md-4">
                        <h2 class="text-center">Servicios:</h2>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-house-fill"></i> 3 Rec.</li>
                            <li><i class="bi bi-house-gear-fill"></i> 3 Baños</li>
                            <li><i class="bi bi-house-gear-fill"></i> 1 Medio baño</li>
                            <li><i class="bi bi-rulers"></i> 350 m²</li>
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>
            <div class="col-md-4">
                <h2>Ubicación:</h2>
                <p>Descripción de la ubicación de la casa.</p>
                <h2>Características Generales</h2>
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th scope="row">Tipo de anuncio</th>
                            <td>Venta</td>
                        </tr>
                        <tr>
                            <th scope="row">Tipo de propiedad</th>
                            <td>Casa</td>
                        </tr>
                        <tr>
                            <th scope="row">Habitaciones</th>
                            <td>3</td>
                        </tr>
                        <tr>
                            <th scope="row">Baños</th>
                            <td>3</td>
                        </tr>
                        <tr>
                            <th scope="row">Medio baño</th>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th scope="row">Superficie construida</th>
                            <td>450m²</td>
                        </tr>
                        <tr>
                            <th scope="row">Superficie del terreno</th>
                            <td>450 m²</td>
                        </tr>
                        <tr>
                            <th scope="row">Año de construcción</th>
                            <td>2023</td>
                        </tr>
                        <tr>
                            <th scope="row">Estado</th>
                            <td>Nuevo</td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
    <!-- Sección de Otros Servicios -->
    
    <!-- Enlace al archivo JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
