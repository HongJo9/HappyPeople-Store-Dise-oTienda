<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Página con Fondo de Portada</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        .container-fondo {
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url("happypeoplestore/dist/img/fondo baner.jpeg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .overlay-image2 {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            /* Asegura que la imagen superpuesta esté por encima del fondo */
        }

        .additional-overlay2 {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 2;
            /* Asegura que esta imagen adicional esté por encima de la anterior */
        }

        .relleno-seccion1 {
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            width: 100%;
            padding: 0 20px;
            box-sizing: border-box;
            position: relative;
            /* Añade posición relativa para que los elementos hijos puedan usar posiciones absolutas */
            z-index: 3;
            /* Asegura que los elementos dentro del relleno estén por encima del fondo */
        }

        .descripcion-seccion1 {
            max-width: 600px;
            margin-right: 20px;
        }

        .descripcion-seccion1 h1 {
            font-size: 50px;
            font-weight: 500;
            margin-bottom: 20px;
            display: flex;
            justify-content: start;
            position: relative;
            display: inline-block;
        }

        .resaltar {
            position: relative;
            display: inline-block;
            font-size: inherit;
            /* Asegura que el tamaño de la letra sea igual al del h1 */
        }

        .resaltar::before {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            height: 100%;
            width: 100%;
            background-color: red;
            z-index: -1;
            transform: scaleX(0);
            transform-origin: bottom left;
            animation: subrayar 2s ease-out forwards;
        }

        @keyframes subrayar {
            to {
                transform: scaleX(1);
            }
        }


        .descripcion-seccion1 p {
            font-size: 1.6em;
        }


        .imagen-seccion1 img {
            max-height: 100vh;
            width: auto;
        }

        .subrayar {
            display: inline-block;
            position: relative;
            font-size: inherit;
            /* Asegura que el tamaño de la letra sea el mismo que el del párrafo */
        }

        .subrayar img {
            display: block;
            margin-top: -3px;
            /* Ajusta este margen según sea necesario */
        }

        .image-animation {
            width: 80px;
            display: block;
            position: relative;
            left: -80px;
            /* La imagen empieza a la izquierda fuera de la vista */
            animation: subrayar-img 0.2s ease-out forwards;
            margin-top: 5px;
            /* Ajusta este margen según sea necesario */
        }

        @keyframes subrayar-img {
            to {
                left: 0;
                /* La imagen se mueve a la posición correcta */
            }
        }

        .circle {
            width: 45px;
            /* Ajusta el tamaño según sea necesario */
            height: 45px;
            border-radius: 50%;
            border: 2px solid white;
            /* Borde blanco */
            display: flex;
            justify-content: center;
            overflow: hidden;
            /* Para ocultar la parte de la imagen que se desborda */
            position: relative;
            /* Para que la imagen pueda ser posicionada relativa al contenedor */
            transition: min-height 0.5s;
            /* Agrega una transición suave */
            animation: circuloStretch 1s infinite alternate;
        }

        .circle a {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
        }

        .circle img {
            width: 20px;
            /* Ajusta el tamaño de la imagen */
            position: absolute;
            /* Posiciona la imagen absolutamente dentro del contenedor */
            animation: bounceUpDown 1s infinite alternate;
            /* Aplica la animación */
        }

        @keyframes bounceUpDown {
            0% {
                top: 10px;
                /* Posición inicial */
            }

            100% {
                top: 15px;
                /* Posición bajada */
            }
        }

        @keyframes circuloStretch {
            0% {
                transform: scaleY(1);
                /* Sin estiramiento */
            }

            100% {
                transform: scaleY(1.1);
                /* Estiramiento hacia abajo */
            }
        }

        .imagen-seccion1 {
        position: relative;
        animation: flotar 2s infinite alternate ease-in-out;
    }
    
    @keyframes flotar {
        0% {
            transform: translateY(0);
        }
        100% {
            transform: translateY(-10px);
        }
    }
    </style>
</head>

<body>
    <div class="container-fondo">
        <div class="container">
            <img class="overlay-image2" src="happypeoplestore/dist/img/rojos-ambos-lados.png" alt="Imagen superpuesta">
            <img class="additional-overlay2" src="happypeoplestore/dist/img/negro-difuminado-1-parte.png"
                alt="Otra imagen superpuesta">
            <div class="relleno-seccion1">
                <div class="descripcion-seccion1">
                    <div class="caja-descripcion">
                        <h1>"Fábrica de <span class="resaltar">regalos</span>"</h1>
                        <p>Bienvenidos a Happy People Store, donde lo que imaginas regalar lo
                            <span class="subrayar">
                                creamos
                                <img class="image-animation" style="width: 80px;" class="image-animation"
                                    src="happypeoplestore/dist/img/LINEA ROJA ANIMADA.gif" alt="">
                            </span>.
                        </p>
                        <div class="circle" id="circle">
                            <a href="javascript:void(0);">
                                <img src="happypeoplestore/dist/img/iconografia-de-flecha-para-abajo-doble.png"
                                    alt="Doble Flecha Hacia Abajo">
                            </a>
                        </div>
                    </div>
                </div>



                <div class="imagen-seccion1">
                    <img src="happypeoplestore/dist/img/chica.png" alt="Imagen de una chica">
                </div>
            </div>
        </div>
    </div>
</body>
<script>
        document.getElementById('circle').addEventListener('click', function() {
            window.scrollBy({
                top: window.innerHeight,
                behavior: 'smooth'
            });
        });
    </script>

</html>