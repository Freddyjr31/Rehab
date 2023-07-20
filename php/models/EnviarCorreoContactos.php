<?php 

  $nombre = $_POST['NombreCorreo'];
  $DireccionMail = $_POST['DireccionCorreo'];
  $dominioLogin = $_POST['dominio'];
  $asunto = $_POST['AsuntoMail'];
  $mensaje = $_POST['MensajeMail'];

  $CorreoUsuario = $DireccionMail.$dominioLogin;
  echo $nombre." envio : ".$mensaje." desde: ".$CorreoUsuario;

  ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = $CorreoUsuario;
    $to = "bernalfreddy6@gmail.com";
    $subject = $asunto;
    $message = $mensaje;
    $headers = "From:" . $from;

    if(mail($to,$subject,$message, $headers)){
        echo "Email enviado!!";
    }
    

    header("Location: http://localhost/agendarCitas/Rehab/html/contactos.html")

 
?>