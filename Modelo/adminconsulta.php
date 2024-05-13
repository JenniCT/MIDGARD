<?php
// Archivo de conexión a la BD
include("../Controlador/conexion.php");

// Función para mostrar los datos de la tabla
function consulta($tabla) {
    global $conn;
    $consulta = "SELECT * FROM " . mysqli_real_escape_string($conn, $tabla);

    // Hace la consulta
    $resultado = mysqli_query($conn, $consulta);
    $arreglo_resultados = array();

    if ($resultado) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $arreglo_resultados[] = $fila;
        }
    } else {
        echo "Error: " . $consulta . "<br>" . mysqli_error($conn);
    }
    
    return $arreglo_resultados;
}
