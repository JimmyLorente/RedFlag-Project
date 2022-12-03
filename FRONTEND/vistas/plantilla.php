<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <meta name="title" content="Tienda Virtual">

    <meta name="description"
        content="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam accusantium enim esse eos officiis sit officia">

    <meta name="keyword"
        content="Lorem ipsum, dolor sit amet, consectetur, adipisicing, elit, Quisquam, accusantium, enim, esse">

    <title>tienda virtual</title>

    <?php 

    session_start();

    $icono=ControladorPlantilla::ctrEstiloPlantilla();

    



    /*=============================================
	MANTENER LA RUTA FIJA DEL PROYECTO
	=============================================*/

    $url=Ruta::ctrRuta();

    $urlbackend=Ruta::ctrRutaBackend();

    // echo $url;

    echo '<link rel="icon" href="'.$urlbackend.$icono["icono"].'">';
    
    ?>





    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/font-awesome.min.css">

    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/flexslider.css">

    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/sweetalert.css">


    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Ubuntu|Ubuntu+Condensed" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plantilla.css">

    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/cabezote.css">

    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/productos.css">

    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/slide.css">

    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/infoproducto.css">

    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/perfil.css">

    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/carrito-de-compras.css">





    <script src="<?php echo $url; ?>vistas/js/plugins/jquery.min.js"></script>

    <script src="<?php echo $url; ?>vistas/js/plugins/bootstrap.min.js"></script>

    <script src="<?php echo $url; ?>vistas/js/plugins/jquery.easing.js"></script>

    <script src="<?php echo $url; ?>vistas/js/plugins/jquery.scrollUp.js"></script>

    <script src="<?php echo $url; ?>vistas/js/plugins/jquery.flexslider.js"></script>

    <script src="<?php echo $url; ?>vistas/js/plugins/sweetalert.min.js"></script>





</head>

<body>


    <?php 
    /*=============================================
    CABEZOTE
    =============================================*/

    
include "modulos/cabezote.php";

/*=============================================
CONTENIDO DINÁMICO
=============================================*/

$rutas=array();
$ruta=null;
$infoProducto = null;


if(isset($_GET["ruta"])){

    //echo $_GET["ruta"];

    $rutas=explode("/" ,$_GET["ruta"]);



    /*=============================================
	URL'S AMIGABLES DE CATEGORÍAS
	=============================================*/
    $item="ruta";
    $valor=$rutas[0];

    $rutaCategorias=ControladorProductos::ctrMostrarCategorias($item,$valor);


    if($rutas[0] == $rutaCategorias["ruta"]){

        $ruta=$rutas[0];


    }

    /*=============================================
	URL'S AMIGABLES DE SUBCATEGORÍAS
	=============================================*/

    $rutaSubCategorias=ControladorProductos::ctrMostrarSubCategorias($item,$valor);

  

    foreach ($rutaSubCategorias as $key => $value) {

          if($rutas[0] == $value["ruta"]){

              $ruta=$rutas[0];


            }

    }


    	/*=============================================
	URL'S AMIGABLES DE PRODUCTOS
	=============================================*/

    $rutaProductos=ControladorProductos::ctrMostrarInfoProducto($item ,$valor);

    if($rutas[0] == $rutaProductos["ruta"]){


        $infoProducto = $rutas[0];


    }


 




    /*=============================================
	LISTA BLANCA DE URL'S AMIGABLES
	=============================================*/

    if($ruta !=null || $rutas[0] == "articulos-gratis" || $rutas[0] == "lo-mas-vendido" || $rutas[0] == "lo-mas-visto"){

        include "modulos/productos.php";



    }else if($infoProducto != null){

        include "modulos/infoproducto.php";


    }else if($rutas[0] == "buscador" || $rutas[0] == "verificar" || $rutas[0] == "salir" || $rutas[0] == "perfil" || $rutas[0] == "carrito-de-compras"){

        //include "modulos/buscador.php";

        include "modulos/".$rutas[0].".php";


    }else{


        include "modulos/error404.php";


    }



}else{

    include "modulos/slide.php";

    include "modulos/destacados.php";

   
}




?>

    <input type="hidden" value="<?php echo $url; ?>" id="rutaOculta">

    <script src="<?php echo $url; ?>vistas/js/cabezote.js"></script>
    <script src="<?php echo $url; ?>vistas/js/plantilla.js"></script>
    <script src="<?php echo $url; ?>vistas/js/slide.js"></script>
    <script src="<?php echo $url; ?>vistas/js/buscador.js"></script>
    <script src="<?php echo $url; ?>vistas/js/infoproducto.js"></script>
    <script src="<?php echo $url; ?>vistas/js/usuarios.js"></script>
    <script src="<?php echo $url; ?>vistas/js/registroFacebook.js"></script>
    <script src="<?php echo $url; ?>vistas/js/carrito-de-compras.js"></script>





    <script>
    window.fbAsyncInit = function() {
        FB.init({
            appId: '1356548395085124',
            cookie: true,
            xfbml: true,
            version: 'v15.0'
        });

        FB.AppEvents.logPageView();

    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>


</body>

</html>