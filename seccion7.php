<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        .seccion7-ancho {
            height: 89vh;
            background-image: url("happypeoplestore/dist/img/fondo comentarios.jpg");
            background-size: cover;
            background-position: start;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            color: white;
        }

        .contenedor-seccion7 {
            width: 90%;
            max-width: 1500px;
            z-index: 10;
        }

        .opciones-seccion7 {
            display: flex;
            margin: 0 0 0 50px;
        }

        .opcion-seccion7 {
            clip-path: polygon(8% 0, 95% 0, 100% 100%, 0% 100%);
            background-color: #fee7b5;
            padding: 10px 35px 5px 35px;
            cursor: pointer;
            text-align: center;
            position: relative;
            border-radius: 20px 20px 0 0;
            /* Borde ovalado en la parte superior */
            overflow: hidden;
            /* Para ocultar partes del contenido que sobresalen del borde */

            /* Esquinas ovaladas en la parte superior */
        }

        .contenido-opcion-seccion7 {
            border: 4px solid black;
            border-radius: 30px;
            background-image: url("happypeoplestore/dist/img/seccion7-fondo-carpeta.jpg");
            background-size: cover;
            background-position: start;
            background-repeat: no-repeat;
            height: 75vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
        }

        .contenido {
            display: none;
            width: 100%;
        }

        /* Mostrar por defecto el contenido de "Nuestros Clientes" */
        #contenido1 {
            display: block;
        }

        .slider-seccion7 {
            width: 100%;
            overflow: hidden;
            position: relative;
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
        }

        .slides-seccion7 {
            display: flex;
            transition: transform 0.5s ease;
            cursor: grab;
            /* Cambia el cursor al hacer clic */
            touch-action: pan-y;
            /* Activa el desplazamiento táctil */
        }

        .slide-seccion7 {
            min-width: calc(100% / 3);
            box-sizing: border-box;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border: 2px solid white;
            margin-right: 10px;
        }

        .slider-nav-seccion7 {
            position: absolute;
            width: 100%;
            top: 50%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
            pointer-events: none;
        }

        .slider-nav-seccion7 button {
            background-color: rgba(0, 0, 0, 0.5);
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
            padding: 10px;
            border-radius: 25px;
            pointer-events: all;
        }

        .slider-indicators-seccion7 {
            display: flex;
            justify-content: center;
            margin-top: 40px;
        }

        .slider-indicators-seccion7 button {
            background-color: rgba(255, 255, 255, 0.5);
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            padding: 10px;
            margin: 0 5px;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .slider-indicators-seccion7 button.active {
            background-color: rgba(255, 255, 255, 1);
            color: black;
        }

        .wrapper-seccion7 {
            display: flex;
            justify-content: center;
            margin: 10px 50px 30px 50px;
        }

        .wrapper-seccion7 i {
            top: 50%;
            height: 50px;
            width: 50px;
            cursor: pointer;
            font-size: 1.25rem;
            position: absolute;
            text-align: center;
            line-height: 50px;
            background: black;
            border-radius: 50%;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.23);
            transform: translateY(-50%);
            transition: transform 0.1s linear;
        }

        .wrapper-seccion7 i:active {
            transform: translateY(-50%) scale(0.85);
        }

        .wrapper-seccion7 i:first-child {
            left: 10px;
        }

        .wrapper-seccion7 i:last-child {
            right: 10px;
        }

        .wrapper-seccion7 .carousel-seccion7 {
            display: flex;
            gap: 16px;
            overflow-x: hidden;
            border-radius: 8px;
            scroll-behavior: smooth;
        }

        .carousel-seccion7 .card-seccion7 {
            position: relative;
            flex: 1 0 calc(33.333% - 10px);
            box-sizing: border-box;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(2px);
            padding: 20px;
            border: 2px solid black;
            margin-right: 10px;
            border-radius: 30px;
            overflow: hidden;
            /* Asegura que el contenido no se desborde */
        }



        .carousel-seccion7 .card-seccion7 .img-seccion7 {
            width: 100%;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .carousel-seccion7 .card-seccion7 .img-seccion7 img {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #f20519;
        }

        .carousel-seccion7 .card-seccion7 h2 {
            font-weight: 500;
            font-size: 1.56rem;
            margin: 30px 0 5px;
            color: #FF0000;
        }

        .carousel-seccion7 .card-seccion7 span {
            color: black;
            font-size: 15px;
        }

        .boton-evento {
            background-color: transparent;
        }

        .boton-evento:hover {
            background-color: #FF0000;
            transition: background-color 0.3s ease;
        }


        @media screen and (max-width: 900px) {
            .carousel-seccion7 .card-seccion7 {
                flex: 1 0 calc(50% - 10px);
            }
        }

        @media screen and (max-width: 600px) {
            .carousel-seccion7 .card-seccion7 {
                flex: 1 0 calc(100% - 10px);
            }
        }
    </style>
</head>

<body>
    <div class="seccion7-ancho">
        <div class="contenedor-seccion7">
            <div class="opciones-seccion7">
                <div class="opcion-seccion7 opcion1" onclick="mostrarContenido('contenido1')">
                    <h3 style="color: black;">Eventos próximos</h3>
                </div>
                <div class="opcion-seccion7 opcion2" onclick="mostrarContenido('contenido2')">
                    <h3 style="color: black;">Opiniones</h3>
                </div>
                <div class="opcion-seccion7 opcion3" onclick="mostrarContenido('contenido3')">
                    <h3 style="color: black;">Clientes</h3>
                </div>
            </div>
            <div class="contenido-opcion-seccion7">
                <div class="contenido" id="contenido1">
                    <div style=" display: flex; align-items: center; justify-content: center;">
                        <h3 style="font-size: 50px; color: #f20519;">Eventos con ingreso libre</h3>
                        <img style="width: 50px; margin: 20px;"
                            src="happypeoplestore/dist/img/Happy-people-logo-oficial-ROJO-INTENSO-6.png" alt="">
                    </div>
                    <div class="wrapper-seccion7">
                        <i id="left2" class="fa-solid fa-angle-left"></i>
                        <ul class="carousel-seccion7" style="width: 90%;">
                            <li class="card-seccion7"
                                style="width: 880px; height: 300px; position: relative; background-image: url('happypeoplestore/dist/img/bannerpequeno1.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; overflow: hidden;">
                                <div
                                    style="position: absolute; bottom: 0; left: 0; background-color: rgba(0, 0, 0, 0.6); padding: 20px; border-radius: 0 25px 0 0; display: flex; align-items: center; z-index: 2;">
                                    <div
                                        style="display: flex; flex-direction: column; align-items: flex-start; justify-content: center; margin-right: 50px;">
                                        <h2 style="color: white; margin: 0 0 5px 0;">COSPLAYERS</h2>
                                        <h5 style="color: white; margin: 0 0 5px 0; font-weight: 400; color:#fde7b6">27
                                            de julio</h5>
                                    </div>
                                    <button class="boton-evento"
                                        style="margin: 10px 0 0 0; color: white; border: 1px solid white; padding: 10px 20px; cursor: pointer; border-radius: 5px;"><a
                                            style="text-decoration: none; color: white;"
                                            href="https://fb.me/e/8iIwcwuyQ">Ver
                                            Más</a></button>
                                </div>
                                <div
                                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: inherit; z-index: 1;">
                                </div>
                            </li>
                            <li class="card-seccion7"
                                style="width: 880px; height: 300px; position: relative; background-image: url('happypeoplestore/dist/img/bannerpequeno2.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; overflow: hidden;">
                                <div
                                    style="position: absolute; bottom: 0; left: 0; background-color: rgba(0, 0, 0, 0.6); padding: 20px; border-radius: 0 25px 0 0; display: flex; align-items: center; z-index: 2;">
                                    <div
                                        style="display: flex; flex-direction: column; align-items: flex-start; justify-content: center; margin-right: 50px;">
                                        <h2 style="color: white; margin: 0 0 5px 0;">FNAF HOST</h2>
                                        <h5 style="color: white; margin: 0 0 5px 0; font-weight: 400; color:#fde7b6">06
                                            de julio</h5>
                                    </div>
                                    <button class="boton-evento"
                                        style="margin: 10px 0 0 0; color: white; border: 1px solid white; padding: 10px 20px; cursor: pointer; border-radius: 5px;"><a
                                            style="text-decoration: none; color: white;"
                                            href="https://fb.me/e/vKfDDcnTr">Ver
                                            Más</a></button>
                                </div>
                                <div
                                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: inherit; z-index: 1;">
                                </div>
                            </li>
                            <li class="card-seccion7"
                                style="width: 880px; height: 300px; position: relative; background-image: url('happypeoplestore/dist/img/bannerpequeno3.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; overflow: hidden;">
                                <div
                                    style="position: absolute; bottom: 0; left: 0; background-color: rgba(0, 0, 0, 0.6); padding: 20px; border-radius: 0 25px 0 0; display: flex; align-items: center; z-index: 2;">
                                    <div
                                        style="display: flex; flex-direction: column; align-items: flex-start; justify-content: center; margin-right: 50px;">
                                        <h2 style="color: white; margin: 0 0 5px 0;">FEVER</h2>
                                        <h5 style="color: white; margin: 0 0 5px 0; font-weight: 400; color:#fde7b6">29
                                            de junio</h5>
                                    </div>
                                    <button class="boton-evento"
                                        style="margin: 10px 0 0 0; color: white; border: 1px solid white; padding: 10px 20px; cursor: pointer; border-radius: 5px;"><a
                                            style="text-decoration: none; color: white;"
                                            href="https://fb.me/e/4vZ8DZOfK">Ver
                                            Más</a></button>
                                </div>
                                <div
                                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: inherit; z-index: 1;">
                                </div>
                            </li>
                        </ul>
                        <i id="right2" class="fa-solid fa-angle-right"></i>
                    </div>
                </div>
                <div class="contenido" id="contenido2">
                    <div style=" display: flex; align-items: center; justify-content: center;">
                        <h3 style="font-size: 50px; color: #f20519;">Opiniones de nuestros clientes</h3>
                        <img style="width: 50px; margin: 20px;"
                            src="happypeoplestore/dist/img/Happy-people-logo-oficial-ROJO-INTENSO-6.png" alt="">
                    </div>
                    <div class="wrapper-seccion7">
                        <i id="left1" class="fa-solid fa-angle-left"></i>
                        <ul class="carousel-seccion7">
                            <li class="card-seccion7">
                                <div class="img-seccion7" style="margin: 0 0 20px 0;"><img
                                        src="happypeoplestore/dist/img/comentario  (1).jpeg" alt="img"
                                        draggable="false"></div>
                                <h2>Sofia Marquez</h2>
                                <span>"Los adornos navideños personalizados con diseño de IA son absolutamente hermosos.
                                    La calidad es insuperable y cada detalle es perfecto. ¡Gracias por hacer nuestra
                                    Navidad especial!"</span>
                            </li>
                            <li class="card-seccion7">
                                <div class="img-seccion7" style="margin: 0 0 20px 0;"><img
                                        src="happypeoplestore/dist/img/comentario  (2).jpeg" alt="img"
                                        draggable="false"></div>
                                <h2>Franco Ulises</h2>
                                <span>"Los productos personalizados que ordené para la fiesta de cumpleaños de mi hijo
                                    fueron un éxito. Los diseños eran únicos y la calidad inmejorable. ¡Gracias por
                                    hacer nuestro día especial!"</span>
                            </li>
                            <li class="card-seccion7">
                                <div class="img-seccion7" style="margin: 0 0 20px 0;"><img
                                        src="happypeoplestore/dist/img/comentario  (3).jpeg" alt="img"
                                        draggable="false"></div>
                                <h2>Mirian Polar</h2>
                                <span>"Encargué varios productos personalizados para una fiesta sorpresa y quedé
                                    impresionado con el resultado. Los diseños son increíbles y la calidad es de
                                    primera. Definitivamente volveré a comprar."</span>
                            </li>
                            <li class="card-seccion7">
                                <div class="img-seccion7" style="margin: 0 0 20px 0;"><img
                                        src="happypeoplestore/dist/img/comentario  (4).jpeg" alt="img"
                                        draggable="false"></div>
                                <h2>Liz Molina</h2>
                                <span>"Estoy impresionado con los productos personalizados de Navidad que pedí! El
                                    diseño con IA es sorprendente y la calidad excelente. Sin duda, han superado todas
                                    mis expectativas"</span>
                            </li>
                            <li class="card-seccion7">
                                <div class="img-seccion7" style="margin: 0 0 20px 0;"><img
                                        src="happypeoplestore/dist/img/comentario  (5).jpeg" alt="img"
                                        draggable="false"></div>
                                <h2>Susana Quispe</h2>
                                <span>"Estoy encantado con los productos navideños personalizados que adquirí. Los
                                    diseños generados por IA son únicos y la calidad es excelente. ¡Un servicio
                                    altamente recomendable!"</span>
                            </li>
                            <li class="card-seccion7">
                                <div class="img-seccion7" style="margin: 0 0 20px 0;"><img
                                        src="happypeoplestore/dist/img/comentario (6).jpg" alt="img" draggable="false">
                                </div>
                                <h2>Andrea Lupe</h2>
                                <span>"Me dieron un buen trato, ofreciendome sus productos, y ayudando a elegir mis
                                    gustos mas escondidos, estoy agradecida, por las ideas grandiosas que tienen para
                                    los regalos."</span>
                            </li>
                            <!-- Más tarjetas aquí -->
                        </ul>
                        <i id="right1" class="fa-solid fa-angle-right"></i>
                    </div>


                </div>
                <div class="contenido" id="contenido3">

                    <div style=" display: flex; align-items: center; justify-content: center;">
                        <h3 style="font-size: 50px; color: #f20519;">Nuestros Clientes Frecuentes</h3>
                        <img style="width: 50px; margin: 20px;"
                            src="happypeoplestore/dist/img/Happy-people-logo-oficial-ROJO-INTENSO-6.png" alt="">
                    </div>
                    <div class="wrapper-seccion7">
                        <i id="left2" class="fa-solid fa-angle-left"></i>
                        <ul class="carousel-seccion7">
                            <li class="card-seccion7" style="margin: auto; padding:65px">
                                <div class="img-seccion7" style="margin: 0 0 20px 0;"><img
                                        src="happypeoplestore/dist/img/cliente 1 asian fantasy.jpg" alt="img"
                                        draggable="false"></div>
                                <h2>ASIA FANTASY</h2>
                            </li>
                            <li class="card-seccion7" style="margin: auto; padding:65px">
                                <div class="img-seccion7" style="margin: 0 0 20px 0;"><img
                                        src="happypeoplestore/dist/img/cliente 2 ricardo otaku.jpg" alt="img"
                                        draggable="false"></div>
                                <h2>RICARDO OTAKU</h2>
                            </li>
                            <li class="card-seccion7" style="margin: auto; padding:65px">
                                <div class="img-seccion7" style="margin: 0 0 20px 0;"><img
                                        src="happypeoplestore/dist/img/cliente 3 sinfoni.jpg" alt="img"
                                        draggable="false"></div>
                                <h2>SINFONI</h2>
                            </li>
                            <li class="card-seccion7" style="margin: auto; padding:65px">
                                <div class="img-seccion7" style="margin: 0 0 20px 0;"><img
                                        src="happypeoplestore/dist/img/cliente 4 chica cuy.jpg" alt="img"
                                        draggable="false"></div>
                                <h2>CHICA CUY</h2>
                            </li>
                            <li class="card-seccion7" style="margin: auto; padding:65px">
                                <div class="img-seccion7" style="margin: 0 0 20px 0;"><img
                                        src="happypeoplestore/dist/img/cliente 5 asia zero.jpg" alt="img"
                                        draggable="false"></div>
                                <h2>ASIA ZERO</h2>
                            </li>
                            <li class="card-seccion7" style="margin: auto; padding:65px">
                                <div class="img-seccion7" style="margin: 0 0 20px 0;"><img
                                        src="happypeoplestore/dist/img/cliente 6 marylya.jpg" alt="img"
                                        draggable="false"></div>
                                <h2>MARYLYA</h2>
                            </li>
                            <!-- Más tarjetas aquí -->
                        </ul>
                        <i id="right2" class="fa-solid fa-angle-right"></i>
                    </div>





                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.wrapper-seccion7').forEach((wrapper, index) => {
            const leftBtn = wrapper.querySelector(`i[id^='left']`);
            const rightBtn = wrapper.querySelector(`i[id^='right']`);
            const carousel = wrapper.querySelector('.carousel-seccion7');

            leftBtn.addEventListener('click', () => {
                carousel.scrollBy({
                    left: -carousel.clientWidth / 3,
                    behavior: 'smooth'
                });
            });

            rightBtn.addEventListener('click', () => {
                carousel.scrollBy({
                    left: carousel.clientWidth / 3,
                    behavior: 'smooth'
                });
            });
        });

        function mostrarContenido(id) {
            const contenidos = document.querySelectorAll('.contenido');
            contenidos.forEach(contenido => contenido.style.display = 'none');
            document.getElementById(id).style.display = 'block';

            const opciones = document.querySelectorAll('.opcion-seccion7');
            opciones.forEach(opcion => opcion.classList.remove('opcion-seleccionada'));
            document.querySelector(`.opcion-seccion7.opcion${id.slice(-1)}`).classList.add('opcion-seleccionada');
        }
    </script>
</body>

</html>