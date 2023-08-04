function verificarDisponibilidadCI() {
    var cedula = document.getElementById("cedula").value;
    var mensajeCorreo = document.getElementById("mensaje-ci");
  
    fetch("verificar_ci.php?cedula=" + cedula)
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

  function verificarDisponibilidadTelf() {
    var codigo = document.getElementById("codigo").value;
    var telefono = document.getElementById("telefono").value;
    var mensajeCorreo = document.getElementById("mensaje-telf");

    //alert(correo + " " + dominio)
    // Ejemplo utilizando Fetch API
    fetch("verificar_telf.php?codigo=" + codigo +"&telefono=" + telefono)
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