<?php

    session_start();

    if (($_SESSION['usuario']) == NULL) {
        header('Location: consulta.php');
    }
    include('conexionbd.php');

    $idcita = $_POST['idcita'];

    $sql = "UPDATE citas SET id_estatus = 5 WHERE id_cita = '$idcita'";
    $resultado = $mysqli->query($sql);

    if ($resultado === TRUE) {
        echo "Cita cancelada correctamente";
        header('Location: usuario.php');
    } else {
        echo "Error al cancelar la cita: " . $mysqli->error;
    }
?>