<?php

session_start();

if (($_SESSION['usuario']) == NULL) {
    header('Location: consulta.php');
}

include('conexionbd.php');
$id = $_SESSION['id'];

$sql = "SELECT citas.*, servicios.*, usuarios.* FROM citas JOIN servicios ON citas.id_servicio = servicios.id JOIN usuarios ON citas.id_trabajador = usuarios.id_usuarios WHERE id_trabajador = '$id' AND id_estatus = 1";
$pendientes = $mysqli->query($sql);

$sql1 = "SELECT citas.*, servicios.*, usuarios.* FROM citas JOIN servicios ON citas.id_servicio = servicios.id JOIN usuarios ON citas.id_trabajador = usuarios.id_usuarios WHERE id_trabajador = '$id' AND id_estatus = 4";
$completadas = $mysqli->query($sql1);

$sql2 = "SELECT usuarios.*, telefonos.*, cod_area.*, correos.*, dominios.* FROM usuarios JOIN correos ON usuarios.correo = correos.id_correo JOIN dominios ON correos.dominio_id = dominios.id_dominio JOIN telefonos ON usuarios.id_telefono = telefonos.id_telefono JOIN cod_area ON telefonos.cod_id = cod_area.id_cod WHERE id_usuarios = '$id'";
$usuario = $mysqli->query($sql2);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Rehab Especialista</title>
    <link rel="icon" type="image/png" href="../img/icons/RSB_Icon2.png" >
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/styles.css'>
    <link rel="stylesheet" href="../assets/bootstrap/bootstrap.min.css">
    <link rel='stylesheet' href='../css/home.css'>
    <link rel='stylesheet' href='../css/usuario.css'>
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
                <a class="text-decoration-none text-reset" href="../html/contactos.html">Contacto</a>
                <a class="bordercon" href="consulta.php">Consultar Cita</a>
                <a class="text-decoration-none text-reset" target="_blank" href="https://www.google.com/maps/place/Camino+Real/@10.3424338,-67.0376361,15z/data=!4m6!3m5!1s0x8c2a8d8ab478cf49:0xa1118287a3e57677!8m2!3d10.3424338!4d-67.0376361!16s%2Fg%2F11jv7rdjrf?entry=ttu">Cómo llegar</a>
            </nav>
        </div>
    </header>

    <div class="container-sm mt-5">
        <div class="row d-flex justify-content-between">
            <div class="col">
                <h2><?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido']; ?></h2>
            </div>
            <!-- boton de cerrar cesion -->
            <form action="CerrarSesion.php" method="POST" class="col d-flex justify-content-end">
                <button type="submit" class="btn btn-danger">Cerrar sesión</button>
            </form>

        </div>
        <hr>
        <!-- Menu de usuario -->
        <div class="row mt-3 mb-5">
            <div class="d-flex align-items-start">
                <div class="nav flex-column nav-pills me-3 mt-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="m-2 BtnMenuUsuario active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Citas pendientes</button>
                    <!--<button class="m-2 BtnMenuUsuario" id="v-pills-confirm-tab" data-bs-toggle="pill" data-bs-target="#v-pills-confirm" type="button" role="tab" aria-controls="v-pills-confirm" aria-selected="false">Citas confirmadas</button>-->
                    <button class="m-2 BtnMenuUsuario" id="v-pills-complet-tab" data-bs-toggle="pill" data-bs-target="#v-pills-complet" type="button" role="tab" aria-controls="v-pills-complet" aria-selected="false">Citas completadas</button>
                    <!--<button class="m-2 BtnMenuUsuario" id="v-pills-rejected-tab" data-bs-toggle="pill" data-bs-target="#v-pills-rejected" type="button" role="tab" aria-controls="v-pills-rejected" aria-selected="false">Citas rechazadas</button>-->
                    <button class="m-2 BtnMenuUsuario" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Mi Perfil</button>
                </div>
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                        <h3 class="mt-3">Citas pendientes</h3>
                        <hr>
                        <!-- CONSULTAR CITAS PENDIENTES -->
                        <div class="row row-cols-1 row-cols-md-2 g-3">
                            <?php

                            if ($pendientes->num_rows > 0) {
                                while ($fila = $pendientes->fetch_assoc()) {
                                    echo '<div class="col-md">
                                            <div class="card border-0 h-100 CardConsultaUsuario p-3 shadow">
                                                <div class="card-body">
                                                    <div class="row g-4">
                                                        <div class="col-sm-6">
                                                            <p><b>Servicio: </b>' . $fila['nombre_servicio'] . '</p>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <p><b>Especialista: </b>' . $fila['nombre'] . ' ' . $fila['apellido'] . '</p>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <p><b>Fecha y Hora: </b>' . $fila['fecha'] . ' ' . $fila['hora'] . '</p>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <p><b>Estatus: </b><span class="badge rounded-pill text-bg-warning">Pendiente</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                                }
                            } else {
                                echo "No existen citas";
                            }

                            ?>
                        </div>
                    </div>

                    <!--<div class="tab-pane fade show" id="v-pills-confirm" role="tabpanel" aria-labelledby="v-pills-confirm-tab" tabindex="0">
                        <h3 class="mt-3">Citas confirmadas</h3>
                        <hr>
                         CONSULTAR CITAS CONFIRMADAS 
                        <div class="row row-cols-1 row-cols-md-2 g-3">

                            <div class="col-md">
                                <div class="card border-0 h-100 CardConsultaUsuario p-3 shadow">
                                    <div class="card-body">
                                        <div class="row g-4">
                                            <div class="col-sm-6">
                                                <p><b>Servicio :</b> nbfdsfn </p>
                                            </div>
                                            <div class="col-sm-6">
                                                <p><b>Especialista :</b> </p>
                                            </div>
                                            <div class="col-sm-6">
                                                <p><b>Fecha y Hora :</b> </p>
                                            </div>
                                            <div class="col-sm-6">
                                                <p><b>Estatus : </b><span class="badge rounded-pill text-bg-info"> confirmada </span></p>
                                            </div>
                                            <form class="row g-3" action="">
                                                <div class="col-sm-6">
                                                    <select class="form-select" aria-label="Default select example" name="especialista" placeholder="" id="especialista" required>
                                                        <option selected>Cambiar Estatus </option>
                                                        <option value="1">estatus 1</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6">
                                                    <button type="submit" class="btn btn-primary">Actualizar estatus</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div class="tab-pane fade show" id="v-pills-complet" role="tabpanel" aria-labelledby="v-pills-complet-tab" tabindex="0">
                        <h3 class="mt-3">Citas completadas</h3>
                        <hr>
                        <!-- CONSULTAR CITAS COMPLETADAS -->
                        <div class="row row-cols-1 row-cols-md-2 g-3">
                            <?php

                            if ($completadas->num_rows > 0) {
                                while ($fila1 = $completadas->fetch_assoc()) {
                                    echo '<div class="col-md">
                                            <div class="card border-0 h-100 CardConsultaUsuario p-3 shadow">
                                                <div class="card-body">
                                                    <div class="row g-4">
                                                        <div class="col-sm-6">
                                                            <p><b>Servicio: </b>' . $fila1['nombre_servicio'] . '</p>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <p><b>Especialista: </b>' . $fila1['nombre'] . ' ' . $fila1['apellido'] . '</p>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <p><b>Fecha y Hora: </b>' . $fila1['fecha'] . ' ' . $fila1['hora'] . '</p>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <p><b>Estatus: </b><span class="badge rounded-pill text-bg-success">Completada</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                                }
                            } else {
                                echo "No existen citas";
                            }

                            ?>
                        </div>
                    </div>

                   
                    <!-- <div class="tab-pane fade show" id="v-pills-rejected" role="tabpanel" aria-labelledby="v-pills-rejected-tab" tabindex="0">
                        <h3 class="mt-3">Citas rechazadas</h3>
                        <hr>
                         CONSULTAR CITAS RECHAZADAS
                        <div class="row row-cols-1 row-cols-md-2 g-3">
                            <div class="col-md">
                                <div class="card border-0 h-100 CardConsultaUsuario p-3 shadow">
                                    <div class="card-body">
                                        <div class="row g-4">
                                            <div class="col-sm-6">
                                                <p><b>Servicio :</b> nbfdsfn </p>
                                            </div>
                                            <div class="col-sm-6">
                                                <p><b>Especialista :</b> </p>
                                            </div>
                                            <div class="col-sm-6">
                                                <p><b>Fecha y Hora :</b> </p>
                                            </div>
                                            <div class="col-sm-6">
                                                <p><b>Estatus : </b><span class="badge rounded-pill text-bg-danger"> rechazada </span></p>
                                            </div>
                                            <form class="row g-3" action="">
                                                <div class="col-sm-6">
                                                    <select class="form-select" aria-label="Default select example" name="especialista" placeholder="" id="especialista" required>
                                                        <option selected>Cambiar Estatus </option>
                                                        <option value="1">estatus 1</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6">
                                                    <button type="submit" class="btn btn-primary">Actualizar estatus</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">
                        <h3>Mi Perfil</h3>
                        <!-- VER DATOS DEL PERFIL LOGUEADO -->
                        <hr>
                        <div class="row g-5 mt-3 mb-5">
                            <?php
                            if ($usuario->num_rows > 0) {
                                while ($fila2 = $usuario->fetch_assoc()) {
                                    if ($fila2['sexo'] == 'M') {
                                        $sexo = "Masculino";
                                    } elseif ($fila2['sexo'] == 'F') {
                                        $sexo = "Femenino";
                                    }
                                    echo '<div class="col-sm-4">
                                                    <p class="text-capitalize"><b>Nombre: </b>' . $fila2['nombre'] . '</p>
                                                </div>
                                                <div class="col-sm-4">
                                                    <p class="text-capitalize"><b>Apellido: </b>' . $fila2['apellido'] . '</p>
                                                </div>
                                                <div class="col-sm-4">
                                                    <p class="text-capitalize"><b>Cédula: </b>' . $fila2['cedula'] . '</p>
                                                </div>
                                                <div class="col-sm-4">
                                                    <p><b>Correo: </b>' . $fila2['nombre_correo'] . $fila2['nombre_dominio'] . '</p>
                                                </div>
                                                <div class="col-sm-4">
                                                    <p><b>Teléfono: </b>' . $fila2['area'] . $fila2['numero'] . '</p>
                                                </div>
                                                <div class="col-sm-4">
                                                    <p class="text-capitalize"><b>Sexo: </b>' . $sexo . '</p>
                                                </div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Footer -->
    <section class="BannerCN mb-4 mt-5">
        <div class="row justify-content-center">
            <div class="col-md BannerContentCN p-5">
                <h4 class="text-center">Comunícate con n<b>osotros</h4>
                <p class="text-center">0412-000-0257</p>
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
                <h6 class="text-center">Teléfonos</h6>
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

    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/popper.js"></script>
</body>

</html>