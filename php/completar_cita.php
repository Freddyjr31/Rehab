<?php

    session_start();

    if (($_SESSION['usuario']) == NULL  || $_SESSION['rol'] != 3 && $_SESSION['rol'] != 1) {
        session_destroy();
        header('Location: consulta.php');
    }
    include('conexionbd.php');

    $idcita = $_POST['idcita'];

    $sql = "UPDATE citas SET id_estatus = 4 WHERE id_cita = '$idcita'";
    $resultado = $mysqli->query($sql);

    if ($resultado === TRUE) {
        
        if( $_SESSION['rol'] == 3){
            echo "Cita completada correctamente";
            header('Location: trabajador.php?alert=Cita completada');
        }

        if( $_SESSION['rol'] == 1){
            echo "Cita completada correctamente";
            header('Location: admin.php?alert=Cita completada');
        }

    } else {
        echo "Error al completar la cita: " . $mysqli->error;
    }
?>