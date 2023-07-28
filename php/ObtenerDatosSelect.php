<?php

include('conexionbd.php');



$valorSelect1 = $_GET['valorSelect1'];
$sqlEsp = "SELECT usuarios.id_usuarios as id, usuarios.nombre as nombre , usuarios.apellido as apellido from servicios JOIN especialidades ON especialidades.servicio_id = servicios.id JOIN usuarios on usuarios.id_usuarios = especialidades.usuario_id WHERE servicios.id = '$valorSelect1'";
$especialistas = $mysqli->query($sqlEsp);
// Realiza las consultas o cálculos necesarios para obtener los datos actualizados para el segundo select
// Guarda los datos en un array
//$arraySql = [$especialistas];

if ($especialistas->num_rows > 0) {
    // Crear un array para almacenar los datos
    $datos = array();

    // Recorrer los resultados y agregarlos al array
    while ($fila = $especialistas->fetch_assoc()) {
        $datos[] = $fila;
    }

    // Retornar los datos en formato JSON
    echo json_encode($datos);
} else {
    // No se encontraron resultados
    echo "No se encontraron resultados.";
}


// Devuelve los datos en formato JSON
//echo $arraySql;
//echo json_encode($especialistas);
//echo json_encode($arraySql);

?>