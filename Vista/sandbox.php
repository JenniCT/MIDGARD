<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página con Botones</title>
    <style>
        /* Estilos opcionales para los botones y el contenido */
        .boton {
            cursor: pointer;
            padding: 10px;
            margin: 5px;
            background-color: #ccc;
            border: 1px solid #aaa;
            border-radius: 5px;
        }
        .contenido {
            display: none; /* Ocultar por defecto el contenido */
            margin-top: 10px;
            padding: 10px;
            border: 1px solid #aaa;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <ul>
        <li class="boton" onclick="mostrarContenido('contenido1')">Botón 1</li>
        <li class="boton" onclick="mostrarContenido('contenido2')">Botón 2</li>
        <li class="boton" onclick="mostrarContenido('contenido3')">Botón 3</li>
    </ul>
    <div id="contenido1" class="contenido">Contenido 1</div>
    <div id="contenido2" class="contenido">Contenido 2</div>
    <div id="contenido3" class="contenido">Contenido 3</div>

    <script>
        function mostrarContenido(idContenido) {
            var contenidos = document.querySelectorAll('.contenido'); // Obtener todos los elementos con clase 'contenido'
            contenidos.forEach(function(contenido) {
                contenido.style.display = 'none'; // Ocultar todos los contenidos
            });
            var contenidoMostrar = document.getElementById(idContenido); // Obtener el contenido a mostrar
            if (contenidoMostrar) {
                contenidoMostrar.style.display = 'block'; // Mostrar el contenido correspondiente al botón presionado
            }
        }
    </script>
</body>
</html>
