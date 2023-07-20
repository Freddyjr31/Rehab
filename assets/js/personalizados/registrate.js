const FormCrearUsuario = document.querySelector('#FormCrearUsuario');
const nombre = document.querySelector('#nombre');
const apellido = document.querySelector('#apellido');
const sexo = document.querySelector('#sexo');
const cedula = document.querySelector('#cedula');
const correo = document.querySelector('#correo');
const dominio = document.querySelector('#dominio');
const codigo = document.querySelector('#Codigo');
const telefono = document.querySelector('#telefono');
const codigo2 = document.querySelector('#CodigoOPC');
const telefono2 = document.querySelector('#telefonoOPC');
const password = document.querySelector('#password');

function validateFormR(event) {
   event.preventDefault(); // Evita que el formulario se envíe

    const NombreValue = nombre.value.trim();
    const ApellidoValue = apellido.value.trim();
    const SexoValue = sexo.value.trim();
    const CedulaValue = cedula.value.trim();
    const CorreoValue = correo.value.trim();
    const DominioValue = dominio.value.trim();
    const CodigoValue = codigo.value.trim();
    const TelefonoValue = telefono.value.trim();
    const CodigoDosValue = codigo2.value.trim();
    const TelefonoDosValue = telefono2.value.trim();
    const ContrasenaValue = password.value.trim();
    //console.log(MensajeMailValue)
    const regex = /^[^()<>@,;:"[\]ç%&]*$/ 

    if (NombreValue == '') {
        alert('Por favor, ingrese el nombre del usuario');
        nombre.focus();
        return false;
    }

    if (ApellidoValue == '') {
        alert('Por favor, ingrese el apellido del usuario');
        apellido.focus();
        return false;
    }

    if (SexoValue == '') {
        alert('Por favor, ingrese el sexo del usuario');
        sexo.focus();
        return false;
    }

    if (CedulaValue == '') {
        alert('Por favor, ingrese el número de cédula del usuario');
        cedula.focus();
        return false;
    }

    if (CorreoValue == '') {
        alert('Por favor, ingrese un correo');
        correo.focus();
        return false;
    }

    if (!regex.test(CorreoValue)) {
        alert('Por favor, NO ingrese @ en el campo correo');
        correo.focus();
        return false;
    }

    if (DominioValue == '') {
        alert('Por favor, ingrese un Dominio de Correo');
        dominio.focus();
        return false;
    }

    if (TelefonoValue == '') {
        alert('Por favor, ingrese un número de telefono');
        telefono.focus();
        return false;
    }

    if (CodigoValue == '') {
        alert('Por favor, ingrese codigo telefonico');
        codigo.focus();
        return false;
    }

    /*if (CodigoDosValue == '') {
        alert('Por favor, ingresa tu Mensaje');
        codigo2.focus();
        return false;
    }

    if (TelefonoDosValue == '') {
        alert('Por favor, ingresa tu Mensaje');
        telefono2.focus();
        return false;
    }*/

    if (ContrasenaValue == '') {
        alert('Por favor, ingrese una contraseña');
        password.focus();
        return false;
    }
    // Si todo está bien, se envía el formulario
    return FormCrearUsuario.submit();
}

//alert("formulario validado")

//FormContactos.addEventListener('submit', validateForm);