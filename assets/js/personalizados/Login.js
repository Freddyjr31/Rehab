function login_validacion() {
    //valido el nombre
    if (document.form_login_user.user_name.value.length == 0) {
        alert("Campo vacio")
        document.form_login_user.user_name.focus()
        return 0;
    }
    //valido el password
    if (document.form_login_user.user_pass.value.length == 0) {
        alert("Campo vacio")
        document.form_login_user.user_pass.focus()
        return 0;
    }
    //el formulario se envia
    alert("Bienvenido!");
    document.form_login_user.submit();
}