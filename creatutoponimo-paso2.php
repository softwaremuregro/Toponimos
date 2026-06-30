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



        <title>Paso 2 | Topónimos</title>

    </head>
    <body>
        <?php
        $imagenes = [];

        foreach ($_REQUEST as $nombreCampo => $valor) {
            if (!empty($valor)) {
                $imagen = "";
                if ($nombreCampo === "v1-n")
                    $imagen = "1_glifo.png";
                if ($nombreCampo === "v2-n")
                    $imagen = "2_glifo.png";
                if ($nombreCampo === "v3-n")
                    $imagen = "3_glifo.png";
                if ($nombreCampo === "v4-n")
                    $imagen = "4_glifo.png";
                if ($nombreCampo === "v5-n")
                    $imagen = "5_glifo.png";
                if ($nombreCampo === "v6-n")
                    $imagen = "6_glifo.png";
                if ($nombreCampo === "v7-n")
                    $imagen = "7_glifo.png";
                if ($nombreCampo === "v8-n")
                    $imagen = "8_glifo.png";
                if ($nombreCampo === "v9-n")
                    $imagen = "9_glifo.png";
                if ($nombreCampo === "v10-n")
                    $imagen = "10_glifo.png";
                if ($nombreCampo === "v11-n")
                    $imagen = "11_glifo.png";
                if ($nombreCampo === "v12-n")
                    $imagen = "12_glifo.png";
                if ($nombreCampo === "v13-n")
                    $imagen = "13_glifo.png";
                if ($nombreCampo === "v14-n")
                    $imagen = "14_glifo.png";
                if ($nombreCampo === "v15-n")
                    $imagen = "15_glifo.png";
                if ($nombreCampo === "v16-n")
                    $imagen = "16_glifo.png";
                if ($nombreCampo === "v17-n")
                    $imagen = "17_glifo.png";
                if ($nombreCampo === "v18-n")
                    $imagen = "18_glifo.png";
                if ($nombreCampo === "v19-n")
                    $imagen = "19_glifo.png";
                if ($nombreCampo === "v20-n")
                    $imagen = "20_glifo.png";
                if ($nombreCampo === "v21-n")
                    $imagen = "21_glifo.png";
                if ($imagen !== "")
                    $imagenes[] = $imagen;
            }
        }
        //var_dump($imagenes);
        ?>
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

                    <div class="large-6 columns top40 ">

                        <p><h3>Arrástra los elementos según el orden que quieras. </h3> </p>
                        <h3>"Toque una vez el elemento para <span style="color: blue; font-weight: bold;">agrandarlo</span>; mantenga el dedo presionado para <span style="color: red; font-weight: bold;">reducirlo.</span>"</h3>
                        <hr>

                        <div class="gridly" id="ordenamiento">


                        </div>
                        <div id="creadortoponimos"></div>
                    </div>

                    <div class="large-6 columns top40 ">

                        <p><h3>¿Cómo se leería tu topónimo? </h3> </p>
                        <hr>
                        <p> Recuerda que tlan significa “lugar de” y  Co significa “en”.</p>


                        <form action="creatutoponimo-paso3.php" id="formulario" method="post">


                            <input type="text" required id="valor1-nombre" name="nombretoponimo" placeholder="Nombre de tu topónimo">
                            <input type="email" required id="valor1-correo" name="correoelectronico" placeholder="Correo electrónico">

                            <input type="hidden" required id="orden" name="imagenesurl" placeholder="orden">

                            <button  id="continuar" submit class=""> Siguiente</button> 

                        </form>   

                    </div>


                    <div class="large-2 top20 columns">

                        <div class="large-12 columns links top30" >

                            <a href="creatutoponimo.html"> Reiniciar</a> 
                            <div class="large-12 columns top20"></div>



                        </div>

                    </div>


                </div>



            </div> 


            <script src="js/phaser.min.js"></script>


            <script type="text/javascript">

                class Example extends Phaser.Scene {
                    preload() {
                        this.load.setBaseURL('img/links');
                        this.load.image('imagen1', <?php echo "'$imagenes[0]'"; ?>);
                        this.load.image('imagen2', <?php echo "'$imagenes[1]'"; ?>);
                        this.load.image('imagen3', <?php echo "'$imagenes[2]'"; ?>);
                    }
                    create() {
                        // Obligatorio para detectar más de un dedo
                        this.input.addPointer(2);
                        this.crearSpritePro(200, 120, 'imagen1');
                        this.crearSpritePro(400, 120, 'imagen2');
                        this.crearSpritePro(325, 300, 'imagen3');
                    }

                    crearSpritePro(x, y, key) {
                        const sprite = this.add.sprite(x, y, key).setInteractive({draggable: true});
                        //this.ajustarEscala(sprite,-0.1);
                        // Variable para detectar si fue un clic rápido o mantener presionado
                        let holdTimer;

                        sprite.on('pointerdown', (pointer) => {
                            this.children.bringToTop(sprite);

                            // Iniciamos un temporizador: si pasan 500ms, el objeto se encoge
                            holdTimer = this.time.delayedCall(100, () => {
                                if (pointer.isDown) {
                                    this.ajustarEscala(sprite, -0.2); // Encoge
                                    sprite.isLongPress = true; // Marcamos que fue presión larga
                                }
                            });
                        });

                        sprite.on('pointerup', (pointer) => {
                            // Cancelamos el temporizador al soltar
                            if (holdTimer)
                                holdTimer.remove();

                            // Si se soltó rápido y NO fue movimiento ni presión larga: Agranda
                            let duration = pointer.upTime - pointer.downTime;
                            if (duration < 200 && !sprite.isLongPress) {
                                this.ajustarEscala(sprite, 0.2);
                            }

                            sprite.isLongPress = false;
                        });

                        sprite.on('drag', (pointer, dragX, dragY) => {
                            // Si empezamos a arrastrar, cancelamos el "encoger" por tiempo
                            if (holdTimer)
                                holdTimer.remove();
                            sprite.x = dragX;
                            sprite.y = dragY;
                        });

                        return sprite;
                    }

                    ajustarEscala(objetivo, cantidad) {
                        let nuevaEscala = Phaser.Math.Clamp(objetivo.scale + cantidad, 0.4, 4);
                        this.tweens.add({
                            targets: objetivo,
                            scale: nuevaEscala,
                            duration: 100,
                            ease: 'Back.easeOut'
                        });
                    }
                }

                const config = {
                    type: Phaser.AUTO,
                    width: 650,
                    height: 400,
                    backgroundColor: '#efefef',
                    parent: 'creadortoponimos',
                    scene: Example,
                    input: {
                        activePointers: 3 // Necesario para detectar el segundo dedo
                    },
                    canvasContextAttributes: {
                        preserveDrawingBuffer: true// necesario para crear captura del canvas de phaser
                    }
                };

                const game = new Phaser.Game(config);

            </script>

            <script src="js/vendor/jquery.min.js"></script>
            <script src="js/jquery.easing.1.3.js"></script>
            <script src="js/jquery.bxslider.js"></script>
            <script src="js/foundation.min.js"></script>

            <script src="js/jquery.keyboard.js"></script>
            <script src="js/jquery.mousewheel.js"></script>
            <script src="js/jquery.keyboard.extension-extender.js"></script>
            <script src="js/jquery.keyboard.extension-typing.js"></script>
            <script src="js/keyboard-es.js"></script>
            <link href="css/jquery.gridly.css" rel="stylesheet" type="text/css" />

            <script src="js/jquery.gridly.js" type="text/javascript"></script>
            <link href="css/keyboard-dark.css" rel="stylesheet" type="text/css" />


            <script type="text/javascript">

                $(document).ready(function () {

                    $i1 = $("#i-1").html();
                    $i2 = $("#i-2").html();
                    $i3 = $("#i-3").html();

                    $('#orden').attr({'value': $i1 + $i2 + $i3});

                    var reordered = function ($elements) {

                        // Called after the drag and drop ends with the elements in their ending position.

                        /*
                         var imagesArray = $("#ordenamiento").find("img").map(function()
                         {
                         return $(this).attr("src");
                         }).get();
                         
                         var newHTML = [];
                         
                         for (var i = 0; i < imagesArray.length; i++) {
                         newHTML.push("<img src='" + imagesArray [i] + "'/>");
                         }
                         
                         $('#orden').attr({'value' : newHTML });
                         console.log();  
                         */



                    };
                    $('.gridly').gridly({
                        callbacks: {reordered: reordered}

                    });


                    $('#valor1-nombre, #valor1-correo ').keyboard({
                        layout: 'custom',
                        customLayout: {

                            'normal': [
                                '1 2 3 4 5 6 7 8 9 0 {bksp}',
                                ' q w e r t y u i o p',
                                'a s d f g h j k l ñ {accept}',
                                'z x c v b n m - . _ @',
'@gmail.com @outlook.com @yahoo.es @hotmail.com',
                                ' {space}  ']
                        },
                        usePreview: true,
                        acceptValid: true,
                        validate: function (kb, val) {
                            return val.length > 1;
                        }
                    });

                });
            </script>

            <script>


            </script>



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
                $('#formulario').on('submit', function (e) {
                    var form = this;

                    // Si ya tenemos la imagen en el input, permitimos el envío
                    if ($('#orden').val().indexOf('data:image') !== -1) {
                        return true;
                    }

                    // Si no, detenemos el envío para tomar la foto
                    e.preventDefault();

                    game.renderer.snapshot(function (image) {
                        if (image && image.src) {
                            // Guardamos el Base64 en el input hidden
                            $('#orden').val(image.src);
                            // Ahora sí enviamos el formulario por POST
                            form.submit();
                        } else {
                            alert("Error al generar la imagen. Intenta mover un glifo e intentar de nuevo.");
                        }
                    });
                });
            </script> 


    </body>
</html>