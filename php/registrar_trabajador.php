<?php

    session_start();

    if (($_SESSION['usuario']) == NULL  || $_SESSION['rol'] != 1) {
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

    $nombre = validate($_POST['nombre']); 
    $apellido = validate($_POST['apellido']);
    $sexo = validate($_POST['sexo']);
    $cedula = validate($_POST['cedula']);
    $correo = validate($_POST['correo']);
    $dominio = validate($_POST['dominio']);
    $codigo_area = validate($_POST['codigo']);
    $telefono = validate($_POST['telefono']);
    $tipo = validate($_POST['tipo']);
    $password = validate($_POST['password']);
    $especialidades = $_POST['especialidades'];
    
    $sql = "SELECT * FROM correos INNER JOIN dominios ON id_dominio = correos.dominio_id WHERE correos.nombre_correo='$correo' AND dominios.id_dominio = '$dominio'";
    $resultado = $mysqli->query($sql);

    if ($resultado->num_rows > 0) {
        header('Location: admin.php?error=El correo electrónico ya está en uso');
    } else {
        $sql1 = "INSERT INTO correos (nombre_correo, dominio_id) VALUES ('$correo', '$dominio');";
        $mysqli->query($sql1);
        $idcorreo = mysqli_insert_id($mysqli);

        $sql2 = "INSERT INTO telefonos (numero, cod_id) VALUES ('$telefono', '$codigo_area');";
        $mysqli->query($sql2);
        $idtelefono = mysqli_insert_id($mysqli);

        $sql = "INSERT INTO usuarios (nombre, apellido, correo, Clave, id_telefono, sexo, cedula, rol_id, id_estatus_usuario) VALUES ('$nombre', '$apellido', '$idcorreo', '$password', '$idtelefono', '$sexo', '$cedula', '$tipo',1)";
        $usuario = $mysqli->query($sql);
        $idusuario = mysqli_insert_id($mysqli);

        foreach($especialidades as $especialidad){
            $sql3 = "INSERT INTO especialidades (usuario_id, servicio_id) VALUES ('$idusuario', '$especialidad')";
            $mysqli->query($sql3);
        }

        if ($usuario === TRUE) {
            header('Location: admin.php?alert=Usuario registrado correctamente');
        } else {
            echo "Error al registrar el usuario: " . $mysqli->error;
            header('Location: admin.php?alert=Error al registrar el usuario: ' . $mysqli->error);
        }
    }
?>