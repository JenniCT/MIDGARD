<!DOCTYPE html>
<html lang="es">
<head> <!--REDIR-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirigiendo...</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <style> /*Override de Bootstrap, no sé cómo se dice override en español ajkskska*/
        *{
            background-color: rgb(37, 41, 44);
        }
        body{
            background-color: rgb(37, 41, 44);
        }
        .card-title{
            color: white;
            text-align: center;
        }
        .card{
            margin: 5%;
            border-color: turquoise;
            border-width: 0.75vh;
        }
    </style>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Redirigiendo a la página principal</h5>
            </div>
        </div>
    </div>
	<script>
        window.location.href = "Vista/index.php";
    </script>
</body>
</html>