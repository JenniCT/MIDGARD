<?php
require('../Vista/layout/header.php');
?>

    <Section class="section head">
        <div class="header-text">
            <p>Haciendo Sueños Realidad</p>
            <h1>Bienvenido a<span> Midgard</span><br>Inmoviliarias</h1>
        </div>
    </Section>

    <div id="about">
        <div class="container">
            <div class="row">
                <div class="about-col-1">
                    <img src="images/user.png">
                </div>
                <div class="about-col-2">
                <h1 class="sub-title">Sobre Midgard</h1>
<p>Midgard es una agencia inmobiliaria líder en el mercado, especializada en la compra, venta y alquiler de propiedades residenciales y comerciales. Nos enorgullecemos de ofrecer un servicio excepcional a nuestros clientes, brindando soluciones personalizadas que satisfacen sus necesidades únicas.</p>
<p>Nuestro equipo de agentes altamente capacitados cuenta con años de experiencia en el sector inmobiliario y posee un profundo conocimiento del mercado local. Nos comprometemos a guiarlo a través de cada paso del proceso, desde la evaluación inicial hasta el cierre exitoso de la transacción.</p>
<p>En Midgard, entendemos que cada propiedad es única, por lo que nos esforzamos por proporcionar estrategias de venta innovadoras y efectivas que maximicen el valor de su inversión. Ya sea que esté buscando comprar su hogar soñado o vender una propiedad, estamos aquí para ayudarlo a alcanzar sus objetivos inmobiliarios.</p>

                        <div class="tab-titles">
    <p class="tab-links active-link" onclick="openTab('skills')">Agentes</p>
    <p class="tab-links" onclick="openTab('experience')">Propiedades Vendidas</p>
    <p class="tab-links" onclick="openTab('education')">Estrategias de Venta</p>
</div>
<div class="tab-contents active-tab" id="skills">
    <ul>
        <li><span>José García</span><br>Experto en bienes raíces comerciales</li>
        <li><span>María López</span><br>Conocedora del mercado residencial</li>
        <li><span>Luis Martínez</span><br>Especialista en propiedades de lujo</li>
    </ul>
</div>
<div class="tab-contents" id="experience">
    <ul>
        <li><span>2021 - Presente</span><br>Condominio de lujo en la playa - Vendido en 3 semanas</li>
        <li><span>2019-2021</span><br>Complejo residencial en el centro de la ciudad - Vendido al 98% de su valor de mercado</li>
        <li><span>2017-2019</span><br>Propiedad histórica - Vendida a un coleccionista privado</li>
    </ul>
</div>
<div class="tab-contents" id="education">
    <ul>
        <li><span>2016</span><br>Curso de Negocios Inmobiliarios</li>
        <li><span>2015</span><br>Diplomado en Marketing Inmobiliario</li>
        <li><span>2014</span><br>Curso de Valuación de Propiedades</li>
    </ul>
</div>
                </div>
            </div>
        </div>
    </div>
<?php
require('../Vista/layout/footer.php');
?>


