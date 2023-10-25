<?php
if (isset($_POST)) {
    $para = $_POST['email'];
    $de = 'karol.valeka@gmail.com';
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';
    // Configurar PHPMailer
    $user = 'karol.valeka@gmail.com';
    $pass = 'pfulkmtbeugaeuwo';
    $mailer  = new PHPMailer;
    $mailer->CharSet = 'UTF-8';
    $mailer->isSMTP();
    $mailer->Host = 'smtp.gmail.com';
    $mailer->SMTPAuth = true;
    $mailer->Username = $user;
    $mailer->Password = $pass;
    $mailer->SMTPSecure = 'tls';
    $mailer->Port = 587;
    $mailer->setFrom($user);
    $mailer->addAddress($para);
    $mailer->isHTML(true);

    // Obtener adjuntos

    // Construir el cuerpo del mensaje
    $body = '¡Hola ' . $_POST['nombre'] . ' ' . $_POST['apellido'] .  ' recibimos el siguiente mensaje tuyo "' . $_POST['mensaje'] . '" en unos minutos nos contactaremos para despejar tus dudas!';

    $mailer->Subject = 'Correo informativo: ';
    $mailer->Body = $body;

    // Enviar el correo reenviado
    if (!$mailer->send()) {
        echo 'Hubo un error';
    } else {
        echo  'Correo enviado exitosamente';
    }
}