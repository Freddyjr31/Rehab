const FormContactos = document.querySelector('#FormContactos');
const NombreCorreo = document.querySelector('#NombreCorreo');
const DireccionCorreo = document.querySelector('#DireccionCorreo');
const AsuntoMail = document.querySelector('#AsuntoMail');
const MensajeMail = document.querySelector('#MensajeMail');

function validateForm() {
   // event.preventDefault(); // Evita que el formulario se envíe

    const NombreCorreoValue = NombreCorreo.value.trim();
    const DirEmailValue = DireccionCorreo.value.trim();
    const AsuntoValue = AsuntoMail.value.trim();
    const MensajeMailValue = MensajeMail.value.trim();
    //console.log(MensajeMailValue)

    if (NombreCorreoValue == '') {
        alert('Por favor, ingresa tu nombre');
        nameInput.focus();
        return false;
    }

    if (DirEmailValue == '') {
        alert('Por favor, ingresa tu correo electrónico');
        emailInput.focus();
        return false;
    }

    if (AsuntoValue == '') {
        alert('Por favor, ingresa un asunto');
        passwordInput.focus();
        return false;
    }

    if (MensajeMailValue == '') {
        alert('Por favor, ingresa tu Mensaje');
        passwordInput.focus();
        return false;
    }
    // Si todo está bien, se envía el formulario
    return true;
}

//alert("formulario validado")

//FormContactos.addEventListener('submit', validateForm);