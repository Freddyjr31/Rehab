<?php

    session_start();

    if (($_SESSION['usuario']) == NULL  || $_SESSION['rol'] != 2) {
        session_destroy();
        header('Location: consulta.php');
    }
    include('conexionbd.php');

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $cliente = $_SESSION['id'];
    $servicio = validate($_POST['servicio']); 
    $especialista = validate($_POST['especialista']);
    $fecha = validate($_POST['fechaCita']);
    $hora = validate($_POST['horaCita']);

    $fecha_actual = date('Y-m-d');

    //$sql = "SELECT * FROM citas WHERE fecha='$fecha' AND hora = '$hora' AND id_trabajador = '$especialista' AND id_estatus NOT IN(3,4,5)";
    $sql = "SELECT * FROM citas WHERE fecha='$fecha' AND hora = '$hora' AND id_estatus NOT IN(3,4,5)";
    $resultado = $mysqli->query($sql);

    $sql1 = "SELECT * FROM especialidades WHERE usuario_id='$especialista' AND servicio_id = '$servicio'";
    $servicios = $mysqli->query($sql1);

    if ($fecha < $fecha_actual){
        header("Location: usuario.php?error=La fecha ingresada es incorrecta");
    }elseif ($resultado->num_rows > 0) {
        header("Location: usuario.php?error=Ya se ha agendado una cita con el mismo especialista a la misma fecha y hora");
    }elseif($servicios->num_rows == 0){
        header("Location: usuario.php?error=El usuario que ha seleccionado no realiza el servicio que desea, por favor intente de nuevo");
    }else {
        $sql2 = "INSERT INTO citas (id_cliente, id_trabajador, fecha, hora, id_estatus, id_servicio) VALUES ('$cliente', '$especialista', '$fecha', '$hora', 1, '$servicio');";
        if ($mysqli->query($sql2) === TRUE) {
            echo "Cita creada correctamente";
            header('Location: usuario.php?alert=Su cita se ha creado correctamente');
        } else {
            echo "Error al crear la cita: " . $mysqli->error;
            header('Location: usuario.php?error=Su cita no se ha creado, disculpe los inconvenientes');
        }
    }
?>