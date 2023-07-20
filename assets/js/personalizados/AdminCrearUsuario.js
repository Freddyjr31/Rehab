const FormCrearUsuario = document.querySelector('#FormCrearUsuarioAdmin');
const nombre = document.querySelector('#nombre');
const apellido = document.querySelector('#apellido');
const sexo = document.querySelector('#sexo');
const cedula = document.querySelector('#cedula');
const correo = document.querySelector('#correo');
const dominio = document.querySelector('#dominio');
const codigo = document.querySelector('#codigo');
const telefono = document.querySelector('#telefono');
const codigo2 = document.querySelector('#codigo2');
const telefono2 = document.querySelector('#telefono2');
const tipo = document.querySelector('#tipo');
const password = document.querySelector('#password');

function validateFormCrearUsuario(event) {
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
    const TipoUsuarioValue = tipo.value.trim();
    const ContrasenaValue = password.value.trim();
    /*console.log(TipoUsuarioValue)
    alert(TipoUsuarioValue)*/

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

    if (CedulaValue.length < 6) {
        alert('Número de cédula incompleto');
        cedula.focus();
        return false;
    }

    if (CedulaValue.length > 8) {
        alert('Número de cédula excede el limite');
        cedula.focus();
        return false;
    }
    



    if (CorreoValue == '') {
        alert('Por favor, ingrese un correo');
        correo.focus();
        return false;
    }

    /*var re = /^[a-z0-9]*$/i;
    if (CorreoValue.match(re) !== null) {
        alert('Por favor, no introducir ');
        correo.focus();
        return false;
    }*/

    if (DominioValue == '') {
        alert('Por favor, ingrese un Dominio de Correo');
        dominio.focus();
        return false;
    }

    if (TelefonoValue.length < 7) {
        alert('Número de telefono incompleto');
        telefono.focus();
        return false;
    }

    if (TelefonoValue.length > 7) {
        alert('Número de télefono excede limite de caracteres');
        telefono.focus();
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

    if (TipoUsuarioValue == '') {
        alert('Por favor, seleccione un Tipo de Usuario');
        tipo.focus();
        return false;
    }

    if (ContrasenaValue == '') {
        alert('Por favor, ingrese una contraseña');
        password.focus();
        return false;
    }
    // Si todo está bien, se envía el formulario
    return FormCrearUsuario.submit();
}

//alert("formulario validado")

//FormCrearUsuario.addEventListener('submit', validateFormCrearUsuario);