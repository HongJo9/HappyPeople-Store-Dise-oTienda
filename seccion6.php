<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .fondo-seccion6 {
            height: 100vh;
            background-image: url("happypeoplestore/dist/img/fondo-seccion6.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            color: white;
            z-index: 20;
        }

        .imagen-seccion6 {
            display: flex;
            justify-content: none;
            align-items: none;
        }

        .imagen-seccion6 img {
            width: 405px;
            margin: 0 0 0 -90px;
        }

        .contenedor-seccion6 {
            position: bottom;
        }

        .contenido-seccion6 {
            margin-top: 150px;
            color: white;
            z-index: 15;
        }

        .general {
            display: flex;
            align-items: end;
        }

        .contacto-seccion6 {
            text-align: right;
        }

        .rectangulo-seccion6 {
            background-color: #00a651;
            display: inline-block;
            padding: 10px 30px;
            margin: 0;
            /* Ajusta según sea necesario */
            border-radius: 50px;
            font-size: 30px;
        }

        .contenido1-seccion6 {
            display: grid;
            grid-template-columns: 1fr auto;
            align-items: center;
            justify-content: end;
            gap: 10px;
        }

        .contenido1-whatsapp-seccion6 {
            display: grid;
            grid-template-columns: 1fr auto;
            align-items: center;
            justify-content: end;
        }

        .imagenmensaje-seccion6 img {
            width: 90px;
            position: absolute;
            margin: -30px 0 0 -80px;
        }


        .contenido1-whatsapp-seccion6 {
            display: flex;
            justify-content: end;
            align-items: center;
        }

        .imagenmensaje-seccion6 img {
            width: 100px;
            /* Ajusta el tamaño según necesites */
            height: auto;
            animation: ring 2s infinite;
        }

        @keyframes ring {
            0% {
                transform: rotate(0deg);
            }

            10% {
                transform: rotate(15deg);
            }

            20% {
                transform: rotate(-10deg);
            }

            30% {
                transform: rotate(15deg);
            }

            40% {
                transform: rotate(-10deg);
            }

            50% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(0deg);
            }
        }
    </style>
</head>

<body>
    <div class="fondo-seccion6 general">

        <div class="container">
            <div class="row contenedor-seccion6">
                <div class="col-4 imagen-seccion6">
                    <img style="position: absolute; z-index:3; margin: 37px 0 0 0;"
                        src="happypeoplestore/dist/img/fondo de rtiritas.gif" alt="">
                    <img style="z-index:5;" src="happypeoplestore/dist/img/chica-seccion6.png" alt="">
                </div>
                <div class="col-7 contenido-seccion6" style="display: flex; align-items:center; padding: 0 0 0 50px;">
                    <div style="margin: 0 0 25px 0; position: absolute; ">
                        <div class="contenido1-seccion6">
                            <div class="contacto-seccion6"
                                style="display: flex; justify-content: space-between; margin: 0 -13px 0 0;">
                                <div>

                                </div>
                                <div
                                    style="position: relative; padding: 30px; border-radius: 50px; border: 2px solid white; overflow: hidden; background: rgba(0, 0, 0, 0.1);">
                                    <div
                                        style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: inherit; backdrop-filter: blur(10px); z-index: -1; border-radius: 50px;">
                                    </div>
                                    <h2>¿Si necesitas más ayuda?</h2>
                                    <h2> Contáctanos al <span style="font-weight: 800; font-size: 30px;">984 358
                                            846</span></h2>
                                    <img style="width: 200px; margin: -20px 0 0 0" src="happypeoplestore/dist/img/LINEA ROJA ANIMADA.gif" alt="">
                                </div>
                            </div>
                        </div>
                        <div style="display: flex;" class="contenido1-whatsapp-seccion6">
                            <div class="imagenmensaje-seccion6">
                                <a href="https://wa.link/rp1q3a" target="_blank"><img src="happypeoplestore/dist/img/whatsapp-seccion6.png" alt="WhatsApp Icon"></a>
                                
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div style="width: 300px; margin: 50px 0 0 0; z-index:15;">
                                <a style="text-decoration: none; color: white;"
                                    href="https://www.google.com/maps/place/Happy+People+Store/@-16.4004443,-71.5363152,17z/data=!3m1!4b1!4m6!3m5!1s0x91424a56904008eb:0x767a131d0baec68e!8m2!3d-16.4004443!4d-71.5337403!16s%2Fg%2F11f54nglp8?entry=ttu"
                                    target="_blank">
                                    <h4 style="margin: 5px 0 25px 5px;">
                                        <span
                                            style="background-color: red; border-radius: 25px; padding: 10px 25px; font-size: 30px;">
                                            Recógelo aquí
                                        </span>
                                    </h4>
                                </a>

                                <img style="width: 170px; margin: 0 0 0 40px;"
                                    src="happypeoplestore/dist/img/qr-seccion6.png" alt="">
                            </div>
                            <div style="margin: 0 0 0 -50px; width: 450px; display:flex; align-items:end;">
                                <h2 style=" font-size:35px; margin: 0 0 20px 0">"Muchas Gracias <br> por confiar con
                                    <br>nosotros"
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>