<!-- login-form.php -->
<form action="../Controlador/SesionC.php" method="post">
    
    <div class="login-form">
        <div class="form-title">
            <span>Inicio de sesión</span>
        </div>
        <div class="form-inputs">
            <div class="input-box mb-3">
                <label for="correo" class="form-label">Correo electrónico:</label>
                <input type="email" id="correo" name="correoL" class="input-field form-control" required>
                <i class='bx bx-envelope icon'></i>
            </div>
            <div class="input-box mb-3">
                <label for="contrasena" class="form-label">Contraseña:</label>
                <input type="password" id="contraseña" name="contrasenaL" class="input-field form-control" required>
                <i class='bx bx-lock-alt icon'></i>
            </div>
            <div class="input-box text-center mb-3">
                <button type="submit" class="input-submit btn btn-primary btn-block">
                    <span>Acceder</span>
                    <i class="bx bx-right-arrow-alt"></i>
                </button>
            </div>
        </div>
        <!-- Área para mostrar mensajes -->
        <div class="message">
            <?php
            if (isset($_GET['error'])) {
                $error = $_GET['error'];
                if ($error === 'password') {
                    echo "<p>Contraseña incorrecta</p>";
                } elseif ($error === 'email') {
                    echo "<p>El correo proporcionado no existe</p>";
                }
            }
            ?>
        </div>
    </div>
</form>
