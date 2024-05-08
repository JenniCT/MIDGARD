<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Propiedad</title>
</head>
<body>
    <h2>Agregar Propiedad</h2>
    <form action="../Controlador/PropiedadesC.php" method="POST" enctype="multipart/form-data">
        <label for="tipo">Tipo:</label>
        <input type="text" name="tipo"><br>
        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion"><br>
        <label for="estado">Estado:</label>
        <input type="text" name="estado"><br>
        <label for="pais">País:</label>
        <input type="text" name="pais"><br>
        <label for="capacidad">Capacidad:</label>
        <input type="number" name="capacidad"><br>
        <label for="habitaciones">Número de Habitaciones:</label>
        <input type="number" name="habitaciones"><br>
        <label for="banos">Baños:</label>
        <input type="number" name="banos"><br>
        <label for="tamano">Tamaño:</label>
        <input type="number" name="tamano"><br>
        <label for="precio">Precio:</label>
        <input type="number" name="precio"><br>
        <label for="servicios">Servicios:</label>
        <input type="text" name="servicios"><br>
        <label for="condicion">Condición:</label>
        <input type="text" name="condicion"><br>
        <label for="caracteristicas">Características:</label>
        <input type="text" name="caracteristicas"><br>
        <label for="disponibilidad">Disponibilidad:</label>
        <input type="text" name="disponibilidad"><br>
        <label for="contrato">Contrato:</label>
        <input type="text" name="contrato"><br>
        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen"><br>
        <button type="submit">Agregar Propiedad</button>
    </form>
</body>
</html>
