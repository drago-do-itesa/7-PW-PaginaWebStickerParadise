<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

//Recibir parametros por GET
$email_destino = $_GET['email'];
$nombre_destino = $_GET['nombre'];

//Cuerpo del mensaje en HTML
$cuerpo_mensaje = "<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset='UTF-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Document</title>
  <!-- Importar librerias para bootstrap desde enlace web-->
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
</head>
<body>
  <!-- Mensaje de aviso de eliminacion de cuenta con estilos de bootstrap -->
  <div class='container'>
    <div class='row'>
      <div class='col-md-6 col-md-offset-3'>
        <div class='panel panel-danger'>
          <div class='panel-heading'>
            <h3 class='panel-title'>Eliminacion de cuenta</h3>
          </div>
          <div class='panel-body'>
          <!-- Mostrar icono de la pagina -->
            <img src='/Imagenes/logo.ico'  style='max-width: 100px;' alt='StickerParadise'>
            <p><b>Hola, $nombre_destino</b><br><br> Te informamos que tu cuenta solicito el borrado de esta de nuestra base de
              datos, para
              confirmar esta accion preciona el boton de abajo..<br><br>
              <a href='localhost/php/borrar-cuenta.php?id=$email_destino' class='btn tarjeta-boton' >Eliminar cuenta</a>
              <br><br>
              Si tienes alguna duda, puedes contactarnos a través de nuestro formulario de contacto.<br><br>
              Atentamente,<br> Equipo de StickerParadise
            </p>
            <br><br>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>";
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
  //Server settings
  // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
  $mail->isSMTP();                                            //Send using SMTP
  $mail->Host       =  'smtp.gmail.com';                     //Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
  $mail->Username   = '18030056@itesa.edu.mx';                     //SMTP username
  $mail->Password   = 'nenaceci';                               //SMTP password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
  $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //Recipients
  $mail->setFrom('18030056@itesa.edu.mx', 'Aviso Sticker Paradise');
  $mail->addAddress($email_destino, $nombre_destino);     //Add a recipient

  //Attachments
  //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
  //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'Confirma la eliminacion de tu cuenta';
  $mail->Body    = $cuerpo_mensaje;
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  $mail->send();
  echo 'Message has been sent';
} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
