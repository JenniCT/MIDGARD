<?php
    include '../Vista/layout/header.php';
?>

    <Section class="section head">
        <div class="header-text">
            <p>Haciendo Sueños Realidad</p>
            <h1>Bienvenido a<span> Midgard</span><br>Inmoviliarias</h1>
        </div>
    </Section>

<div id="contact">
        <div class="container">
            <div class="row">
                <div class="contact-left">
                    <h1 class="sub-title">Contactanos</h1>
                    <p><i class="fas fa-paper-plane"></i> example@gmail.com</p>
                    <p><i class="fas fa-phone-square-alt"></i> 1234567890</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter-square"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="contact-right">
                    <form>
                        <input type="text" name="Name" placeholder="Nombre" required>
                        <input type="email" name="Email" placeholder="Correo electronico" required>
                        <textarea name="Message" rows="6" placeholder="¿Como Podemos ayudarte?"></textarea>
                        <button type="submit" class="btn btn3">Contactame</button>
                    </form>
                </div>
            </div>
        </div>

<?php
require('../Vista/layout/footer.php');
?>


