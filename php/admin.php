<?php

session_start();

if (($_SESSION['usuario']) == NULL  || $_SESSION['rol'] != 1) {
    session_destroy();
    header('Location: consulta.php');
}

include('conexionbd.php');

$sql = "SELECT usuarios.*, roles.rol AS nombre_rol, estatus_usuario.estatus_usuario AS estatus, correos.*, telefonos.*, dominios.*, cod_area.* FROM usuarios JOIN roles ON usuarios.rol_id = roles.id JOIN estatus_usuario ON usuarios.id_estatus_usuario = estatus_usuario.id JOIN correos ON usuarios.correo = correos.id_correo JOIN dominios ON correos.dominio_id = dominios.id_dominio JOIN telefonos ON usuarios.id_telefono = telefonos.id_telefono JOIN cod_area ON telefonos.cod_id = cod_area.id_cod";
$resultado = $mysqli->query($sql);

// $sql2 = "SELECT citas.*, estatus_cita.estatus AS cita_estatus, servicios.nombre_servicio AS servicio, usuarios.* FROM citas JOIN estatus_cita ON citas.id_estatus = estatus_cita.id JOIN servicios ON citas.id_servicio = servicios.id";

$sql3 = "SELECT * FROM citas JOIN usuarios AS cliente ON cliente.id_usuarios = citas.id_cliente JOIN usuarios AS trabajador ON trabajador.id_usuarios = citas.id_trabajador JOIN estatus_cita ON estatus_cita.id = citas.id_estatus JOIN servicios ON servicios.id = citas.id_servicio";

// $sql2 = "SELECT * FROM citas";
$citas = $mysqli->query($sql3);

$sql4 = "SELECT * FROM roles";
$roles = $mysqli->query($sql4);

$sql5 = "SELECT * FROM dominios";
$dominios = $mysqli->query($sql5);

$sql6 = "SELECT * FROM cod_area";
$cod_area = $mysqli->query($sql6);

$sql7 = "SELECT * FROM servicios";
$servicios = $mysqli->query($sql7);

$sql8 = "SELECT * FROM estatus_usuario";
$estatus_usuarios = $mysqli->query($sql8);

$ids = array();
$estatus = array();

