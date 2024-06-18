<?php
// Recibir los datos del formulario
$nombre = $_POST['fullName'];
$email = $_POST['email'];
$asunto = $_POST['subject'];
$mensaje = $_POST['message'];

// Validar que los campos no estén vacíos
if (empty($nombre) || empty($email) || empty($asunto) || empty($mensaje)) {
  echo "Por favor, completa todos los campos";
  exit;
}

// Validar que el email sea válido
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "Por favor, ingresa un email válido";
  exit;
}

// Definir el destinatario del correo
$destino = "hansnav@outlook.com";

// Definir el asunto y el cuerpo del correo
$asunto = "Formulario de contacto: " . $asunto;
$cuerpo = "Has recibido un mensaje de: " . $nombre . "\n";
$cuerpo .= "Correo electrónico: " . $email . "\n";
$cuerpo .= "Mensaje: " . $mensaje;

// Enviar el correo usando la función mail de PHP
if (mail($destino, $asunto, $cuerpo)) {
  echo "Tu mensaje ha sido enviado con éxito";
} else {
  echo "Hubo un error al enviar el mensaje";
}
?>