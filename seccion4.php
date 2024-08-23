<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .fondo-seccion4 {
            height: 100vh;
            background-image: url("happypeoplestore/dist/img/seccion4Fondo.jpg");
            background-size: cover;
            background-position: bottom;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .descripcion-seccion4 {
            font-size: 20px;
            margin: 0 0 10px 50px;
        }

        .descripcion-seccion4 h2 {
            font-size: 45px;
        }

        .slider-container {
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 50;
            width: 120%;
            margin: 0 0 0 -120px;
        }

        .slider {
            width: 900px;
            display: flex;
            overflow: hidden;
            position: relative;
        }

        .slider .card-container {
            display: flex;
            transition: transform 0.3s ease-in-out;
        }

        .card-flip {
            perspective: 2000px;
            margin: 0 10px;
        }

        .card-flip-inner {
            position: relative;
            width: 200px;
            height: 300px;
            transition: transform 0.8s;
            transform-style: preserve-3d;
            cursor: pointer;
        }

        .card-flip-inner.flipped {
            transform: rotateY(180deg);
        }

        .card-front,
        .card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border: 2px solid #ddd;
            border-radius: 25px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-size: 1.2em;
            padding: 20px;
            box-sizing: border-box;
            color: white;
        }

        .card-front {
            background-image: url("happypeoplestore/dist/img/fondo-happy.jpg");
        }

        .card-back {
            backdrop-filter: blur(50px);
            transform: rotateY(180deg);
            text-align: center;
        }

        .slider-navega {
            position: absolute;
            top: 50%;
            width: 105%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }

        .slider-navega button {
            cursor: pointer;
            z-index: 100;
        }

        .gift-image-container {
            text-align: center;
            margin-top: 20px;
        }

        .gift-image-container img {
            cursor: pointer;
        }

        .hidden {
            display: none;
        }

        @keyframes openGift {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1) rotate(20deg);
            }
        }

        @keyframes shakeGift {

            0%,
            100% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-5px);
            }

            50% {
                transform: translateX(5px);
            }

            75% {
                transform: translateX(-5px);
            }
        }

        #giftImage {
            animation: shakeGift 0.5s infinite;
        }

        #giftImage.opening {
            animation: openGift 2s ease-in-out;
        }

        /* CSS para el efecto de caída de la tapa */
        @keyframes dropTapa {
            0% {
                transform: translateY(-100%);
            }

            100% {
                transform: translateY(0);
            }
        }

        .contenedor-tapa.drop {
            animation: dropTapa 1s forwards;
        }

        .contenedor-tapa.drop {
            animation: dropTapa 5s forwards;
        }
    </style>
</head>

