<?php   
    session_start();
    include('conexionbd.php');

    if (isset($_POST['Usuario']) && isset($_POST['Clave']) ) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $Usuario = validate($_POST['Usuario']); 
    $Clave = validate($_POST['Clave']);

    if (empty($Usuario)) {
        header("Location: consulta.php?error=Se requiere el usuario");
        exit();
    }elseif (empty($Clave)) {
        header("Location: consulta.php?error=Se requiere la contraseña");
        exit();
    }else{

        // $Clave = md5($Clave);

        $sql = "SELECT * FROM usuarios WHERE correo_usuario = '$Usuario' AND Clave='$Clave'";
        $result = mysqli_query($mysqli, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['correo_usuario'] === $Usuario && $row['Clave'] === $Clave) {
                $_SESSION['usuario'] = $row['correo_usuario'];
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['apellido'] = $row['apellido'];
                $_SESSION['id'] = $row['id_usuarios'];

                if ($row['rol_id'] == 1){
                    header("Location: admin.php");
                }elseif ($row['rol_id'] == 2){
                    header("Location: usuario.php");
                }elseif ($row['rol_id'] == 3){
                    header("Location: trabajador.php");
                }
                
                exit();
            }else {
                header("Location: consulta.php?error=El usuario o la clave son incorrectas");
                exit();
            }

        }else {
            header("Location: consulta.php?error=El usuario o la clave son incorrectas");
            exit();
        }
    }

} else {
    header("Location: consulta.php");
            exit();
}
