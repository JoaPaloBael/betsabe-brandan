<?php
// Crear variables para agarrar los datos
$nombre =$_POST['nombre-apellido'];
$mail = $_POST['e-mail'];
$nacionalidad = $_POST['nacionalidad'];

//Como recibo el cuerpo del mail
$mensaje = "Este mensaje fue enviado por: " . $nombre . ",\r\n";
$mensaje .= "Su e-mail es: " . $mail . ",\r\n";
$mensaje .= "Su nacionalidad es: " . $nacionalidad . ",\r\n";
$mensaje .= "Enviado el " .date('d/m/Y', time());

//Donde recibo este contacto
$para = 'joa.palobael@gmail.com';
$asunto ='Quieren contactarte desde la web';

//Funcion mail
// a quien le mando el amil
mail($para, $asunto, utf8_decode($mensaje), $header);

header('Location:exito.html');

?>