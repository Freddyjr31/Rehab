

function ValidarFormCita() {

    const FormAgendarCitas = document.querySelector('#FormAgendarCitas');
    const servicio = document.querySelector('#servicio');
    const especialista = document.querySelector('#especialista');
    const fechaCita = document.querySelector('#fechaCita');
    const horaCita = document.querySelector('#horaCita');
    const fechaCita2 = document.querySelector('#fechaCita2');
    const horaCita2 = document.querySelector('#horaCita2');
    const fechaCita3 = document.querySelector('#fechaCita3');
    const horaCita3 = document.querySelector('#horaCita3');

    const servicioValue = servicio.value.trim();
    const especialistaValue = especialista.value.trim();
    const fechaValue = fechaCita.value.trim();
    const horaValue = horaCita.value.trim();
    const fechaDosValue = fechaCita2.value.trim();
    const horaDosValue = horaCita2.value.trim();
    const fechaTresValue = fechaCita3.value.trim();
    const HoraTresValue = horaCita3.value.trim();
    
    if (servicioValue == '') {
        alert('Por favor, ingresa tu usuario');
        servicio.focus();
        return false;
    }
    
    if (especialistaValue == '') {
        alert('Por favor, ingresa el dominio');
        especialista.focus();
        return false;
    }
    
    if (fechaValue == '') {
        alert('Por favor, ingresa tu contrseña');
        fechaCita.focus();
        return false;
    }
    
    if (horaValue == '') {
        alert('Por favor, ingresa tu usuario');
        horaCita.focus();
        return false;
    }
    
    if (fechaDosValue == '') {
        alert('Por favor, ingresa el dominio');
        fechaCita2.focus();
        return false;
    }
    
    if (horaDosValue == '') {
        alert('Por favor, ingresa tu contrseña');
        horaCita2.focus();
        return false;
    }
    
    if (fechaTresValue == '') {
        alert('Por favor, ingresa tu usuario');
        fechaCita3.focus();
        return false;
    }
    
    if (HoraTresValue == '') {
        alert('Por favor, ingresa tu usuario');
        horaCita3.focus();
        return false;
    }

    return true;
}