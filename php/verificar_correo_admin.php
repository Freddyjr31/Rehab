<?php

include('conexionbd.php');

$correo = $_GET['correo'];
$dominio = $_GET['dominio'];

$sql = "SELECT COUNT(*) as total FROM correos INNER JOIN dominios ON id_dominio = correos.dominio_id WHERE correos.nombre_correo='$correo' AND dominios.id_dominio = '$dominio'";
$resultado = $mysqli->query($sql);

// Verificar si se obtuvieron resultados
if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    $total = $fila['total'];

    if ($total > 0) {
        // El correo electrónico ya está registrado
        echo "El correo electrónico ya está registrado.";
    } else {
        // El correo electrónico está disponible
        echo "El correo electrónico está disponible.";
    }
} else {
    echo "else if";
}

