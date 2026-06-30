<?php
error_reporting(E_ERROR);
// DB y Funciones
//require_once $_SERVER['DOCUMENT_ROOT'] . '/swiftmail/swift_required.php';

$msg = "";

//Variables 

$nombretoponimo = (!empty($_REQUEST["nombretoponimo"])) ? strip_tags(str_replace("'", "`", $_REQUEST["nombretoponimo"])) : '';
$correoelectronico = (!empty($_REQUEST["correoelectronico"])) ? $_REQUEST["correoelectronico"] : '';
$imagenesurl = (!empty($_REQUEST["imagenesurl"])) ? $_REQUEST["imagenesurl"] : '';

//Variables Lider

if (!empty($_REQUEST["enviar_topo"]) && $_REQUEST["enviar_topo"] == "yes" && empty($nombretoponimo)) {
    $msg = "<div data-alert class='alert-box alert radius'>Nombre vacío, ingresa un nombre para tu topónimmo <a href='#' class='close'>&times;</a></div>";
}

if (!empty($_REQUEST["enviar_topo"]) && $_REQUEST["enviar_topo"] == "yes" && !empty($nombretoponimo)) {

    require './email.php';
} else {
    $msg = "<div data-alert class='alert-box success radius'>
    <p>Ingresa un nombre para tu topónimo<p>
    </div>";
}
?>
<!--
  
Developed by www.kuper.mx  
  _                          
 | |                         
 | | ___   _ _ __   ___ _ __ 
 | |/ / | | | '_ \ / _ \ '__|
 |   <| |_| | |_) |  __/ |   
 |_|\_\\__,_| .__/ \___|_|   
            | |              
            |_|                                                                                                                                
-->
<!doctype html>
<html class="no-js" lang="en">
    <head>

        <!-- Styles & JS -->
        <!-- META -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta property="og:locale" content="es_ES"/>        



        <link rel="stylesheet" href="css/foundation.css" />
        <link rel="stylesheet" href="css/normalize.css" />
        <link rel="stylesheet" href="css/styles.css" />
        <link rel="stylesheet" href="css/animate.min.css" />
        <link rel="stylesheet" href="css/fonts.css" />    



        <title>Paso 3 | Topónimos</title>

    </head>
    <body>

        <div id="container">       

            <div id="header">          
                <div class="large-10 medium-8 small-9 columns">

                    <h1>Topónimos</h1>
                    <h2>Museo Regional de Guerrero</h2>

                </div>

                <div class="large-2 medium-4 small-5 columns"> <a href="index.php" id="inicio"><img src="img/inicio.png" alt=""></a> </div>
            </div>


            <div id="content">



                <div class="large-10 top30 columns">

                    <h2>Crea tu propio topónimo </h2>
                    <hr>

                    <div class="large-8 end columns ">

                        <p><h3>Topónimo </h3> </p>
                        <hr>
                        <p> Nombre: <?= $nombretoponimo ?></p>
                        <p> Correo electrónico: <?= $correoelectronico ?> </p>
                        <div class="large-12 columns top20">
                            <p><strong>Vista previa de tu diseño:</strong></p>
                            <img src="<?= $imagenesurl ?>" alt="Tu Topónimo" style="border: 5px solid #fff; box-shadow: 0px 0px 15px rgba(0,0,0,0.2); margin:10px; max-width: 50%; height: auto;">
                        </div>

                        <form action="" method="post" id="formulario">
                            <button  id="continuar" submit class=""> Enviar por correo</button>
                            <input type="hidden" value='<?= $nombretoponimo ?>' name="nombretoponimo"/>
                            <input type="hidden" value='<?= $correoelectronico ?>' name="correoelectronico"/>
                            <input type="hidden" value='<?= $imagenesurl ?>' name="imagenesurl"/>
                            <input type="hidden" value="yes" name="enviar_topo"/>
                        </form>   

                    </div>




                </div>

                <div class="large-2 top20 columns">

                    <div class="large-12 columns links top30" >

                        <a href="creatutoponimo.html"> Reiniciar</a> 
                        <div class="large-12 columns top20"></div>



                    </div>

                </div>




            </div>



        </div> 




        <script src="js/vendor/jquery.min.js"></script>
        <script src="js/jquery.easing.1.3.js"></script>
        <script src="js/jquery.bxslider.js"></script>
        <script src="js/foundation.min.js"></script>



        <script src="js/jquery.gridly.js" type="text/javascript"></script>
        <link href="css/jquery.gridly.css" rel="stylesheet" type="text/css" />





        <script type="text/javascript">
            var idleTime = 0;
            $(document).ready(function () {
                //Increment the idle time counter every minute.
                var idleInterval = setInterval(timerIncrement, 60000); // 1 minute

                //Zero the idle timer on mouse movement.
                $(this).mousemove(function (e) {
                    idleTime = 0;
                });
                $(this).keypress(function (e) {
                    idleTime = 0;
                });

                function timerIncrement() {
                    idleTime = idleTime + 1;
                    if (idleTime > 2) { // 20 minutes
                        window.location.href = 'index.php';
                    }
                }
                $('.bxslider').bxSlider({
                    infiniteLoop: false,
                    hideControlOnEnd: true,
                    easing: 'easeOut',
                    speed: 500,
                    autoControls: true,
                    onSlideBefore: function () {
                        jQuery('video').trigger('pause');
                    }
                });
            });

        </script> 


    </body>
</html>