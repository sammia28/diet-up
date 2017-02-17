<?php
setlocale(LC_ALL, 'es_PE');
date_default_timezone_set("America/Lima");
//header('Content-Type: text/xml; charset=ISO-8859-1');
include_once('php_mailer/class.phpmailer.php');

//sleep(1);
//-------------------------

$nom = utf8_decode(trim($_POST['nombre']));
$dni = utf8_decode(trim($_POST['dni']));
$email = utf8_decode(trim($_POST['email']));

$nombreArchivo = $_FILES["adjunto"]['name'];
$tmpArchivo = $_FILES['adjunto']['tmp_name'];

$mail = new PHPMailer();
$mail->Host = "www.juesmman.com";
$mail->From = "webmaster@juesmman.com";
$mail->FromName = $nom;
$mail->Subject = "Mensaje Form. CV";
//$mail->AddAddress("jonatan_2j@hotmail.com");
$mail->AddAddress("trabajaconnosotros@juesmman.com");

$mail->AddReplyTo($email, $nom);
$mail->AddAttachment($tmpArchivo, $nombreArchivo);

$body = "<html><head><title></title></head>";
$body.= "<body bgcolor='#FFFFFF'>";
$body.= "<style type='text/css'>
.tabformat {border:1px solid #CCCCCC;};
.tabhead {
	color: #000000;
	font-family : Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size : 8pt;
	font-weight : normal;
	text-align : left;
	border: 0pt solid #000000;
	padding-bottom : 3px;
	padding-left : 7px;
	padding-right : 2px;
	padding-top : 3px;
	background-color:#F2F2F2;
	visibility : visible;
}
.tabdata {
	font-size : 9pt;
	font-family : Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-weight : normal;
	text-align : left;
	color: #004B97;
	border: 0pt solid #000000;
	padding-bottom : 3px;
	padding-left : 10px;
	padding-right : 2px;
	padding-top : 3px;
	background-color :#F9F9F9;
	visibility : visible;
}
</style>";

$body.= "<table width='500' border='0' class='tabformat' cellspacing='1' cellpadding='0'>";
  $body.= "<tr>";
    $body.= "<td width='200' class='tabhead'>NOMBRE</td>";
    $body.= "<td width='300' class='tabdata'>".$nom."</td>";
  $body.= "</tr>";
  
  $body.= "<tr>";
    $body.= "<td width='200' class='tabhead'>DNI</td>";
    $body.= "<td width='300' class='tabdata'>".$dni."</td>";
  $body.= "</tr>";
  
  $body.= "<tr>";
    $body.= "<td class='tabhead'>EMAIL</td>";
    $body.= "<td class='tabdata'>".$email."</td>";
  $body.= "</tr>";

$body.= "</table>";
$body.="</body></html>";

$mail->Body = $body;
$mail->IsHTML(true);
$mail->Send();

echo "ok";
?>
