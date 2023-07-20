<?php

    session_start();

    if (($_SESSION['usuario']) == NULL) {
        header('Location: consulta.php');
    }
    include('conexionbd.php');

    $idusuario = $_POST['idusuario'];
    $estatus = $_POST['estatus'];

    $sql = "UPDATE usuarios SET id_estatus_usuario = '$estatus' WHERE id_usuarios = '$idusuario'";
    $resultado = $mysqli->query($sql);

    if ($resultado === TRUE) {
        header('Location: admin.php?alert=Usuario actualizado correctamente');
    } else {
        header('Location: admin.php?error=Error al actualizar usuario: ' . $mysqli->error);
    }
?>