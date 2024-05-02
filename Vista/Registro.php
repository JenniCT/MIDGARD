<!-- =================== register-form =================== -->
<form action="" method="post" enctype="multipart/form-data">
    <?php
        include "../Modelo/registrarUsuario.php";
    ?>
    <div class="register-form">
        <div class="form-title">
            <span>Registrate</span>
        </div>
        <div class="form-inputs">
            <div class="input-box mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="input-field form-control" maxlength="50" required>
                <i class='bx bx-user icon'></i>
            </div>
            <div class="input-box mb-3">
                <label for="aPaterno" class="form-label">Apellido Paterno:</label>
                <input type="text" id="aPaterno" name="aPaterno" class="input-field form-control" maxlength="50" required>
                <i class='bx bx-user icon'></i>
            </div>
            <div class="input-box mb-3">
                <label for="aMaterno" class="form-label">Apellido Materno:</label>
                <input type="text" id="aMaterno" name="aMaterno" class="input-field form-control" maxlength="50" required>
                <i class='bx bx-user icon'></i>
            </div>
            <div class="input-box mb-3">
                <label for="correo" class="form-label">Correo electrónico:</label>
                <input type="email" id="correo" name="correo" class="input-field form-control" maxlength="50" required>
                <i class='bx bx-envelope icon'></i>
            </div>
            <div class="input-box mb-3">
                <label for="contraseña" class="form-label">Contraseña:</label>
                <input type="password" id="contraseña" name="contrasena" class="input-field form-control" maxlength="16" required>
                <i class='bx bx-lock-alt icon'></i>
            </div>
            <div class="input-box mb-3">
                <label for="telefono" class="form-label">Teléfono:</label>
                <input type="number" id="telefono" name="telefono" class="input-field form-control" pattern="\[0-9\]{10}" required>
                <i class='bx bx-phone icon'></i>
            </div>
            <div class="input-box mb-3">
                <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento:</label>
                <input type="date" id="fechaNacimiento" name="fechaNacimiento" class="input-field form-control" required>
                <!-- <i class='bx bx-calendar icon'></i> -->
            </div>
            <div class="input-box mb-3 ">
                <input class="files"  type="file" name="imagen" id="">
            </div>
            <div class="input-box text-center">
                <button type="submit" class="input-submit btn btn-primary btn-block">
                    <span>Registrar</span>
                    <i class="bx bx-right-arrow-alt"></i>
                </button>
            </div>
        </div>
    </div>
</form>