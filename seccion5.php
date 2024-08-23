<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .fondo-seccion5 {
            height: 110vh;
            background-image: url("happypeoplestore/dist/img/seccion5Fondo.jpg");
            background-size: cover;
            background-position: top;
            background-repeat: no-repeat;
            display: flex;
            color: white;
            z-index: 0;
        }

        .accordion1,
        .accordion2,
        .accordion3 {
            display: flex;
            justify-content: center;
        }

        .cartas-seccion5 {
            top: 100px;
            left: 45px;
            margin: 100px 0 0 0;
        }

        .folder {
            background-image: url("happypeoplestore/dist/img/folder.png");
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
            height: 110vh;
            position: relative;
            margin-top: 0px;
            padding: 0;
        }

        .requirements {
            text-align: left;
            position: absolute;
            top: 42%;
            left: 45%;
            transform: translate(-50%, -50%) rotate(-15deg);
            width: 270px;
            padding: 20px;
            box-sizing: border-box;
        }

        .requirements h2 {
            font-size: 30px;
            margin-bottom: 20px;
            transform: rotate(4deg);
        }

        .requirements p {
            font-size: 1.5rem;
            margin: 0 0 0 20px;
            cursor: pointer;
            position: relative;
            display: inline-block;
        }

        .requirements p span {
            font-size: 30px;
        }

        .requirements p:before {
            content: "";
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #FF0000;
            visibility: hidden;
            transition: all 0.3s ease-in-out;
        }

        .requirements p:hover:before,
        .requirements p.active:before {
            visibility: visible;
            width: 45%;
            margin: 0 0 5px 0;
        }

        .requirements p:hover,
        .requirements p.active {
            color: #FF0000;
        }

        .accordion-container {
            display: none;
            transform-origin: top left;
            transition: transform 0.5s;
            z-index: 2;
        }

        .accordion {
            display: flex;
            justify-content: center;
            align-items: center;
            perspective: 2300px;
        }

        .detalles-seccion5-requisitos {
            position: absolute;
            margin: 50% 10% 10% 5%;
            backdrop-filter: blur(5px);
            color: black;
            padding: 20px;
            border-radius: 25px;
            border: 3px dotted white;
        }

        .detalles-seccion5-requisitos:hover {
            backdrop-filter: blur(50px);
            background: rgba(0, 0, 0, 0.57);
            color: white;
        }

        .detalles-seccion5-requisitos div {
            text-align: center;
            font-weight: bold;
        }

        .detalles-seccion5-requisitos div p {
            text-align: center;
            font-weight: bold;
        }

        .boton-requisitos {
            text-align: center;
            background-color: #FF0000;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            background-color: #FF0000;
            color: white;
            border-radius: 5px;
        }

        .boton-requisitos:hover {
            text-decoration: none;
            background-color: white;
            color: #FF0000;
        }

        .boxe {
            position: relative;
            width: 300px;
            height: 300px;
            transform-style: preserve-3d;
            animation: animate 15s linear infinite;
        }

        .boxe:hover {
            animation-play-state: paused;
        }

        @keyframes animate {
            0% {
                transform: rotateY(0deg);
            }

            100% {
                transform: rotateY(360deg);
            }
        }

        .boxe span {
            position: absolute;
            top: 60px;
            left: 0;
            width: 100%;
            height: 100%;
            transform-origin: center;
            transform-style: preserve-3d;
            transform: rotateY(calc(var(--i) * 360deg / var(--total))) translateZ(var(--distance));
            box-reflect: below 2px linear-gradient(transparent, transparent, rgba(4, 4, 4, 0.267));
        }

        .boxe span img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            transition: 0.5s;
            border-radius: 15px;
            border: 4px double rgb(0, 0, 0);
        }

        .req-fav:hover {
            transform: translateY(-10px);
        }

        .accordion-container.show {
            display: flex;
        }

        #container {
            font-family: 'Courier New', Courier, monospace;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .animated-text {
            display: inline-block;
            white-space: pre;
            font-size: 10px;
            /* Adjusted font size */
        }

        .char {
            display: inline-block;
            opacity: 0;
            transform: scale(2);
            animation: typing 1s forwards;
            font-size: 18px;
            color: red;
            z-index: 10;
            /* Adjusted font size for animation */
        }

        @keyframes typing {
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .contenedor-padre {
            display: flex;
            align-items: start;
        }

        .contenedor {
            display: flex;
            flex-direction: column;
            align-items: center;
            /* Alinear elementos verticalmente */
            margin-right: 20px;
            /* Espacio entre los contenedores */
        }


        @keyframes zoom-in {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.03);
            }

            100% {
                transform: scale(1);
            }
        }

        .zoom-effect {
            animation: zoom-in 2s ease-in-out infinite;
            transform-origin: bottom right;
            /* Establece el punto de origen en la esquina inferior derecha */
        }

    </style>
