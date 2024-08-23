<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style>
    .tienda-slider {
        position: relative;
        height: 100vh;
    }

    .white-circle {
        width: 40%;
        /* Ajusta el tamaño del círculo según tus necesidades */
        height: 80%;
        border-radius: 50%;
        backdrop-filter: blur(50px);
        position: absolute;
        top: 50%;
        /* Ajusta la posición vertical del círculo */
        left: 50%;
        /* Ajusta la posición horizontal del círculo */
        transform: translate(-95%, -42%);
        z-index: 1;
        /* Asegura que el círculo esté encima de las imágenes */
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .white-circle-content {
        color: black;
        /* Ajusta el color del texto */
        font-size: 24px;
        /* Ajusta el tamaño del texto */
        position: absolute;
    }

    .carousel-indicators li {
        background-color: #FF0000;
        /* Cambia el color del indicador */
        padding: 5px;
        margin-top: -60px;
        /* Ajusta la posición hacia arriba */
    }

    .flotador {
        position: absolute;
        animation: flotar 5s infinite alternate;
        margin: 0px 0 0px 0px; 
    }

    @keyframes flotar {
        0% {
            transform: translate(0, 0);
        }

        25% {
            transform: translate(10px, 20px);
        }

        50% {
            transform: translate(-10px, -20px);
        }

        75% {
            transform: translate(10px, -20px);
        }

        100% {
            transform: translate(-10px, 20px);
        }
    }
</style>

<body>
    <div>
        <div class="tienda-slider">
            <img src="happypeoplestore/dist/img/slider1-tienda.jpg" class="position-absolute top-0 start-0 w-100"
                alt="Imagen 1">
            <div id="carouselExampleIndicators" class="carousel slide position-relative" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <!-- los 3 sliders -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="happypeoplestore/dist/img/slider1-tienda.jpg" class="d-block w-100" alt="Imagen 1">
                        <div class="white-circle">
                            <div class="white-circle-content">
                                <div style="margin: -150px 0 0 0;">
                                    <h1 style=" font-size:100px; color: #312B2D;">Tazas</h1>
                                    <h4 style="font-size:40px; color: #312B2D; margin: -20px 0 0 0;">PERSONALIZADAS</h4>
                                </div>
                                <img class="flotador" style="width:310px; position: absolute; margin: -40px 0 0 -150px;" src="happypeoplestore/dist/img/banner-Tazas-personalizadas-2.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="happypeoplestore/dist/img/slider2-tienda.jpg" class="d-block w-100" alt="Imagen 2">
                        <div class="white-circle">
                            <div class="white-circle-content">
                                <div style="margin: -150px 0 0 0;">
                                    <h1 style=" font-size:100px; color: #312B2D;">Cuadernos</h1>
                                    <h4 style="font-size:40px; color: #312B2D; margin: -20px 0 0 0;">PERSONALIZADOS</h4>
                                </div>
                                <img class="flotador" style="width:310px; position: absolute; margin: -40px 0 0 -150px;" src="happypeoplestore/dist/img/banner-cuadernos-personalizadas-3.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="happypeoplestore/dist/img/slider3-tienda.jpg" class="d-block w-100" alt="Imagen 3">
                        <div class="white-circle">
                            <div class="white-circle-content">
                                <div style="margin: -150px 0 0 0;">
                                    <h1 style=" font-size:100px; color: #312B2D;">Llaveros</h1>
                                    <h4 style="font-size:40px; color: #312B2D; margin: -20px 0 0 0;">PERSONALIZADOS</h4>
                                </div>
                                <img class="flotador" style="width:310px; position: absolute; margin: -40px 0 0 -150px;" src="happypeoplestore/dist/img/banner-llaveros-1.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- botones de adelante y atras -->
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <div>
        <?php
        include_once "tienda.php";
        ?>
    </div>
    <div>
        <?php
        include_once "tienda_productos.php"
            ?>
    </div>
    <div>
        <?php
        include_once "tiendaTendencia.php";
        ?>
    </div>
</body>

</html>