<body>
    <div id="#seccion4" class="fondo-seccion4">
        <div class="container" style="margin-top: 300px;">
            <div class="row">
                <div class="col-md-5">
                    <div class="descripcion-seccion4"
                        style="height: auto; display: flex; flex-direction: column; align-items: center;">
                        <h2 style="font-size:40px; font-weight: 300;" class="text-animation">
                            Te <span style="font-size:45px; font-weight: 700; font-style: oblique;">ayudamos</span>
                            aterrizar esas ideas para
                            <div style="display: inline-block; position: relative;">
                                <span style="font-size:45px;">regalar.</span>
                                <img class="image-animation"
                                    style="position: absolute; bottom: -15px; width: 100%; margin: 0 0 0 20px;"
                                    src="happypeoplestore/dist/img/LINEA ROJA ANIMADA.gif" alt="">
                            </div>
                        </h2>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="slider-container" id="sliderContainer">
                        <img id="prev" style="width: 50px; z-index: 5; margin: 0 0 0 30px; cursor: pointer;"
                            src="happypeoplestore/dist/img/post.png" alt="">
                        <div class="slider">
                            <div class="card-container">
                                <?php
                                // Suponiendo que ya tienes una conexión a la base de datos y una consulta para obtener los productos
                                // $con es tu conexión a la base de datos
                                
                                // Realiza la consulta SQL para obtener los productos
                                $query = "SELECT * FROM productos";
                                $resultado = mysqli_query($con, $query);

                                // Inicializa un array para almacenar los productos
                                $productos = [];

                                // Recorre los resultados y almacena cada fila como un elemento en el array de productos
                                while ($fila = mysqli_fetch_assoc($resultado)) {
                                    $productos[] = $fila;
                                }

                                // Selecciona 8 productos aleatorios
                                $productosAleatorios = [];
                                if (count($productos) > 8) {
                                    $keys = array_rand($productos, 5);
                                    foreach ($keys as $key) {
                                        $productosAleatorios[] = $productos[$key];
                                    }
                                } else {
                                    $productosAleatorios = $productos;
                                }

                                // Luego, en tu HTML, puedes utilizar el array de productos aleatorios para generar el contenido dinámico
                                foreach ($productosAleatorios as $producto) {
                                    ?>
                                    <div class="card-flip">
                                        <div class="card-flip-inner" style="z-index: 500;">
                                            <div class="card-front"
                                                style="background-image: url('happypeoplestore/dist/img/fondo-happy.jpg');">
                                            </div>
                                            <div class="card-back">
                                                <h4><?php echo $producto['nombre']; ?></h4>
                                                <img style="width: 150px; border-radius:50%; border: 4px solid red;"
                                                    src="happypeoplestore/<?php echo $producto['imgProducto']; ?>" alt="">
                                                <p>Precio: S/. <?php echo $producto['precio']; ?></p>
                                                <a class="boton-requisitos"
                                                    href="index.php?modulo=detalleProductoPerso&id=<?php echo $producto['id']; ?>"
                                                    class="btn btn-primary">Ver más</a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <img id="next" style="width: 50px; z-index: 5; margin: 0 30px 0 0; cursor: pointer;"
                            src="happypeoplestore/dist/img/next.png" alt="">
                    </div>
                </div>
                <div class="gift-image-container col-md-7 position:absolute">
                    <img id="giftflecha" style="position: absolute; width: 140px; margin: 20px 0 0 200px;"
                        src="happypeoplestore/dist/img/gif flecha derecha.gif" alt="">
                    <img id="giftImage" style="width: 300px; margin: 0 0 0 450px;"
                        src="happypeoplestore/dist/img/regalo-completo.png" alt="Regalo">
                    <img id="newImage" class="hidden" style="width: 300px; margin: 0 0 0 450px;"
                        src="happypeoplestore/dist/img/regalo-destapado.png" alt="Nuevo Regalo">
                    <img style="position: absolute; width: 140px; margin: -80px 0 0 450px; z-index: 100;"
                        src="happypeoplestore/dist/img/gif flechaa izquierda.gif" alt="">
                </div>
                <div class="col-md-5">
                    <!-- vacio -->
                </div>
            </div>
            <div id="tapaContainer" class="contenedor-tapa"
                style="position:absolute; display: none; align-items: center;">
                <img class="imagen-tapa"
                    style="position:absolute; width: 300px; margin: 0 0 150px 100px; padding: 0 0 150px 0;"
                    src="happypeoplestore/dist/img/Tapa-regalo-inclinado.png" alt="">
                <div style="color: white;  margin: -250px 0 0 800px;  ">
                    <h2>¿No lo encuentras? </h2>
                    <h2> Mira más abajo.</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        const giftImage = document.getElementById('giftImage');
        const giftflecha = document.getElementById('giftflecha');
        const newImage = document.getElementById('newImage');
        const sliderContainer = document.getElementById('sliderContainer');
        const cardContainer = document.querySelector('.slider .card-container');
        const prevButton = document.getElementById('prev');
        const nextButton = document.getElementById('next');
        let currentIndex = 0;
        const cardWidth = 140; // Adjusted width of a single card including margin and gap
        const totalCards = document.querySelectorAll('.slider .card-container .card-flip').length;

        giftImage.addEventListener('click', function () {
            this.classList.add('opening');
            setTimeout(() => {
                this.classList.add('hidden');
                newImage.classList.remove('hidden');
                sliderContainer.style.display = 'flex';
                this.classList.remove('opening');
            }, 2000); // El mismo tiempo que dura la animación
        });

        giftflecha.addEventListener('click', function () {
            this.classList.add('opening');
            setTimeout(() => {
                this.classList.add('hidden');
            }, 2000); // El mismo tiempo que dura la animación
        });

        prevButton.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
            } else {
                currentIndex = totalCards - 1;
            }
            cardContainer.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
        });

        nextButton.addEventListener('click', () => {
            if (currentIndex < totalCards - 1) {
                currentIndex++;
            } else {
                currentIndex = 0;
            }
            cardContainer.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
        });

        // Add click event listener to card-flip-inner elements
        document.querySelectorAll('.card-flip-inner').forEach(card => {
            card.addEventListener('click', () => {
                card.classList.toggle('flipped');
            });
        });

        const tapaContainer = document.getElementById('tapaContainer');

        giftImage.addEventListener('click', function () {
            this.classList.add('opening');
            setTimeout(() => {
                this.classList.add('hidden');
                newImage.classList.remove('hidden');
                sliderContainer.style.display = 'flex';
                tapaContainer.style.display = 'flex'; // Mostrar la tapaContainer
                tapaContainer.classList.add('drop'); // Aplicar el efecto de caída
                this.classList.remove('opening');
            }, 2000); // El mismo tiempo que dura la animación
        });

        giftflecha.addEventListener('click', function () {
            this.classList.add('opening');
            setTimeout(() => {
                this.classList.add('hidden');
                newImage.classList.remove('hidden');
                sliderContainer.style.display = 'flex';
                tapaContainer.style.display = 'flex'; // Mostrar la tapaContainer
                tapaContainer.classList.add('drop'); // Aplicar el efecto de caída
                this.classList.remove('opening');
            }, 2000); // El mismo tiempo que dura la animación
        });
    </script>
</body>

</html>