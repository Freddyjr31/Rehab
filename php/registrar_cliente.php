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
    $correo = validate($_POST['correo']);
    $telefono = validate($_POST['telefono']);
    $sexo = validate($_POST['sexo']);
    $password = validate($_POST['password']);

    $sql = "SELECT * FROM usuarios WHERE correo_usuario='$correo'";
    $resultado = $mysqli->query($sql);

    if ($resultado->num_rows > 0) {
        echo "El correo electrónico ya está registrado";
    } else {
    
        $sql = "INSERT INTO usuarios (nombre, apellido, correo_usuario, Clave, telefono, sexo, rol_id, id_estatus_usuario) VALUES ('$nombre', '$apellido', '$correo', '$password', '$telefono', '$sexo', 2,1)";
        if ($mysqli->query($sql) === TRUE) {
            echo "Usuario registrado correctamente";
            header('Location: consulta.php');
        } else {
            echo "Error al registrar el usuario: " . $conn->error;
        }
    }
    ?>