if ($estatus_usuarios->num_rows > 0) {
    while ($fila8 = $estatus_usuarios->fetch_assoc()) {
        array_push($ids, $fila8['id']);
        array_push($estatus,$fila8['estatus_usuario']);
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Inversiones Rehab</title>
    <link rel="icon" type="image/png" href="../img/icons/RSB_Icon2.png">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='../css/styles.css'>
    <link rel='stylesheet' href='../css/home.css'>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../assets/bootstrap/bootstrap.min.css">

</head>

<body>

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
                <a class="text-decoration-none text-reset" target="_blank" href="https://www.google.com/maps/place/Camino+Real/@10.3424338,-67.0376361,15z/data=!4m6!3m5!1s0x8c2a8d8ab478cf49:0xa1118287a3e57677!8m2!3d10.3424338!4d-67.0376361!16s%2Fg%2F11jv7rdjrf?entry=ttu">Cómo llegar</a>
            </nav>
        </div>
    </header>

    <body>

        <div class="container-sm mt-5">
            <div class="row d-flex justify-content-between">
                <div class="col">
                    <h2>Panel de Administración</h2>
                </div>
                <!-- boton de cerrar sesion -->
                <form action="CerrarSesion.php" method="POST" class="col d-flex justify-content-end">
                    <button type="submit" class="btn btn-danger">Cerrar sesión</button>
                </form>

            </div>
            <hr>
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
            <!-- Menu de usuario -->
            <div class="row mt-3 mb-5">
                <div class="d-flex align-items-start">
                    <div class="nav flex-column nav-pills me-3 mt-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="m-2 BtnMenuUsuario active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Crear usuarios</button>
                        <button class="m-2 BtnMenuUsuario" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Usuarios</button>
                        <button class="m-2 BtnMenuUsuario" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Citas completadas</button>
                    </div>
                    <div class="tab-content w-100 mb-5" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                            <h3 class="mt-3">Crear usuarios</h3>
                            <hr>
                            <!-- USUARIOS PENDIENTES POR VALIDAR -->
                            <form class="row g-4" action="registrar_trabajador.php" method="post" id="FormCrearUsuarioAdmin">
                                <div class="col-md-6">
                                    <label for="" class="form-label">Nombre * </label>
                                    <input type="text" maxlength="20" name="nombre" placeholder="" id="nombre" class="form-control" required />
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Apellido * </label>
                                    <input type="text" maxlength="20" name="apellido" placeholder="" id="apellido" class="form-control" required />
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Sexo * </label>
                                    <select class="form-select" aria-label="Default select example" name="sexo" placeholder="" id="sexo">
                                        <option value="" selected>... </option>
                                        <option value="M">Masculino</option>
                                        <option value="F">Femenino</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Cédula * </label>
                                    <input type="number" maxlength="8" name="cedula" placeholder="" id="cedula" class="form-control" required />
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="form-label">Dominio * </label>
                                    <select class="form-select" aria-label="Default select example" name="dominio" placeholder="" id="dominio" required>
                                        <?php
                                        if ($dominios->num_rows > 0) {
                                            while ($fila4 = $dominios->fetch_assoc()) {
                                                echo '<option value="' . $fila4['id_dominio'] . '">' . $fila4['nombre_dominio'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Correo * </label>
                                    <input type="text" maxlength="30" name="correo" placeholder="" id="correo" class="form-control" required onkeyup="verificarDisponibilidadCorreo()"/>
                                    <span id="mensaje-correo"></span>
                                </div>


                                <div class="col-md-6">
                                    <label for="" class="form-label">Codigo de área * </label>
                                    <select class="form-select" aria-label="Default select example" name="codigo" placeholder="" id="codigo" required>
                                        <option value="" selected>... </option>
                                        <?php
                                        if ($cod_area->num_rows > 0) {
                                            while ($fila5 = $cod_area->fetch_assoc()) {
                                                echo '<option value="' . $fila5['id_cod'] . '">' . $fila5['area'] . '</option>';
                                            }
                                        }

                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="form-label">Telefono * </label>
                                    <input type="number" maxlength="7" name="telefono" placeholder="" id="telefono" class="form-control" required />
                                </div>

                                <div class="col-md-12">
                                    <label for="" class="form-label">Tipo de usuario * </label>
                                    <select class="form-select" aria-label="Default select example" name="tipo" id="tipo" onclick="MostrarEspecialidades();" required>
                                        <option value="" selected>... </option>
                                        <?php
                                        if ($roles->num_rows > 0) {
                                            while ($fila3 = $roles->fetch_assoc()) {
                                                echo '<option value="' . $fila3['Id'] . '">' . $fila3['rol'] . '</option>';
                                            }
                                        }

                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-12" id="especialidades" style="display:none">
                                    <label for="">Especialidades *</label>
                                    <div class="row row-cols-sm-2 row-cols-md-2 mt-2">

                                        <?php
                                        if ($servicios->num_rows > 0) {
                                            while ($fila4 = $servicios->fetch_assoc()) {
                                                echo '<div class="col p-1">
                                                      <input class="form-check-input" name="especialidades[]" type="checkbox" value="' . $fila4['id'] . '" id="' . $fila4['id'] . '">
                                                      <small><label class="form-check-label text-sm text-break" for="' . $fila4['id'] . '">' . $fila4['nombre_servicio'] . '</label></small>
                                                     </div>';
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <label for="" class="form-label">Contraseña * </label>
                                    <input type="password" maxlength="20" name="password" placeholder="" id="password" class="form-control" required />
                                </div>
                                <button type="submit" class="btn btn-group-sm btn-danger mt-3" onclick="validateFormCrearUsuario(event)">Crear usuario</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
                            <h3 class="mt-3">Todos los Usuarios</h3>
                            <hr>
                            <!-- TODOS LOS USUARIOS DENTRO DEL SISTEMA -->
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellido</th>
                                        <th scope="col">correo</th>
                                        <th scope="col">cédula</th>
                                        <th scope="col">Teléfono</th>
                                        <th scope="col">Estatus</th>
                                        <th scope="col">Rol</th>
                                        <th scope="col">Actualizar estatus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    if ($resultado->num_rows > 0) {
                                        while ($fila = $resultado->fetch_assoc()) {
                                            echo "<tr>
                                                        <th scope='row'>1</th>
                                                        <td>" . $fila["nombre"] . "</td>
                                                        <td>" . $fila["apellido"] . "</td>
                                                        <td>" . $fila["nombre_correo"] . $fila["nombre_dominio"] . "</td>
                                                        <td>" . $fila["cedula"] . "</td>
                                                        <td>" . $fila["area"] . $fila["numero"] . "</td>
                                                        <td>" . $fila["estatus"] . "</td>
                                                        <td>" . $fila["nombre_rol"] . "</td>
                                                        <td>
                                                        <form class='row g-3' action='actualizar_usuario.php' method='post'>
                                                            <div class='col-sm-6'>
                                                                <input class='form-control' type='text' name='idusuario' id='idusuario' style='display: none;' value='". $fila['id_usuarios'] ."' required />
                                                                <select class='form-select' aria-label='Default select example' name='estatus' placeholder='' id='especialista' required>
                                                                    <option selected>Seleccionar Estatus</option>";
                                                                    $num = count($ids);
                                                                    for($i = 0; $i < $num; $i++){
                                                                        echo '<option value="'. $ids[$i] .'">'. $estatus[$i] .'</option>';
                                                                    }
                                                                    echo "</select>
                                                            </div>
                                                            <div class='col-sm-6'>
                                                                <button type='submit' class='btn btn-primary'>Aceptar</button>
                                                            </div>
                                                        </form>
                                                        </td>
                                                    </tr>";
                                        }
                                    } else {
                                        echo "No existen usuarios";
                                    }

                                    ?>
                                </tbody>
                            </table>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Cambiar estatus del cliente</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form class="col-sm-12" action="">
                                            <div class="modal-body">
                                                <label for="" class="form-label"><b>Cambiar Estatus : </b></label>
                                                <select class="form-select" aria-label="Default select example" name="especialista" placeholder="" id="especialista" required>
                                                    <option selected>... </option>
                                                    <option value="1">estatus 1</option>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary">actualizar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">
                            <h3>Citas completadas</h3>
                            <!-- VER CITAS COMPLETADAS PARA ARCHIVARLAS -->
                            <hr>
                            <?php

                            if ($citas->num_rows > 0) {
                                while ($fila2 = $citas->fetch_assoc()) {
                                    echo '<div class="row row-cols-1 row-cols-md-12 g-3">
                                            <div class="col-md">
                                                <div class="card border-0 h-100 CardConsultaUsuario p-3 shadow">
                                                    <div class="card-body">
                                                        <div class="row g-4">
                                                            <div class="col-sm-6">
                                                                <p><b>Servicio: </b>' . $fila2['nombre_servicio'] . '</p>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p><b>Especialista: </b>' . $fila2['nombre'] . ' '. $fila2['apellido'] .'</p>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p><b>Fecha y Hora: </b>' . $fila2['fecha'] . ' ' . $fila2['hora'] . '</p>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p><b>Estatus: </b><span class="badge rounded-pill text-bg-success">' . $fila2['estatus'] . '</span></p>
                                                            </div>
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
                </div>
            </div>
        </div>

        <!-- Footer -->
        <section class="BannerCN mb-4">
            <div class="row justify-content-center">
                <div class="col-md BannerContentCN p-5">
                    <h4 class="text-center text-bold">Comunícate con nosotros</h4>
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
        <script src="../assets/js/personalizados/AdminCrearUsuario.js"></script>
        <script src="../assets/js/personalizados/ValidarCorreoExistenteAdmin.js"></script>

    </body>

</html>