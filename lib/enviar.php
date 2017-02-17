<?php
setlocale(LC_ALL, 'es_PE');
date_default_timezone_set("America/Lima");
include_once('php_mailer/class.phpmailer.php');

$nom = utf8_decode(trim($_POST['nombre']));
$ape = utf8_decode(trim($_POST['apellido']));
$correo = utf8_decode(trim($_POST['correo']));
$empresa = utf8_decode(trim($_POST['empresa']));
$mensaje = utf8_decode(trim($_POST['mensaje']));

$mail = new PHPMailer();
$mail->Host = "www.dietup.pe";
$mail->From = "webmaster@dietup.pe";
$mail->FromName = $nom;
$mail->Subject = "Mensaje Form. Web";
//$mail->AddAddress("jonatan_2j@hotmail.com");
if(isset($_POST["from_data"]) == "contact"){
    $mail->AddAddress("hello@dietup.pe");
}else{
    $mail->AddAddress("corporate@dietup.pe");
}

//$mail->AddReplyTo($correo, $nom);

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
$body.= "<td class='tabhead'>CORREO</td>";
$body.= "<td class='tabdata'>".$correo."</td>";
$body.= "</tr>";

$body.= "<tr>";
$body.= "<td class='tabhead'>EMPRESA</td>";
$body.= "<td class='tabdata'>".$empresa."</td>";
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

echo "Hemos recibido tu solicitud y pronto nos contactaremos contigo..!!";
?>