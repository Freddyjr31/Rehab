<?php 

  $nombre = $_POST['NombreCorreo'];
  $DireccionMail = $_POST['DireccionCorreo'];
  $asunto = $_POST['AsuntoMail'];
  $mensaje = $_POST['MensajeMail'];

  echo $nombre." envio : ".$mensaje;

  ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = $DireccionMail;
    $to = "bernalfreddy6@gmail.com";
    $subject = $asunto;
    $message = $mensaje;
    $headers = "From:" . $from;

    if(mail($to,$subject,$message, $headers)){
        echo "Email enviado!!";
    }
    

    header("Location: http://localhost/sistema/html/contactos.html")


?>