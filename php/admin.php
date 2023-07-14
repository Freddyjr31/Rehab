<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Inversiones Rehab</title>
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
                <img src="../img/RSB.png" class="mt-2"  width="150px" height="auto" alt="">
            </div>
            <nav>
                <a style="color:black" href="../index.php" ;>Inicio</a>
                <a class="colorhover" href="nosotros.html">Nosotros</a>
                <a class="colorhover" href="servicios.html">Servicios</a>
                <a class="bordercon" href="consulta.php">Consultar Cita</a>
                <a style="color:black" href="https://www.google.com/maps/place/Camino+Real/@10.3424338,-67.0376361,15z/data=!4m6!3m5!1s0x8c2a8d8ab478cf49:0xa1118287a3e57677!8m2!3d10.3424338!4d-67.0376361!16s%2Fg%2F11jv7rdjrf?entry=ttu">Cómo llegar</a>
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
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-danger">Cerrar sesión</button>
                </div>

            </div>
            <hr>
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
                            <form class="row g-4" action="" method="post">
                                <div class="col-md-4">
                                    <label for="" class="form-label">Nombre : </label>
                                    <input type="text" name="nombre" placeholder="" id="nombre" class="form-control" />
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="form-label">Apellido : </label>
                                    <input type="text" name="apellido" placeholder="" id="apellido" class="form-control" />
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="form-label">Sexo : </label>
                                    <select class="form-select" aria-label="Default select example" name="sexo" placeholder="" id="sexo">
                                        <option selected>... </option>
                                        <option value="M">Masculino</option>
                                        <option value="F">Femenino</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Correo : </label>
                                    <input type="email" name="correo" placeholder="" id="correo" class="form-control" />
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">telefono : </label>
                                    <input type="text" name="telefono" placeholder="" id="telefono" class="form-control" />
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Contraseña : </label>
                                    <input type="password" name="password" placeholder="" id="password" class="form-control" />
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">tipo de usuario : </label>
                                    <select class="form-select" aria-label="Default select example" name="sexo" placeholder="" id="sexo">
                                        <option selected>... </option>
                                        <option value="C">cliente</option>
                                        <option value="T">trabajador</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-group-sm btn-danger mt-3">Crear usuario</button>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>28654987</td>
                                        <td>05466489492</td>
                                        <td>
                                            <button type="submit" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal">cambiar estatus</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td colspan="2">Larry the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
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
                            <div class="row row-cols-1 row-cols-md-12 g-3">
                                <div class="col-md">
                                    <div class="card border-0 h-100 CardConsultaUsuario p-3 shadow">
                                        <div class="card-body">
                                            <div class="row g-4">
                                                <div class="col-sm-6">
                                                    <p><b>Servicio :</b> nbfdsfn </p>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p><b>Especialista :</b> dsafadsfadsfafa</p>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p><b>Fecha y Hora :</b> adffasdfasfasdf</p>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p><b>Estatus :</b><span class="badge rounded-pill text-bg-success"> completada </span></p>
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
                    <p class="text-justify text-sm text-break fw-light text-center">
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
                            <span class="text-sm text-break fw-light text-center">
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
                                +58 412-000-0257</span>
                        </div>
                        <div class="input-group mb-2 d-flex justify-content-center">
                            <img src="../img/icons/icons8-teléfono-64.png" width="30" height="30" class="d-inline-block align-top" alt="" />
                            <span class="text-sm text-break fw-light text-center">
                                +58 412-000-0258</span>
                        </div>
                        <div class="input-group mb-2 d-flex justify-content-center">
                            <img src="../img/icons/icons8-teléfono-64.png" width="30" height="30" class="d-inline-block align-top" alt="" />
                            <span class="text-sm text-break fw-light text-center">
                                +58 412-000-0259</span>
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