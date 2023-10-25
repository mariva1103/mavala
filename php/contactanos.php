<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $to = "karol.valeka@gmail.com"; 
    $subject = "Mensaje de contacto de $name";
    $headers = "From: $email";

    if (mail($to, $subject, $message, $headers)) {
        $response = array('messaje' => 'Mensaje enviado con exito.');
        echo json_encode($response);
    } else {
        $response = array('messaje' => 'Hubo un error al enviar el mensaje.');
        echo json_encode($response);
    }
}
?>