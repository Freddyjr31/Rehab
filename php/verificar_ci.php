<?php

include('conexionbd.php');

$cedula = $_GET['cedula'];

$sql = "SELECT COUNT(*) as total FROM usuarios WHERE usuarios.cedula = '$cedula' ";
$resultado = $mysqli->query($sql);

// Verificar si se obtuvieron resultados
if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    $total = $fila['total'];

    if ($total > 0) {
        // El correo electrónico ya está registrado
        echo "El N° de cedula ya está registrado.";
    } else {
        // El correo electrónico está disponible
        echo "El N° de cedula está disponible.";
    }
} else {
    echo "else if";
}

