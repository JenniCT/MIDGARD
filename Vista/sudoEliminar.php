<!--Estaba pensando en ponerlo en modelo-->
<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["tabla"]) && isset($_GET["id"])) {
    $config = require __DIR__ . '/../config.php';
    $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['database']);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $id = $_GET["id"];
    $tabla = $_GET["tabla"];
    $columna = "";

    switch ($tabla) {
        case "Propiedades":
            $columna = "IdPropiedad";
            break;
        case "Factura":
            $columna = "IdFactura";
            break;
        case "Usuario":
            $columna = "idUsuario";
            break;
        default:
            die("Error: Tabla no reconocida.");
    }

    $sql = "DELETE FROM $tabla WHERE $columna = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id);
    
    echo "Consulta SQL a ejecutar: $sql"; // Imprime la consulta para revisión

    if ($stmt->execute()) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Error al eliminar el registro: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-con" href="../../Complementos/USUARIO.png" />
    <link >
    <title>Eliminar registro</title>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Estilos personalizados para el título de la página */
        .titulo-pagina {
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            font-size: 32px; 
            text-align: center; 
            color: #fff;
            margin-top: 20px;   
            padding-top: 10%;
        }
        *{
            background-color: #072b47;
        }
        .card-title{
            color:white;
        }
    </style>
</head>
<body>
    <div>
        <main>
            <section>
                <h1 class="titulo-pagina">Eliminar registro</h1>
            </section>
            <section>
                <div class="container d-flex justify-content-center align-items-center" style="height: 50vh;">
                    <div class="card col-md-3">
                        <div class="card-body">
                            <h5 class="card-title">¿Estás seguro de que deseas eliminar este registro?</h5> <br><br>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                                <button type="submit" class="btn btn-danger">Sí, eliminar</button>
                                <a href="admin.php" class="btn btn-warning">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>

