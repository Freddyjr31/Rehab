function actualizarSelect2() {
    var select1 = document.getElementById("servicio");
    var select2 = document.getElementById("especialista");
  
    // Obtén el valor seleccionado en el primer select
    var valorSelect1 = select1.value;
    console.log(select2.value)
    console.log(valorSelect1)
    // Realiza una solicitud al servidor para obtener los datos actualizados para el segundo select
    // Puedes utilizar AJAX o Fetch API para esto
  
    // Ejemplo utilizando Fetch API
    fetch("ObtenerDatosSelect.php?valorSelect1=" + valorSelect1)
      .then(function(response) {
        return response.json();
      })
      .then(function(data) {
        // Llena el segundo select con los datos obtenidos
        select2.innerHTML = "";
        console.log(data)
        for (var i = 0; i < data.length; i++) {
          var option = document.createElement("option");
          option.value = data[i].id;
          option.text = data[i].nombre + " " + data[i].apellido;
          select2.appendChild(option);
        }
      })
      .catch(function(error) {
        console.log(error);
      });
  }
  