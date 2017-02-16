<?php
$destino= "corporate@dietup.pe";
$nombre = $_POST["nombre"]
$apellido = $_POST["apellido"]
$correo = $_POST["correo"]
$empresa = $_POST["empresa"]
$mensaje = $_POST["mensaje"]
$contenido ="nombre: " . $nombre . "\nApellido: " . $apellido . "\nCorreo: " .$nCorreo . "\nEmpresa: " .$nEmpresa . "\nMensaje: " .$mensaje
mail($destino,"Contacto", $contenido);
header("location:index.html"
	?>

