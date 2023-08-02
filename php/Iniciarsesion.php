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
        $dominio = validate($_POST['dominio']);

        if (empty($Usuario)) {
            header("Location: consulta.php?error=Se requiere el usuario");
            exit();
        }elseif (empty($Clave)) {
            header("Location: consulta.php?error=Se requiere la contraseña");
            exit();
        }else{

            // $Clave = md5($Clave);

            $sql = "SELECT * FROM usuarios INNER JOIN correos ON id_correo = usuarios.correo INNER JOIN dominios ON id_dominio = correos.dominio_id WHERE correos.nombre_correo = '$Usuario' AND usuarios.Clave='$Clave' AND dominios.id_dominio = '$dominio'";
            $result = mysqli_query($mysqli, $sql);

            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['nombre_correo'] === $Usuario && $row['Clave'] === $Clave) {
                    $_SESSION['usuario'] = $row['nombre_correo'];
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
