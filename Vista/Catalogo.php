<?php
require('../Vista/layout/header.php');
?>

<div class="containercasa">
            <section class="grid_cards">
                <article class="card_ui">
                    <div class="car_header">
                        <div class="car_header_status">
                            <div class="status_disponibility status_available">
                                <span>Disponible</span> 
                            </div>
                        </div>
                    </div>
                    <div class="car_body">
                        <div class="car_body_img_container">
                            <a href="#" class="car_img_content_link">
                                <figure class="car_img_content">
                                    <img src="../Vista/img/fondo1.jpg" alt="Ford Focus"> <!-- Poner aqui foto de la casa -->
                                </figure>
                            </a>
                        </div>
                        <div>
                            <p class="car_name">Colonia de la casa </p>
                            <div class="car_price_container">
                                <a href="#" class="car_model_link">
                                    <h2 class="car_model" title="FOCUS">Nombre de la casa</h2>
                                </a>
                                <p class="car_price">$500.00</p> <!-- Precio de la casa -->
                            </div>
                        </div>
                    </div>
                    <div class="car_footer">
                        <ul class="car_list_characteristics">
                            <li>
                                <i class="fas fa-sliders-h"></i>
                                <span title="Manual">Baños Poner aqui</span>
                            </li>
                            <li>
                                <i class="fas fa-tachometer-alt"></i>
                                <span title="Kilometraje ilimitado">Habitaciones Poner aqui</span>
                            </li>
                            <li>
                                <i class="fas fa-user"></i>
                                <span title="5">Matros Cuadrados Poner aqui</span>
                            </li>
                        </ul>
                    </div>
                </article>
            </section>
        </div>

<?php
require('../Vista/layout/footer.php');
?>


