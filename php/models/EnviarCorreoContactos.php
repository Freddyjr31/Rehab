<?php 

  $nombre = $_POST['NombreCorreo'];
  $apellido = $_POST['ApellidoCorreo'];
  $DireccionMail = $_POST['DireccionCorreo'];
  $asunto = $_POST['AsuntoMail'];
  $mensaje = $_POST['MensajeMail'];
  $dominio = $_POST['dominio'];

  // echo $nombre." envio : ".$mensaje;

  // ini_set( 'display_errors', 1 );
  //   error_reporting( E_ALL );
  //   $from = $DireccionMail;
  //   $to = "bernalfreddy6@gmail.com";
  //   $subject = $asunto;
  //   $message = $mensaje;
  //   $headers = "From:" . $from;

  //   if(mail($to,$subject,$message, $headers)){
  //       echo "Email enviado!!";
  //   }
    

  //   header("Location: http://localhost/sistema/html/contactos.php")

///////////////////////////////////////////////////////////////////////////////////////
// Carga la biblioteca PHPMailer
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

// Crea una nueva instancia de PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer(true);

// Configura el servidor SMTP de Gmail
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'bernalfreddy6@gmail.com';
$mail->Password = 'jqyrpsmneyzvreyo';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

// Configura el remitente y el destinatario del correo
$mail->setFrom('bernalfreddy6@gmail.com', 'Remitente');
$mail->addAddress('bernalfreddy6@gmail.com', 'Destinatario');

// Configura el asunto y el cuerpo del correo
$mail->Subject = $asunto;
$mail->Body = 'Nombre y apellido: '. $nombre. ' '. $apellido.'
Correo electronico: '.$DireccionMail.$dominio.'

'. $mensaje;

// Envía el correo electrónico
if (!$mail->send()) {
    echo 'Error al enviar el correo electrónico: ' . $mail->ErrorInfo;    
    header("Location: ../../html/contactos.php?error=Error mensaje no enviado");
} else {
    echo 'El correo electrónico se ha enviado correctamente.';
    header("Location: ../../html/contactos.php?alert=Mensaje enviado!");
}
?>