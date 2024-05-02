

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Vista/css/SesionRegistro.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Inicia Sesion / Registate</title>
</head>

<body>
    <div class="form-containet">
        <div class="col col-1">
            <div class="image-layer">
                <img src="img/house-cartoon-style-illustration-ai-generated-vector-removebg-preview.png" class="form-image-main fi-2">
                <img src="img/cloud.png" class="form-image-1 fi-1">
                <img src="img/cloud.png" class="form-image-2 fi-1">
                <img src="img/cloud.png" class="form-image-3 fi-1">
            </div>
            <p class="featured-words">Midgard <span> Creando Sueños </span> <br> Midgard 5J </p>
        </div>
        <div class="col col-2">
            <div class="btn-box">
                <button class="btn btn-1" id="login">inicia Sesion</button>
                <button class="btn btn-2" id="register">Registrate</button>
            </div>
            <!-- =================== login-form =================== -->
            <?php
                include "Sesion.php";
            ?>
            <!-- =================== register-form =================== -->
            <?php
                include "Registro.php";
            ?>
    <script src="../Vista/js/SesionRegistro.js"></script>
</body>

</html>