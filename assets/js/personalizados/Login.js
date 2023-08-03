

function login_validacion(event) {
    event.preventDefault();

    const FormLogin = document.querySelector('#FormLogin');
    const Usuario = document.querySelector('#usuario');
    const Dominio = document.querySelector('#dominioLogin');
    const contrasena = document.querySelector('#clave');

    const UsuarioValue = Usuario.value.trim();
    const DominioValue = Dominio.value.trim();
    const contrasenaValue = contrasena.value.trim();
    
    const regex = /^[^()<>@,;:"[\]ç%&]*$/ 
    
    // valido el nombre
    if (UsuarioValue == '') {
        alert('Por favor, ingresa tu usuario');
        Usuario.focus();
        return false;
    }

    if (!regex.test(UsuarioValue)) {
        alert('Por favor No ingresar @ en el campo correo, selecciona el dominio a un lado');
        Usuario.focus();
        return false;
    }
    // valido el dominio
    if (DominioValue == '') {
        alert('Por favor, ingresa el dominio');
        nameInput.focus();
        return false;
    }
    // valido la contraseña
    if (contrasenaValue == '') {
        alert('Por favor, ingresa tu contrseña');
        contrasena.focus();
        return false;
    }
    //el formulario se envia
    //alert("Bienvenido a Rehab!");
    return FormLogin.submit();
}