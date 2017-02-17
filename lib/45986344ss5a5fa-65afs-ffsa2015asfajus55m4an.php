<?php
setlocale(LC_ALL, 'es_PE');
date_default_timezone_set("America/Lima");
//header('Content-Type: text/xml; charset=ISO-8859-1');
include_once('php_mailer/class.phpmailer.php');

//sleep(1);
//-------------------------

$nom = utf8_decode(trim($_POST['nombre']));
$ape = utf8_decode(trim($_POST['apellido']));
$email = utf8_decode(trim($_POST['email']));
$servicio = utf8_decode(trim($_POST['servicio']));
$mensaje = utf8_decode(trim($_POST['mensaje']));

$mail = new PHPMailer();
$mail->Host = "www.juesmman.com";
$mail->From = "webmaster@juesmman.com";
$mail->FromName = $nom;
$mail->Subject = "Mensaje Form. Web";
//$mail->AddAddress("jonatan_2j@hotmail.com");
$mail->AddAddress("jvilchez@juesmman.com");
$mail->AddAddress("ckohler@juesmman.com");
$mail->AddAddress("atorres@juesmman.com");

$mail->AddReplyTo($email, $nom);

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
    $body.= "<td width='200' class='tabhead'>APELLIDO</td>";
    $body.= "<td width='300' class='tabdata'>".$ape."</td>";
  $body.= "</tr>";
  
  $body.= "<tr>";
    $body.= "<td class='tabhead'>EMAIL</td>";
    $body.= "<td class='tabdata'>".$email."</td>";
  $body.= "</tr>";

  $body.= "<tr>";
    $body.= "<td class='tabhead'>SERVICIO</td>";
    $body.= "<td class='tabdata'>".$servicio."</td>";
  $body.= "</tr>";
  
  $body.= "<tr>";
    $body.= "<td class='tabhead' colspan='2'>MENSAJE</td>";
  $body.= "</tr>";
  $body.= "<tr>";
    $body.= "<td class='tabdata' colspan='2'>".$mensaje."</td>";
  $body.= "</tr>";
$body.= "</table>";
$body.="</body></html>";

$mail->Body = $body;
$mail->IsHTML(true);
$mail->Send();

echo "Mensaje enviado!";
?>
