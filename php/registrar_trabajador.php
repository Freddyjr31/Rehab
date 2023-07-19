<?php
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
    
    $sql = "SELECT * FROM correos INNER JOIN dominios ON id_dominio = correos.dominio_id WHERE correos.nombre_correo='$correo' AND dominios.id_dominio = '$dominio'";
    $resultado = $mysqli->query($sql);

    if ($resultado->num_rows > 0) {
        echo "El correo electrónico ya está registrado";
    } else {
        echo $tipo;
        $sql1 = "INSERT INTO correos (nombre_correo, dominio_id) VALUES ('$correo', '$dominio');";
        $idcorreo = $mysqli->query($sql1);

        $sql2 = "INSERT INTO telefonos (numero, cod_id) VALUES ('$telefono', '$codigo_area');";
        $idtelefono = $mysqli->query($sql2);

        $sql = "INSERT INTO usuarios (nombre, apellido, correo, Clave, id_telefono, sexo, cedula, rol_id, id_estatus_usuario) VALUES ('$nombre', '$apellido', '$idcorreo', '$password', '$idtelefono', '$sexo', '$cedula', '$tipo',1)";
        if ($mysqli->query($sql) === TRUE) {
            echo "Usuario registrado correctamente";
            header('Location: admin.php');
        } else {
            echo "Error al registrar el usuario: " . $mysqli->error;
        }
    }
?>