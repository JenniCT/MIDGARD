<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipo de Usuario</title>
</head>
<body>
    <div>
        <h1>Seleccione su tipo de usuario</h1>
        <!-- Formulario al usuario -->
        <form action="../Controlador/DatosUsuarioC.php" method="post">
            <div class="input-box mb-3">
                <label class="form-label">Tipo de Usuario:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="tipo1" name="tipo" value="1">
                    <label class="form-check-label" for="tipo1">¿Quiero vender?</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="tipo2" name="tipo" value="2">
                    <label class="form-check-label" for="tipo2">¿Quiero Comprar?</label>
                </div>
                <div class="input-box text-center">
                    <button type="submit" class="input-submit btn btn-primary btn-block">
                        <span>Registrar</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
