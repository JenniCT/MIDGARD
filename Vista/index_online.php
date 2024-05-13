<?php
include "../Modelo/verificacionTipoImg.php";
    
?>
    <Section>
        <div class="header-text">
            <p>Haciendo Sueños Realidad</p>
            <h1>Bienvenido a<span> Midgard</span><br>Inmoviliarias</h1>
        </div>
    </Section>
    <!-- ----------SERVICES---------- -->
    <div id="services">
        <div class="container">
            <h1 class="sub-title">Nuestros Servicios</h1>
            <div class="services-list">
                <div>
                    <i class="fa-solid fa-info"></i>
                    <h2>Informacion</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore aliquam nam sit. Soluta quasi
                        officia, alias vitae fugiat fuga exercitationem.</p>
                    <a href="#">Learn more</a>
                </div>
                <div>
                    <i class="fa-regular fa-calendar"></i>
                    <h2>Reservaciones</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore aliquam nam sit. Soluta quasi
                        officia, alias vitae fugiat fuga exercitationem.</p>
                    <a href="#">Learn more</a>

                </div>
                <div>
                    <i class="fa-solid fa-city"></i>
                    <h2>Catalogo</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore aliquam nam sit. Soluta quasi
                        officia, alias vitae fugiat fuga exercitationem.</p>
                    <a href="#">Learn more</a>
                </div>
                <div>

                    <i class="fa-solid fa-business-time"></i>
                    <h2>Fechas</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore aliquam nam sit. Soluta quasi
                        officia, alias vitae fugiat fuga exercitationem.</p>
                    <a href="#">Learn more</a>
                </div>
            </div>
        </div>
    </div>

    <!-------------PORTFOLIO------------>
    <div id="portfolio">
        <div class="container">
            <h1 class="sub-title">Los Mas populares</h1>
            <div class="work-list">
                <div class="work">
                    <img src="https://github.com/J0NAS0SANCHEZ/MIDGARD_PROYECT/blob/main/Vista/img/Casa1.jpeg?raw=true" alt="">
                    <div class="layer">
                        <h2>Las mejores casas</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat quam facere quibusdam
                            deserunt dolore vero. Incidunt ea nihil sint. Velit.</p>
                        <a href="#"><i class="fas fa-external-link-alt"></i></a>
                    </div>
                </div>
                <div class="work">
                    <img src="https://github.com/J0NAS0SANCHEZ/MIDGARD_PROYECT/blob/main/Vista/img/Playa1.jpeg?raw=true" alt="">
                    <div class="layer">
                        <h2>Frente a la playa</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat quam facere quibusdam
                            deserunt dolore vero. Incidunt ea nihil sint. Velit.</p>
                        <a href="#"><i class="fas fa-external-link-alt"></i></a>
                    </div>
                </div>
                <div class="work">
                    <img src="https://github.com/J0NAS0SANCHEZ/MIDGARD_PROYECT/blob/main/Vista/img/Estudiantes1.jpeg?raw=true" alt="">
                    <div class="layer">
                        <h2>Para Estudiantes</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat quam facere quibusdam
                            deserunt dolore vero. Incidunt ea nihil sint. Velit.</p>
                        <a href="#"><i class="fas fa-external-link-alt"></i></a>
                    </div>
                </div>
            </div>
            <a href="" class="btn">See more</a>
        </div>
    </div>
    
<?php
require('layout/footer.php');
?>