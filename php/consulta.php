<?php
include('conexionbd.php');

$sql5 = "SELECT * FROM dominios";
$dominios = $mysqli->query($sql5);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>ConsultaLogin</title>
    <link rel="icon" type="image/png" href="../img/icons/RSB_Icon2.png">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/styles.css'>
    <link rel='stylesheet' href='../css/home.css'>
    <link rel="stylesheet" href="../css/ConsultaLogin.css">
    <link rel="stylesheet" href="../assets/bootstrap/bootstrap.min.css">

</head>

<body class="body">

    <header>
        <div class="wrapper">
            <div class="logo">
                <img src="../img/RSB.png" class="mt-2" width="150px" height="auto" alt="">
            </div>
            <nav>
                <a class="text-decoration-none text-reset" href="../index.php" ;>Inicio</a>
                <a class="text-decoration-none text-reset" href="../html/nosotros.html">Nosotros</a>
                <a class="text-decoration-none text-reset" href="../html/servicios.html">Servicios</a>
                <a class="text-decoration-none text-reset" href="../html/contactos.php">Contacto</a>
                <a class="bordercon" href="consulta.php">Consultar Cita</a>
                <a class="text-decoration-none text-reset" target="_blank" href="https://www.google.com/maps/place/10%C2%B020'34.9%22N+67%C2%B002'54.8%22W/@10.3430233,-67.0507434,17z/data=!3m1!4b1!4m4!3m3!8m2!3d10.3430233!4d-67.0485547?hl=pt&entry=ttu0.3424338,-67.0376361,15z/data=!4m6!3m5!1s0x8c2a8d8ab478cf49:0xa1118287a3e57677!8m2!3d10.3424338!4d-67.0376361!16s%2Fg%2F11jv7rdjrf?entry=ttu">Cómo llegar</a>
            </nav>
        </div>
    </header>



    <div class="row my-5">
        <h1 class="text-center mb-3 fs-1">Consulta tu cita</h1>
        <div class="col">
            <div class="row row-cols-1 row-cols-md-3 justify-content-center">
                <div class="col">
                    <div class="card border-0 h-100 p-3 shadow CardLogin">
                        <img src="../img/icons/icons8-usuario-de-género-neutro-96.png" class="CardImgTopLogin" alt="...">
                        <div class="card-body">
                            <form class="row g-4" action="Iniciarsesion.php" method="post" id="FormLogin">
                                <?php
                                if (isset($_GET['error'])) {
                                ?>
                                    <p class="error">
                                        <?php
                                        echo $_GET['error']
                                        ?>

                                    </p>
                                <?php
                                }
                                ?>
                                <?php
                                if (isset($_GET['alert'])) {
                                ?>
                                    <p class="notificacion">
                                        <?php
                                        echo $_GET['alert']
                                        ?>

                                    </p>
                                <?php
                                }
                                ?> 

                                <div class="col-sm-8 ps-1">
                                    <input type="text" name="Usuario" placeholder="Usuario" id="usuario" class="form-control" required maxlength="30"/>
                                </div>

                                <div class="col-sm-4 p-0">
                                    <select class="form-select" aria-label="Default select example" name="dominio" placeholder="" id="dominioLogin" required>
                                        <option selected>Dominio </option>
                                        <?php
                                        if ($dominios->num_rows > 0) {
                                            while ($fila4 = $dominios->fetch_assoc()) {
                                                echo '<option value="' . $fila4['id_dominio'] . '">' . $fila4['nombre_dominio'] . '</option>';
                                            }
                                        }

                                        ?>
                                    </select>
                                </div>

                                <div class="col-sm-12 p-0">
                                    <input type="password" name="Clave" placeholder="Contraseña" id="clave" class="form-control" required maxlength="20"/>
                                </div>

                                <button type="submit" class="btn btn-danger" onclick="login_validacion(event)"> Ingresar </button>
                                <hr>
                                <span class="text-center">¿No tienes una cuenta? <a href="./register.php" type="button" class=""> Registrate aquí</a></span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- Footer -->
    <section class="BannerCN mb-4">
        <div class="row justify-content-center">
            <div class="col-md BannerContentCN p-5">
                <h4 class="text-center text-bold">Comunícate con nosotros</h4>
                <p class="text-center">+58 412-020-8921</p>
            </div>
        </div>
    </section>

    <footer class="p-3">
        <div class="row p-2 justify-content-center">
            <div class="col-md-4 p-2">
                <label for=""></label>
                <p class="text-sm text-break fw-light TextAlign">
                    Somos una empresa dedicada a la prestación de servicios de
                    rehabilitación, enfermería, belleza, estética corporal y facial, su
                    necesidad actual está centrada en mejorar la gestión de sus
                    servicios y facilitar de esta manera la comunicación con sus
                    clientes.
                </p>
            </div>

            <div class="col-md-4 p-2">
                <h6 class="text-center">Ubicación</h6>
                <div class="col-md m-2">
                    <div class="input-group flex-nowrap mb-2">
                        <img class="Icons" src="../img/icons/icons8-find-clinic-48.png" width="30" height="30" class="d-inline-block align-top mr-2" alt="" />
                        <span class="text-sm fw-light TextAlign">
                            Parroquia Los Teques, Jurisdicción del Municipio Guaicaipuro,
                            del Estado Bolivariano de Miranda, Ciudad de Los Teques,
                            Final Av. Bolivar.
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-md-4 p-2">
                <h6 class="text-center">Teléfono </h6>
                <div class="col m-2">
                    <div class="input-group mb-2 d-flex justify-content-center">
                        <img src="../img/icons/icons8-teléfono-64.png" width="30" height="30" class="d-inline-block align-top" alt="" />
                        <span class="text-sm text-break fw-light text-center">
                            +58 412-020-8921</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top border-secondary-subtle p-2 justify-content-center">
            <div class="col-md p-2">
                <label for=""></label>
                <p class="text-justify text-sm text-break fw-light text-center">
                    © 2023 Inversiones Rehab Salud y Belleza
                </p>
            </div>
        </div>
    </footer>

    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/bootstrap.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/popper.js"></script>
    <script src="../assets/js/personalizados/Login.js"></script>
</body>

</html>