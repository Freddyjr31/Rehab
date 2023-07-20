const FormContactos = document.querySelector('#FormContactos');
const NombreCorreo = document.querySelector('#NombreCorreo');
const DireccionCorreo = document.querySelector('#DireccionCorreo');
const dominioCorreo = document.querySelector('#dominio');
const AsuntoMail = document.querySelector('#AsuntoMail');
const MensajeMail = document.querySelector('#MensajeMail');

function validateFormCONTACTOS(event) {
    event.preventDefault(); // Evita que el formulario se envíe

    const NombreCorreoValue = NombreCorreo.value.trim();
    const DirEmailValue = DireccionCorreo.value.trim();
    const dominioCorreoValue = dominioCorreo.value.trim();
    const AsuntoValue = AsuntoMail.value.trim();
    const MensajeMailValue = MensajeMail.value.trim();

    const regex = /^[^()<>@,;:"[\]ç%&]*$/;
    alert(DirEmailValue)
    //console.log(MensajeMailValue)

    if (NombreCorreoValue == '') {
        alert('Por favor, ingresa tu nombre');
        NombreCorreo.focus();
        return false;
    }

    if (DirEmailValue == '') {
        alert('Por favor, ingresa tu correo electrónico');
        DireccionCorreo.focus();
        return false;
    }

    if (regex.test(DirEmailValue)) {
        alert('Por favor no ingresar @ en Email');
        DireccionCorreo.focus();
        return false;
    } else {
        alert('Por favor no ingresar @ en Email');
    }

    if (dominioCorreoValue == '') {
        alert('Por favor, seleccione un dominio de correo electrónico');
        dominioCorreo.focus();
        return false;
    }

    if (AsuntoValue == '') {
        alert('Por favor, ingresa un asunto');
        AsuntoMail.focus();
        return false;
    }

    if (MensajeMailValue == '') {
        alert('Por favor, ingresa tu Mensaje');
        MensajeMail.focus();
        return false;
    }
    // Si todo está bien, se envía el formulario
    return FormContactos.submit();
}

//alert("formulario validado")

//FormContactos.addEventListener('submit', validateForm);