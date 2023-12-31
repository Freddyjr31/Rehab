<?php

include('conexionbd.php');

$sql5 = "SELECT * FROM dominios";
$dominios = $mysqli->query($sql5);

$sql6 = "SELECT * FROM cod_area";
$cod_area = $mysqli->query($sql6);

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Rehab | Registro</title>
    <link rel="icon" type="image/png" href="../img/icons/RSB_Icon2.png" >
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/styles.css'>
    <link rel="stylesheet" href="../assets/bootstrap/bootstrap.min.css">
    <link rel='stylesheet' href='../css/home.css'>
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
        <h1 class="text-center text-secondary mb-3 fs-1">Registrate y se parte de nuestra comunidad de clientes</h1>
        <div class="col">
            <div class="row row-cols-1 row-cols-md-2 justify-content-center">
                <div class="col mb-3">
                    <div class="card border-0 h-100 p-3 shadow CardLogin">
                        <div class="card-body">
                            <form class="row g-4" action="registrar_cliente.php" method="post" id="FormCrearUsuario">
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

                                <div class="col-md-6">
                                    <label for="" class="form-label">Nombre * </label>
                                    <input maxlength="20" required type="text" name="nombre" placeholder="" id="nombre" class="form-control" />
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Apellido * </label>
                                    <input maxlength="20" required type="text" name="apellido" placeholder="" id="apellido" class="form-control" />
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Cédula * </label>
                                    <input oninput="javascript: if (this.value.length > 8) this.value = this.value.slice(0, 8);" type="number" name="cedula" placeholder="" id="cedula" class="form-control" onkeyup="verificarDisponibilidadCI()" required/>
                                    <span id="mensaje-ci"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Sexo * </label>
                                    <select required class="form-select" aria-label="Default select example" name="sexo" placeholder="" id="sexo">
                                        <option selected>... </option>
                                        <option value="M">Masculino</option>
                                        <option value="F">Femenino</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="form-label">Dominio * </label>
                                    <select required class="form-select" aria-label="Default select example" name="dominio" placeholder="" id="dominio">
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
                                    <input required maxlength="30" type="text" name="correo" placeholder="" id="correo" class="form-control" onkeyup="verificarDisponibilidadCorreo()"/>
                                    <span id="mensaje-correo"></span>
                                </div>
                                

                                <div class="col-md-6">
                                    <label for="" class="form-label">Código de área * </label>
                                    <select required class="form-select" aria-label="Default select example" name="codigo" placeholder="" id="Codigo">
                                        <option selected>... </option>
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
                                    <label for="" class="form-label">telefono * </label>
                                    <input oninput="javascript: if (this.value.length > 7) this.value = this.value.slice(0, 7);" type="number" name="telefono" placeholder="" id="telefono" class="form-control" onkeyup="verificarDisponibilidadTelf()" required/>
                                    <span id="mensaje-telf"></span>
                                </div>

                                <div class="col-md-12">
                                    <label for="" class="form-label">Contraseña * </label>
                                    <input type="password" maxlength="8" name="password" placeholder="" id="password" class="form-control" required />
                                </div>

                                <button type="submit" class="btn btn-group-sm btn-danger mt-3" onclick="validateFormR(event)" >Registrarme</button>
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
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/popper.js"></script>
    <script src="../assets/js/personalizados/registrate.js"></script>
    <script src="../assets/js/personalizados/validarCorreoExistente.js"></script>
    <script src="../assets/js/personalizados/validarCI_and_Telf.js"></script>
    
</body>

</html>