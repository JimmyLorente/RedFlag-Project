<?php 

require_once "controladores/plantilla.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/slide.controlador.php";
require_once "controladores/usuarios.controlador.php";


require_once "modelo/slide.modelo.php";
require_once "modelo/plantilla.modelo.php";
require_once "modelo/producto.modelo.php";
require_once "modelo/rutas.php";
require_once "modelo/usuarios.modelo.php";
require_once "extensiones/PHPMailer/PHPMailerAutoload.php";
require_once "extensiones/vendor/autoload.php";


$plantilla=new ControladorPlantilla();
$plantilla->plantilla();



?>