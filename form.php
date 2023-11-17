<?php
/**
 * @version 1.0
 */

require("class.phpmailer.php");
require("class.smtp.php");

// Valores enviados desde el formulario
if ( !isset($_POST["nombre"]) || !isset($_POST["email"]) || !isset($_POST["nacionalidad"]) ) {
    die ("Es necesario completar todos los datos del formulario");
}
$nombre = $_POST["nombre"];
$email = $_POST["email"];
$nacionalidad = $_POST["nacionalidad"];

// Datos de la cuenta de correo utilizada para enviar vía SMTP
$smtpHost = "c2102219.ferozo.com";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "info@libre-mente.com.ar";  // Mi cuenta de correo
$smtpClave = "92CeBM@5aR";  // Mi contraseña

// Email donde se enviaran los datos cargados en el formulario de contacto
$emailDestino = "info@libre-mente.com.ar";

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Port = 465; 
$mail->SMTPSecure = 'ssl';
$mail->IsHTML(true); 
$mail->CharSet = "utf-8";


// VALORES A MODIFICAR //
$mail->Host = $smtpHost; 
$mail->Username = $smtpUsuario; 
$mail->Password = $smtpClave;

$mail->From = $email; // Email desde donde envío el correo.
$mail->FromName = $nombre;
$mail->AddAddress($emailDestino); // Esta es la dirección a donde enviamos los datos del formulario

$mail->Subject = "Quieren contactarte desde la web"; // Este es el titulo del email.
$mail->Body = "Este mensaje fue enviado por: {$nombre},\r\n";
$mail->Body .= "Su e-mail es: {$email},\r\n";
$mail->Body .= "Su nacionalidad es: {$nacionalidad},\r\n";
$mail->Body .= "Enviado el " . date('d/m/Y', time());
// Texto del email en formato HTML
$mail->AltBody = "{$nombre} \n\n Formulario de ejemplo By DonWeb"; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //

$estadoEnvio = $mail->Send(); 
if($estadoEnvio){
    header('Location:exito.html');
} else {
    echo "Ocurrió un error inesperado.";
}
