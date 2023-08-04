<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Inversiones Rehab</title>
    <link rel="icon" type="image/png" href="./img/icons/RSB_Icon2.png" >
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='./css/styles.css'>
    <link rel='stylesheet' href='./css/home.css'>
    <link rel="stylesheet" href="./assets/bootstrap/bootstrap.css">
</head>

<body>

    <header>
        <div class="wrapper">
            <div class="logo">
                <img src="./img/RSB.png" class="mt-2"  width="150px" height="auto">
            </div>
            <nav>
                <a class="text-decoration-none text-reset active" href="index.php" ;>Inicio</a>
                <a class="text-decoration-none text-reset" href="./html/nosotros.html">Nosotros</a>
                <a class="text-decoration-none text-reset" href="./html/servicios.html">Servicios</a>
                <a class="text-decoration-none text-reset" href="./html/contactos.php">Contacto</a>
                <a class="bordercon" href="./php/consulta.php">Consultar Cita</a>
                <a class="text-decoration-none text-reset" target="_blank" href="https://www.google.com/maps/place/10%C2%B020'34.9%22N+67%C2%B002'54.8%22W/@10.3430233,-67.0507434,17z/data=!3m1!4b1!4m4!3m3!8m2!3d10.3430233!4d-67.0485547?hl=pt&entry=ttu0.3424338,-67.0376361,15z/data=!4m6!3m5!1s0x8c2a8d8ab478cf49:0xa1118287a3e57677!8m2!3d10.3424338!4d-67.0376361!16s%2Fg%2F11jv7rdjrf?entry=ttu">Cómo llegar</a>
            </nav>
        </div>
    </header>

    <!-- Carrusel  -->
    <div id="Carrusel mx-0 my-0">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="./img/IMG-20230704-WA0007.jpg" class="d-block w-100" height="350px" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="./img/IMG-20230704-WA0008.jpg" class="d-block w-100" height="350px" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./img/IMG-20230704-WA0009.jpg" class="d-block w-100" height="350px" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev ButtonCarrusel" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next ButtonCarrusel" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="container-sm mt-5 mb-5">
        <div class="row mx-0 my-0">
            <div class="col-md-8 imgContentBox">
                <div id="ContentImgOrder1" class="col ContentImg">
                    <img src="./img/masaje5.jpg" class="shadow rounded" alt="...">
                </div>
                <div id="ContentImgOrder2" class="col ContentImg">
                    <img src="./img/masaje6.jpg" id="ImgCenter" class="shadow rounded" alt="...">
                </div>
                <div id="ContentImgOrder3" class="col ContentImg">
                    <img src="./img/personas-alta-fisioterapia-mantenerse-saludables.jpg" class="shadow rounded" alt="...">
                </div>
            </div>
            <div class="col-md-4 mt-5">
                <h2>Calidad garantizada en todos nuestros servicios</h2>
                <hr>
                <p class="text-sm fw-light TextAlign">Somos una empresa dedicada a la prestación de servicios de rehabilitación, enfermería, belleza, estética corporal y facial, su necesidad actual está centrada en mejorar la gestión de sus servicios y facilitar de esta manera la comunicación con sus clientes.</p>
                <div class="col-sm-12">
                <a href="./html/servicios.html" type="button" class="btn btn-danger">Servicios</a>    
                </div>
                <!--<img src="./img/masaje2.jpg" class="img-fluid shadow ImgCalidadGarantizada mt-5">-->
            </div>
        </div>
    </div>

    <div class="container-sm mb-5">
        <div class="row">
            <h1 class="text-center mb-3 fs-1">Nuestras especialidades</h1>

            <div class="col">
                <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
                    <div class="col">
                        <div class="card border-0 h-100 CardsHome p-3 shadow">
                            <img src="./img/icons/icons8-maletín-médico-96.png" class="CardImgTop" alt="...">
                            <div class="card-body">
                                <h3 class="card-title text-center text-secondary">Tratamientos con aparatología</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-0 h-100 CardsHome p-3 shadow">
                            <img src="./img/icons/icons8-camilla-de-masaje-de-aluminio-96.png" class="CardImgTop" alt="...">
                            <div class="card-body">
                                <h3 class="card-title text-center text-secondary">Masajes</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-0 h-100 CardsHome p-3 shadow">
                            <img src="./img/icons/icons8-corazón-con-pulso-96.png" class="CardImgTop" alt="...">
                            <div class="card-body">
                                <h3 class="card-title text-center text-secondary">Rehabilitación</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid my-5 mx-0">
        <div class="row p-0 m-0">
            <div class="col-md-7 ps-5">
                <img src="./img/masaje3.jpg" class="img-fluid shadow imgContent" alt="...">
            </div>
            <div class="col-md-5 mt-5 bg-light">
                <h1 class="h1 p-2 mt-5">Quíenes somos</h1>
                <hr>
                <p class="mt-5 fw-light TextAlign">Tenemos el objetivo de desarrollar actividades de prestación de servicios de salud, rehabilitación en el área asistencial y administrativa a través de la práctica de servicios integrales y holísticos en salud.</p>
                <p class="TextAlign">Somos expertos y te ofrecemos siempre lo mejor</p>
                <a href="./html/nosotros.html" type="button" class="btn btn-danger mt-4">Nosotros</a>
            </div>
        </div>
    </div>



    <!-- Footer -->
    <section class="BannerCN mt-0 mx-0 mb-4">
        <div class="row justify-content-center">
            <div class="col-md BannerContentCN p-5">
                <h4 class="text-center text-bold">Comunícate con nosotros</h4>
                <p class="text-center">+58 412-020-8921</p>
            </div>
        </div>
    </section>

    <footer class="p-0 m-0">
        <div class="row p-2 justify-content-center">
            <div class="col-md-4 p-2">
                <label for=""></label>
                <p class="ps-1 fw-light text-sm TextAlign">Somos una empresa dedicada a la prestación de servicios de rehabilitación, enfermería, belleza, estética corporal y facial, su necesidad actual está centrada en mejorar la gestión de sus servicios y facilitar de esta manera la comunicación con sus clientes.</p>
            </div>

            <div class="col-md-4 p-2">
                <h6 class="text-center">Ubicación</h6>
                <div class="col-md m-2">
                    <div class="input-group flex-nowrap mb-2">
                        <img class="Icons" src="./img/icons/icons8-find-clinic-48.png" width="30" height="30" class="d-inline-block align-top mr-2" alt="">
                        <span class="text-sm fw-light TextAlign">
                            Parroquia Los Teques, Jurisdicción del Municipio Guaicaipuro, del Estado Bolivariano de Miranda, Ciudad de Los Teques, Final Av. Bolivar.
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-md-4 p-2">
                <h6 class="text-center">Teléfono </h6>
                <div class="col m-2 ">
                    <div class="input-group mb-2 d-flex justify-content-center">
                        <img src="./img/icons/icons8-teléfono-64.png" width="30" height="30" class="d-inline-block align-top" alt="">
                        <span class="text-sm text-break fw-light text-center"> +58 412-020-8921</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row  m-0 border-top border-secondary-subtle p-2 justify-content-center">
            <div class="col-md p-2">
                <label for=""></label>
                <p class="text-justify text-sm text-break fw-light text-center">
                    © 2023 Inversiones Rehab Salud y Belleza
                </p>
            </div>
        </div>
    </footer>

    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/bootstrap.js"></script>
    <script src="./assets/js/bootstrap.bundle.js"></script>
    <script src="./assets/js/popper.js"></script>

</body>

</html>