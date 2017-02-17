<?php
//header('Content-Type: text/xml; charset=ISO-8859-1');

session_start();
//$nomApe = trim(utf8_decode($_POST["txt_nomApe"]));
$email = trim($_POST["email"]);
$flag = false;
//$Cn = mysql_connect("209.217.225.93", "mar18hyd_wmaster", "p{us)uJhy~l&IK+g2l"); //local
$Cn = @mysql_connect("localhost", "mar18hyd_wmaster", "p{us)uJhy~l&IK+g2l"); //server
@mysql_select_db("mar18hyd_news", $Cn);
$Rs = @mysql_query("SELECT * FROM registrados WHERE email = '".$email."';", $Cn) or die("error en la Query...");
if(!mysql_affected_rows($Cn)){ // si no existe, insertar
	@mysql_query("INSERT INTO registrados VALUES('','', '".$email."','".date("Y-m-d")."', '', 1);");
	mysql_free_result($Rs);
	$flag = true;
	echo "Email registrado correctamente..!";
	?>
    <script type="text/javascript">
		$('#newsletter').reset();
	</script>
    <?php
}else{
	$Rs2 = @mysql_query("SELECT * FROM registrados WHERE email = '".$email."' AND estado = 1", $Cn) or die("error en la Query...");
	//echo "SELECT * FROM registrados WHERE email = '".$email."' AND estado = 1";
	if(mysql_affected_rows($Cn)){
		echo "El correo ingresado ya fue registrado anteriormente.";
	}else{
		$Rs3 = mysql_query("UPDATE registrados SET estado = 1 WHERE email = '".$email."';", $Cn) or die("error en la Query...");
		$flag = true;
		echo "El email ya fue registrado anteriormente, pero bloqueado. Ahora esta activo nuevamente..!";
		?>
		<script type="text/javascript">
        	$('#newsletter').reset();
        </script>
        <?php
	}
	mysql_free_result($Rs2);
}
mysql_close($Cn);

/*
if ($flag){
	
	include_once('php_mailer/class.phpmailer.php');
	$mail = new PHPMailer();
	$mail->Host = "www.hgyj-suministrosyservicios.com";
	$mail->From = "webmaster@juesmman.com";
	$mail->FromName = "Webmaster"; //esto sale en DE:
	$mail->Subject = "Nuevo correo registrado";
	$mail->AddAddress($email);
	//$mail->AddReplyTo($email, "ventas@promemics.com");
	
	$body = "<html><head><title></title></head>";
	$body.= "<body bgcolor='#000000'>";
	$body.= "<style type='text/css'>
		.p1{font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:12px; margin-bottom:5px; margin-top:5px; color:#333}
		.p2{font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:10px; margin-bottom:5px; margin-top:5px; color:#000}
		.violeta{color:#BF0071;}
		a{color:#01ACFE;}
		hr{	background-color:#FF3300; height:1px; border:none; border-style:none; width:500px;}
		div{width:500px;}
		</style>";
	
		$body.= "<div style='background:#EEEEEE; padding:15px;'>";
		$body.= "<a href='http://www.hgyj-suministrosyservicios.com/demo' target='_blank'><img src='http://www.hgyj-suministrosyservicios.com/demo/imagenes/logo2_HGyJ.jpg' width='300' height='113' border='0' /></a>";
		$body.= "<p class='p1' style='padding-top:5px;'><strong>ESTIMADO USUARIO</strong></p>";
		$body.= "<p class='p1'>Su registro en nuestra lista de correos de <strong><a href='http://www.hgyj-suministrosyservicios.com/demo'>HG&J</a></strong> se ha realizado con éxito.</p>";
		$body.= "<p class='p1'>Muy pronto le enviaremos algunas promociones de nuestros servicios..</p>";
		$body.= "<p class='p1'>&nbsp;</p>";
		$body.= "<p class='p1'>Atte.</p>";
		$body.= "<p class='p1'><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Webmaster</strong></p>";
		$body.= "<hr align='left' />";
		$body.= "<p class='p2'>Recibe este email por estar suscripto a nuestro newsletter. Si ya no desea recibir mas boletines sobre nuestros servicios, Usted puede darse de baja <a href='http://www.hgyj-suministrosyservicios.com/demo/e-lock.php'>AQUI</a></p>";
		$body.= "</div>";
	
	$body.="</body></html>";
	$mail->Body = utf8_decode($body);
	$mail->IsHTML(true);
	$mail->Send();
}
*/

?>