<?php

include('conexionbd.php');

$codigo = $_GET['codigo'];
$telf = $_GET['telefono'];

$sql = "SELECT COUNT(*) as total FROM telefonos INNER JOIN cod_area ON cod_area.id_cod = telefonos.cod_id WHERE cod_area.id_cod = '$codigo' AND telefonos.numero = '$telf' ";
$resultado = $mysqli->query($sql);

// Verificar si se obtuvieron resultados
if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    $total = $fila['total'];

    if ($total > 0) {
        // El correo electrónico ya está registrado
        echo "El N° teléfono ya está registrado.";
    } else {
        // El correo electrónico está disponible
        echo "El N° teléfono está disponible.";
    }
} else {
    echo "else if";
}

