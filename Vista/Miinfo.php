
<?php

require('../Vista/layout/BarraLateral.php');

if (isset($_SESSION['mensaje'])) {
    echo "<script>alert('".$_SESSION['mensaje']."');</script>";
    unset($_SESSION['mensaje']); // Limpiar el mensaje después de mostrarlo
}
?>
    <!-- Parte de adentro donde esta el formulario-->
    <div class="Adentro">
        <div class="container">
            <h2>Mi informacion</h2>
            <form action="editar.php" method="post">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 login-container">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo isset($Usuario['Nombre']) ? $Usuario['Nombre'] : ''; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="aPaterno" class="form-label">Apellido Paterno</label>
                                <input type="text" class="form-control" id="aPaterno" name="aPaterno" value="<?php echo isset($Usuario['aPaterno']) ? $Usuario['aPaterno'] : ''; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="aMaterno" class="form-label">Apellido Materno</label>
                                <input type="text" class="form-control" id="aMaterno" name="aMaterno" value="<?php echo isset($Usuario['aMaterno']) ? $Usuario['aMaterno'] : ''; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="correo" name="correo" value="<?php echo isset($Usuario['Correo']) ? $Usuario['Correo'] : ''; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo isset($Usuario['Telefono']) ? $Usuario['Telefono'] : ''; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="fchNacimiento" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="fchNacimiento" name="fchNacimiento" value="<?php echo isset($Usuario['FchNacimiento']) ? $Usuario['FchNacimiento'] : ''; ?>" required>
                            </div>
                            <button type="submit" class="btn btn-dark">Actualizar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>