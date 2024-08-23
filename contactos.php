<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Independent Sliders</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .header-content h1 {
            font-size: 75px;
            line-height: 80px;
            color: #f9fafc;
            text-transform: uppercase;
            margin-bottom: 35px;
            font-weight: 600;
        }

        .header-content p {
            font-size: 20px;
            color: #c5c5c5;
            margin-bottom: 25px;
        }

        @media (max-width: 991px) {
            .header {
                background-size: auto;
                min-height: 50vh;
                background-attachment: fixed;
                animation: none;
            }

            .header-content {
                padding: 50px;
            }

            .header-content h1 {
                font-size: 28px;
                line-height: 32px;
                margin-bottom: 15px;
            }
        }

        .carousel-item {
            position: relative;
        }

        .carousel-caption {
            position: absolute;
            bottom: 40px;
            left: 30%;
            transform: translateX(-50%);
            width: 50%;
            text-align: left;
            background: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }

        .carousel-caption .text-promo {
            max-width: 60%;
        }

        .carousel-caption h2,
        .carousel-caption h3,
        .carousel-caption h1,
        .carousel-caption h4 {
            color: #fff;
        }

        .carousel-caption a {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: red;
            text-transform: uppercase;
            text-decoration: none;
            margin-top: 20px;
        }

        .carousel-caption.blur-background {
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(10px);
        }
    </style>
</head>

<body>
    <div>
        <div class="tienda-slider">
            <img src="happypeoplestore/dist/img/slider1-tienda.jpg" class="position-absolute top-0 start-0 w-100"
                alt="Imagen 1">
            <div id="carouselExampleIndicators1" class="carousel slide position-relative" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="happypeoplestore/dist/img/Banner 1.jpg" class="d-block w-100" alt="Imagen 1">
                        <div class="carousel-caption blur-background">
                            <div class="text-promo">
                                <h1 style="font-size: 60px">BTS MAGIC MEMORIES</h1>
                                <h3 style="color: #f3ddae;">22 de junio</h3>
                            </div>
                            <div class="boton-promo">
                                <a href="https://fb.me/e/A0fTRPb7g">Ver Más</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="happypeoplestore/dist/img/Banner 2.jpg" class="d-block w-100" alt="Imagen 1">
                        <div class="carousel-caption blur-background">
                            <div class="text-promo">
                                <h1 style="font-size: 60px;">KPOP FRIDAYS</h1>
                                <h3 style="color: #f3ddae;">22 de junio</h3>
                            </div>
                            <div class="boton-promo">
                                <a href="https://fb.me/e/7yT9SIn5G">Ver Más</a>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <div class="tienda-slider" style="background-color: ;">
            <img src="happypeoplestore/dist/img/Banner 3.jpg" class="position-absolute top-0 start-0 w-100"
                alt="Imagen 1">
            <div id="carouselExampleIndicators2" class="carousel slide position-relative" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="happypeoplestore/dist/img/Banner 3.jpg" class="d-block w-100" alt="Imagen 1">
                        <div class="carousel-caption blur-background">
                            <div class="text-promo">
                                <h1 style="font-size: 60px;">CONCIERTO SINFONI</h1>
                                <h3 style="color: #f3ddae;">21 de julio</h3>
                            </div>
                            <div class="boton-promo">
                                <a href="https://fb.me/e/3MwCGHxBD">Ver Más</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="happypeoplestore/dist/img/Banner 4.jpg" class="d-block w-100" alt="Imagen 1">
                        <div class="carousel-caption blur-background">
                            <div class="text-promo">
                                <h1 style="font-size: 60px;">FAN AREQUIPEÑO 2024</h1>
                                <h3 style="color: #f3ddae;">25 de agosto </h3>
                            </div>
                            <div class="boton-promo">
                                <a href="https://fb.me/e/7yT9SIn5G" target="_black">Ver Más</a>
                            </div>
                        </div>
                    </div>
                </div>




                <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

    <div class="wrapper-seccion7 d-flex justify-content-between align-items-center mt-4;">
        <ul class="carousel-seccion7 d-flex justify-content-around w-100">
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
                            style="text-decoration: none; color: black;" href="https://fb.me/e/8iIwcwuyQ">Ver
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
                            style="text-decoration: none; color: black;" href="https://fb.me/e/vKfDDcnTr">Ver
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
                        <h2 style="color: white; margin: 0 0 5px 0;">FEVER</h5>
                            <h5 style="color: white; margin: 0 0 5px 0; font-weight: 400; color:#fde7b6">29
                                de junio</h5>
                    </div>
                    <button class="boton-evento"
                        style="margin: 10px 0 0 0; color: white; border: 1px solid white; padding: 10px 20px; cursor: pointer; border-radius: 5px;"><a
                            style="text-decoration: none; color: black;" href="https://fb.me/e/4vZ8DZOfK">Ver
                            Más</a></button>
                </div>
                <div
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: inherit; z-index: 1;">
                </div>
            </li>
        </ul>
    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>