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
    <meta property="og:locale" content="es_ES" />



    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/fonts.css" />
    <link rel="stylesheet" href="css/animate.min.css" />
    <link rel="stylesheet" href="css/fonts.css" />

    <title>Topónimos</title>

</head>

<body>

    <div id="container">

        <div id="header">

            <div class="large-12 center columns bgamarillo" id="btnUpdate">
                <h1>Topónimos</h1>
                <h2 Museo Regional de Guerrero </h2>
            </div>

        </div>


        <a href="conoceregiones.html">
            <div class="animated pulse delay-2 infinite" id="conoceregiones"> Conoce los topónimos de cada región </div>
        </a>
        <a href="creatutoponimo.html">
            <div class="animated pulse delay-2 infinite" id="creatutoponimo"> Crea tu topónimo </div>
        </a>


        <a href="creatutoponimo.html">
            <div class="animated pulse delay-2 infinite" id="seleccionarhome"> </div>
        </a>

        <a href="creatutoponimo.html" class="linkhome" id="bghome">
            <div class="large-12  columns margincero"> </div>
        </a>

        <div id="footer">

            <div class="large-2 left columns top10">
                <img src="img/cultura.png">

            </div>
            <div class="large-8 center columns top20">
                <div class="small-7 small-centered columns">
                    Mostrar como a través de imágenes los grupos étnicos prehispánicos del estado de Guerrero
                    construían los nombres de los poblados volviéndose un símbolo de identidad hasta nuestros días.
                </div>
            </div>
            <div class="large-2 left columns top10">
                <img src="img/inah.png">

            </div>

        </div>

    </div>

    <script src="js/vendor/jquery.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.bxslider.js"></script>
    <script src="js/foundation.min.js"></script>


    <script type="text/javascript">
        var idleTime = 0;
        $(document).ready(function() {
            //Increment the idle time counter every minute.
            var idleInterval = setInterval(timerIncrement, 60000); // 1 minute

            //Zero the idle timer on mouse movement.
            $(this).mousemove(function(e) {
                idleTime = 0;
            });
            $(this).keypress(function(e) {
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
                autoControls: true
            });
            $("#btnUpdate").click(function() {
                $.post("update.php", {
                    update: true
                }, function(data) {
                    alert(data); // muestra mensaje
                    location.reload(); // recarga la página
                });
            });

        });
    </script>


</body>

</html>