</head>

<body>
    <div class="fondo-seccion5">
        <div class="container">
            <div class="row seccion4-contenido">
                <div class="col-7">
                    <div class="folder">
                        <div class="requirements">
                            <h2>Requerimientos del cliente:</h2>
                            <img style="position: absolute; width:80px; margin: -22px -150px 0 60px" src="happypeoplestore/dist/img/LINEA ROJA ANIMADA.gif" alt="">
                            <p><span class="requirement" data-target="#accordionBonito">✔ Bonito</span><img style="width: 
                                    60px;"
                                    src="happypeoplestore/dist/img/gif flecha derecha pequena roja (1200 x 1200 px).gif"
                                    alt=""></p>
                            <p><span class="requirement" data-target="#accordionBarato">✔ Barato</span><img style="width: 
                                    60px;"
                                    src="happypeoplestore/dist/img/gif flecha derecha pequena roja (1200 x 1200 px).gif"
                                    alt=""></p>
                            <p><span class="requirement" data-target="#accordionBueno">✔ Bueno</span><img style="width: 
                                    60px;"
                                    src="happypeoplestore/dist/img/gif flecha derecha pequena roja (1200 x 1200 px).gif"
                                    alt=""></p>
                        </div>
                    </div>
                </div>
                <div class="col-5 cartas-seccion5">
                    <div class="imagen-anuncio">
                        <div class="contenedor" style="position: absolute; margin: -50px 0 0 -270px; z-index:50">
                            <img class="zoom-effect" style="width: 340px;"
                                src="happypeoplestore/dist/img/vineta-roja-happy-peolple.png" alt="">
                        </div>
                        <div class="contenedor" style="position: absolute;">
                            <img style="width: 350px;" src="happypeoplestore/dist/img/chica-redondo-rubia.png" alt="">
                        </div>
                        <div class="contenedor" style="position: absolute; margin: 0 0 0 -210px; z-index:60">
                            <h2 id="line1" class="animated-text .zoom-effect"></h2>
                            <h2 id="line2" class="animated-text .zoom-effect"></h2>
                            <h2 id="line3" class="animated-text .zoom-effect"></h2>
                            <h2 id="line4" class="animated-text .zoom-effect"></h2>
                        </div>
                    </div>

                    <div id="accordionBonito" class="accordion-container">
                        <h1 style="position:absolute; margin: -30px 0 0 0; color:#fce6b4">Captura tu producto</h1>
                        <div class="accordion accordion1">
                            <?php
                            // Realiza la consulta SQL para obtener los productos
                            $query = "SELECT * FROM productos WHERE requisitos = 'Bonito'";
                            $resultado = mysqli_query($con, $query);

                            // Inicializa un array para almacenar los productos
                            $productos = [];

                            // Recorre los resultados y almacena cada fila como un elemento en el array de productos
                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                $productos[] = $fila;
                            }

                            $totalProductos = count($productos);
                            $distance = 300;
                            ?>

                            <div class="boxe">
                                <?php foreach ($productos as $key => $producto) { ?>
                                    <span
                                        style="--i: <?php echo $key + 1; ?>; --total: <?php echo $totalProductos; ?>; --distance: <?php echo $distance; ?>px;">
                                        <img class="req-fav" src="happypeoplestore/<?php echo $producto['imgProducto']; ?>"
                                            alt="Producto <?php echo $key + 1; ?>" />
                                        <div class="detalles-seccion5-requisitos">
                                            <h6><?php echo $producto['nombre']; ?></h6>
                                            <p>Precio: S/. <?php echo $producto['precio']; ?></p>
                                            <a class="boton-requisitos"
                                                href="index.php?modulo=detalleProductoPerso&id=<?php echo $producto['id']; ?>"
                                                class="btn btn-primary">Ver más</a>
                                        </div>
                                    </span>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div id="accordionBarato" class="accordion-container">
                        <h1 style="position:absolute; margin: -30px 0 0 0; color:#fce6b4">Aprovecha la oportunidad</h1>
                        <div class="accordion accordion2">
                            <?php
                            // Realiza la consulta SQL para obtener los productos
                            $query = "SELECT * FROM productos WHERE requisitos = 'Barato'";
                            $resultado = mysqli_query($con, $query);

                            // Inicializa un array para almacenar los productos
                            $productos = [];

                            // Recorre los resultados y almacena cada fila como un elemento en el array de productos
                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                $productos[] = $fila;
                            }

                            $totalProductos = count($productos);
                            ?>

                            <div class="boxe">
                                <?php foreach ($productos as $key => $producto) { ?>
                                    <span
                                        style="--i: <?php echo $key + 1; ?>; --total: <?php echo $totalProductos; ?>; --distance: <?php echo $distance; ?>px;">
                                        <img class="req-fav" src="happypeoplestore/<?php echo $producto['imgProducto']; ?>"
                                            alt="Producto <?php echo $key + 1; ?>" />
                                        <div class="detalles-seccion5-requisitos">
                                            <p>Precio: S/. <?php echo $producto['precio']; ?></p>
                                            <p>Stock: <?php echo $producto['stock']; ?> unidades</p>
                                            <a class="boton-requisitos"
                                                href="index.php?modulo=detalleProductoPerso&id=<?php echo $producto['id']; ?>"
                                                class="btn btn-primary">Ver más</a>
                                        </div>
                                    </span>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div id="accordionBueno" class="accordion-container">
                        <h1 style="position:absolute; margin: -30px 0 0 0; color:#fce6b4">No dejes que se escape</h1>
                        <div class="accordion accordion3">
                            <?php
                            // Realiza la consulta SQL para obtener los productos
                            $query = "SELECT * FROM productos WHERE requisitos = 'Bueno'";
                            $resultado = mysqli_query($con, $query);

                            // Inicializa un array para almacenar los productos
                            $productos = [];

                            // Recorre los resultados y almacena cada fila como un elemento en el array de productos
                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                $productos[] = $fila;
                            }

                            $totalProductos = count($productos);
                            ?>

                            <div class="boxe">
                                <?php foreach ($productos as $key => $producto) { ?>
                                    <span
                                        style="--i: <?php echo $key + 1; ?>; --total: <?php echo $totalProductos; ?>; --distance: <?php echo $distance; ?>px;">
                                        <img class="req-fav" src="happypeoplestore/<?php echo $producto['imgProducto']; ?>"
                                            alt="Producto <?php echo $key + 1; ?>" />
                                        <div class="detalles-seccion5-requisitos">
                                            <p>Precio: S/. <?php echo $producto['precio']; ?></p>
                                            <p>Stock: <?php echo $producto['stock']; ?> unidades</p>
                                            <a class="boton-requisitos"
                                                href="index.php?modulo=detalleProductoPerso&id=<?php echo $producto['id']; ?>"
                                                class="btn btn-primary">Ver más</a>
                                        </div>
                                    </span>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.querySelectorAll('.requirement').forEach(item => {
            item.addEventListener('click', function () {
                const targetId = this.getAttribute('data-target');
                const targetAccordion = document.querySelector(targetId);

                document.querySelectorAll('.accordion-container').forEach(acc => {
                    if (acc !== targetAccordion) {
                        acc.classList.remove('show');
                    }
                });

                if (targetAccordion.classList.contains('show')) {
                    targetAccordion.classList.remove('show');
                    this.parentElement.classList.remove('active');
                } else {
                    targetAccordion.classList.add('show');
                    document.querySelectorAll('.requirement').forEach(req => {
                        req.parentElement.classList.remove('active');
                    });
                    this.parentElement.classList.add('active');
                }

                // Hide the advertisement image
                document.querySelector('.imagen-anuncio').style.display = 'none';
            });
        });

        document.addEventListener("DOMContentLoaded", function () {
            const texts = [
                { id: 'line1', text: 'MMMM...' },
                { id: 'line2', text: '¿Buscas algún requisito?,' },
                { id: 'line3', text: 'no olvides explorar' },
                { id: 'line4', text: 'todos los productos' }
            ];

            let totalDelay = 0;

            texts.forEach(({ id, text }) => {
                const element = document.getElementById(id);
                element.textContent = ''; // Clear initial content
                const typingDelay = 100; // Delay between each character

                Array.from(text).forEach((char, index) => {
                    const span = document.createElement('span');
                    span.textContent = char;
                    span.className = 'char';
                    span.style.animationDelay = `${totalDelay + index * typingDelay}ms`;
                    element.appendChild(span);
                });

                totalDelay += text.length * typingDelay + 1000; // Adjust delay for next line
            });
        });
    </script>
    <script>
        // Función para aplicar el efecto de escritura después de 3 segundos
        setTimeout(function () {
            // Selecciona todos los elementos con la clase "efecto-escritura"
            var elementos = document.querySelectorAll('.efecto-escritura');

            // Itera sobre los elementos y aplica el efecto
            elementos.forEach(function (elemento) {
                var textoCompleto = elemento.innerHTML;
                elemento.innerHTML = '';

                // Función recursiva para aplicar el efecto
                function mostrarTexto(texto, indice, tiempo) {
                    if (indice < texto.length) {
                        elemento.innerHTML += texto.charAt(indice);
                        setTimeout(function () {
                            mostrarTexto(texto, indice + 1, tiempo);
                        }, tiempo);
                    }
                }

                // Llama a la función recursiva con un retraso entre cada letra de 100 milisegundos
                mostrarTexto(textoCompleto, 0, 100);
            });
        }, 3000); // Espera 3 segundos antes de ejecutar el efecto
    </script>
</body>

</html>