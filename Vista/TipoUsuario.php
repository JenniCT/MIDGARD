<!DOCTYPE html>
<html lang="es-Mex">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Tipo.css">
    <title>Tipo de Usuario</title>
</head>
<body>
    
    <div class="contenedor">
        <form action="../Controlador/DatosUsuarioC.php" method="post">
            <div class="grupo">
                <h1>Únase como comprador o vendedor</h1>
                <div class="tipos-container">
                    <div class="tipo">
                        <input class="form-check-input" type="radio" id="tipo1" name="tipo" value="1">
                        <label class="form-check-label" for="tipo1">¿Quiero vender?<br>
                            <p>Soy un vendedor, quiero poder vender/rentar mis inmuebles</p>
                        </label>
                        
                    </div>
                    <div class="tipo">
                        <input class="form-check-input" type="radio" id="tipo2" name="tipo" value="2">
                        <label class="form-check-label" for="tipo2">¿Quiero Comprar? <br>
                            <p>Soy un comprador, quiero poder comprar/rentar el mejor inmueble para mi</p>
                        </label>
                        
                    </div>
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
