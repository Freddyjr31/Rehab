<?php

    session_start();

    if (($_SESSION['usuario']) == NULL  || $_SESSION['rol'] != 3) {
        session_destroy();
        header('Location: consulta.php');
    }
    include('conexionbd.php');

    $idcita = $_POST['idcita'];

    $sql = "UPDATE citas SET id_estatus = 4 WHERE id_cita = '$idcita'";
    $resultado = $mysqli->query($sql);

    if ($resultado === TRUE) {
        echo "Cita completada correctamente";
        header('Location: trabajador.php');
    } else {
        echo "Error al completar la cita: " . $mysqli->error;
    }
?>