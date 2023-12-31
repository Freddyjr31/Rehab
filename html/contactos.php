<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Contactanos</title>
    <link rel="icon" type="image/png" href="../img/icons/RSB_Icon2.png" >
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../css/styles.css" />
    <link rel="stylesheet" href="../assets/bootstrap/bootstrap.css" />
    <link rel="stylesheet" href="../css/home.css" />
    <link rel="stylesheet" href="../css/contactos.css" />
  </head>
  <body>
    <header>
      <div class="wrapper">
        <div class="logo">
          <img src="../img/RSB.png" class="mt-2"  width="150px" height="auto" alt="">
        </div>
        <nav>
          <a class="text-decoration-none text-reset" href="../index.php" ;>Inicio</a>
          <a class="text-decoration-none text-reset" href="nosotros.html">Nosotros</a>
          <a class="text-decoration-none text-reset" href="servicios.html">Servicios</a>
          <a class="text-decoration-none text-reset active" href="contactos.php">Contacto</a>
          <a class="bordercon" href="../php/consulta.php">Consultar Cita</a>
          <a
          class="text-decoration-none text-reset"
            target="_blank"
            href="https://www.google.com/maps/place/10%C2%B020'34.9%22N+67%C2%B002'54.8%22W/@10.3430233,-67.0507434,17z/data=!3m1!4b1!4m4!3m3!8m2!3d10.3430233!4d-67.0485547?hl=pt&entry=ttu0.3424338,-67.0376361,15z/data=!4m6!3m5!1s0x8c2a8d8ab478cf49:0xa1118287a3e57677!8m2!3d10.3424338!4d-67.0376361!16s%2Fg%2F11jv7rdjrf?entry=ttu"
            >Cómo llegar</a
          >
        </nav>
      </div>
    </header>

    <!-- Banner con titulo-->
    <section class="BannerContactos mb-4">
      <div class="row justify-content-center">
        <div class="col-md BannerContentContactos p-5">
          <h1 class="text-end text-bold p-5">Contactos</h1>
        </div>
      </div>
    </section>

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

   
    <div class="container-fluid my-5">
      <div class="row">
        <!-- COLUMNA 1 (RELLENO) -->
        <div class="col-2 mx-auto">
        </div>

        <!-- COLUMNA 2 -->
        <div class="col-4">
         
          <h1>Permítenos</h1>
          <h1>ayudarte</h1>
          <h1 class="border-bottom border-danger">Contáctanos</h1>

         
          <!-- formulario de contacto -->
          <form action="../php/models/EnviarCorreoContactos.php" id="FormularioCorreo" method="post" class="row g-4 mt-2">
            <div class="col-md-6">
              <input
                placeholder="Nombre *"
                type="text"
                class="form-control"
                id="NombreCorreo"
                name="NombreCorreo"
                maxlength="20"
                required
              />
            </div>
            <div class="col-md-6">
              <input
                placeholder="Apellido *"
                type="text"
                class="form-control"
                id="ApellidoCorreo"
                name="ApellidoCorreo"
                maxlength="20"
                required
              />
            </div>
            <div class="col-md-8">
              <input
                placeholder="Email *"
                type="text"
                class="form-control"
                id="DireccionCorreo"
                name="DireccionCorreo"
                maxlength="20"
                required
              />
            </div>
            <div class="col-sm-4">
              <select class="form-select" aria-label="Default select example" name="dominio" placeholder="" id="dominio" required>
                  <option value="" selected>Dominio *</option>
                  <option value="@gmail.com">@gmail.com</option>
                  <option value="@hotmail.com">@hotmail.com</option>
                  <option value="@yahoo.com">@yahoo.com</option>
              </select>
          </div>

            <div class="col-sm-12">
              <label for="" class="form-label"></label>
              <input
                type="text"
                class="form-control"
                id="AsuntoMail"
                name="AsuntoMail"
                placeholder="Asunto *"
                required
                maxlength="80"
              />
            </div>
            <div class="col-sm-12">
              <label></label>
              <textarea
                class="form-control"
                placeholder="Mensaje *"
                name="MensajeMail"
                id="MensajeMail"
                style="height: 120px"
                maxlength="200"
                required
              ></textarea>
            </div>
            <div class="col-sm-12">
              <button onclick="ValidarEnvioCorreo(event)" type="submit" class="btn btn-group-sm btn-danger mt-3">Enviar</button>
            </div>
          </form>
        </div>

        <!-- COLUMNA 3 -->
        <div class="col-6 bg-light">
          <div class="col mt-5 p-2">
            <div class="input-group mb-2 d-flex justify-content-center">
              <img
                src="../img/icons/icons8-teléfono-64.png"
                width="30"
                height="30"
                class="d-inline-block align-top"
                alt=""
              />
              <h6 class="text-center">  Teléfono </h6>
            </div>
            <div class="col text-center m-2">
              <span class="text-sm text-break fw-light text-center">
                +58 412-020-8921</span
              >
              <br />
            </div>
          </div>

          <div class="col p-2">
            <div class="input-group mb-2 mb-2 d-flex justify-content-center">
              <img
                class="Icons"
                src="../img/icons/icons8-find-clinic-48.png"
                width="30"
                height="30"
                class="d-inline-block align-top mr-2"
                alt=""
              />
              <h6 class="text-center">  Ubicación</h6>
            </div>
            <div class="col-md mx-5 p-2">
              <span class="text-sm fw-light TextAlign">
                Parroquia Los Teques, Jurisdicción del Municipio Guaicaipuro,
                del Estado Bolivariano de Miranda, Ciudad de Los Teques,
                Final Av. Bolivar.
              </span>
            </div>
          </div>

          <div class="col mx-5 p-2">
            <label for=""></label>
            <p class="text-sm fw-light TextAlign">
              Somos una empresa dedicada a la prestación de servicios de
              rehabilitación, enfermería, belleza, estética corporal y facial,
              su necesidad actual está centrada en mejorar la gestión de sus
              servicios y facilitar de esta manera la comunicación con sus
              clientes.
            </p>
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
          <p class="TextAlign text-sm fw-light">
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
              <img
                class="Icons"
                src="../img/icons/icons8-find-clinic-48.png"
                width="30"
                height="30"
                class="d-inline-block align-top mr-2"
                alt=""
              />
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
              <img
                src="../img/icons/icons8-teléfono-64.png"
                width="30"
                height="30"
                class="d-inline-block align-top"
                alt=""
              />
              <span class="text-sm text-break fw-light text-center">
                +58 412-020-8921</span
              >
            </div>
          </div>
        </div>
      </div>
      <div
        class="row border-top border-secondary-subtle p-2 justify-content-center"
      >
        <div class="col-md p-2">
          <label for=""></label>
          <p class="text-justify text-sm text-break fw-light text-center">
            © 2023 Inversiones Rehab Salud y Belleza
          </p>
        </div>
      </div>
    </footer>

    <!-- javaScript files -->
    <script src="../assets/js/personalizados/MailContactos.js"></script>
  </body>
</html>
