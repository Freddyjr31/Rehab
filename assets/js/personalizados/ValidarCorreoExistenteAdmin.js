function verificarDisponibilidadCorreo() {
    var correo = document.getElementById("correo").value;
    var dominio = document.getElementById("dominio").value;
    var mensajeCorreo = document.getElementById("mensaje-correo");
  
    // Realiza una solicitud al servidor para verificar la disponibilidad del correo electrónico
    // Puedes utilizar AJAX o Fetch API para esto
    //console.log(correo + " " + dominio)
    //alert(correo + " " + dominio)
    // Ejemplo utilizando Fetch API
    fetch("verificar_correo_admin.php?correo=" + correo +"&dominio=" + dominio)
      .then(function(response) {
        return response.text();
      })
      .then(function(data) {
        mensajeCorreo.innerHTML = data;
      })
      .catch(function(error) {
        console.log(error);
      });
  }