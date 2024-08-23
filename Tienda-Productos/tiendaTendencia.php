<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Slider | Dev Mode</title>

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <!-- CSS -->
    <link rel="stylesheet" href="css/styles.css">

</head>
<style>
    /* ------------ VARIABLES ------------ */
    :root {
        /* FONT */
        --font: 'jost', sans-serif;

        /* COLORS */
        --color: #9176FF;
        --bg-color: #f4f4f4;
    }

    /* ------------ BASE ------------ */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .cuerpo-tendencias {
        font-family: var(--font);
        height: 10vh;
        background-image:
            linear-gradient(rgba(255, 255, 255, 0.1), rgba(0, 0, 0, 0.5)),
            url("happypeoplestore/dist/img/fondo-tendencia.jpg");
        background-size: cover;
        background-position: top;
        background-repeat: no-repeat;
        position: relative;
    }


    .container-ten {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    .swiper-container {
        width: 100%;
        max-width: 1200px;
        margin: auto;
    }

    .swiper {
        width: 100%;
    }

    .swiper-wrapper {
        display: flex;
        align-items: center;
    }

    .card {
        width: 20em;
        height: 90%;
        background-color: #fff;
        border-radius: 2em;
        box-shadow: 0 0 2em rgba(0, 0, 0, .2);
        padding: 2em 1em;
        display: flex;
        align-items: center;
        flex-direction: column;
        margin: 0 2em;
    }

    .swiper-slide:not(.swiper-slide-active) {
        filter: blur(2px);
    }

    .card__image {
        width: 15em;
        height: 15em;
        border-radius: 50%;
        border: 5px solid #FF0000;
        padding: 3px;
        margin-bottom: 2em;
    }

    .card__image img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
    }

    .card__content {
        display: flex;
        align-items: center;
        flex-direction: column;
    }

    .card__content a:hover {
        color: #fce6b4;
    }

    .card__title_titulo {
        font-size: 1.8rem;
        font-weight: 600;
        position: relative;
        top: .2em;
        margin: -20px 0 0 0;
    }

    .card__title {
        font-size: 1.2rem;
        font-weight: 400;
        position: relative;
        top: .2em;
    }

    .card__name {
        color: var(--color);
    }

    .card__text {
        text-align: center;
        font-size: 1.1rem;
        margin: 1em 0;
    }

    .card__btn {
        background-color: #FF0000;
        color: #fff;
        font-size: 1rem;
        text-transform: uppercase;
        font-weight: 600;
        border: none;
        padding: .5em;
        border-radius: .5em;
        margin-top: .5em;
        cursor: pointer;
    }
</style>

<body class="cuerpo-tendencias">
    <h1 style="font-size: 60px;padding: 50px 0 0px 0; text-align: center; color:white">Productos en Tendencia <img
            style="position: absolute; margin: 60px 0 0 -260px; width: 250px;" src="happypeoplestore/dist/img/LINEA ROJA ANIMADA.gif" alt=""></h1>
    <div style="position: relative; height: 80vh; display: flex; justify-content: center; align-items: flex-end;">
        <img style="position: absolute; z-index: 2; width: 500px; margin: 0 0 0 -950px;"
            src="happypeoplestore/dist/img/chica-tendencia.png" alt="Happy People Store">
        <div class="swiper-container">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?php
                    // Suponiendo que ya tienes una conexión a la base de datos y una consulta para obtener los productos
                    // $con es tu conexión a la base de datos
                    
                    // Realiza la consulta SQL para obtener los productos
                    $query = "SELECT * FROM productos WHERE categoria = 'P.Tendencia'";
                    $resultado = mysqli_query($con, $query);

                    // Inicializa un array para almacenar los productos
                    $productos = [];

                    // Recorre los resultados y almacena cada fila como un elemento en el array de productos
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        $productos[] = $fila;
                    }

                    // Luego, en tu HTML, puedes utilizar el array de productos para generar el contenido dinámico
                    foreach ($productos as $producto) {
                        ?>
                        <div class="card swiper-slide">
                            <div class="card__image">
                                <img src="happypeoplestore/<?php echo $producto['imgProducto']; ?>" alt="card image">
                            </div>
                            <div class="card__content">
                                <span class="card__title_titulo"><?php echo $producto['nombre']; ?></span>
                                <span class="card__title">Precio: S/. <?php echo $producto['precio']; ?></span>
                                <span class="card__title">Stock: <?php echo $producto['stock']; ?> unidades</span>
                                <a style="margin: 20px 0 0 0; padding: 15px; text-decoration:none; color white"
                                    href="index.php?modulo=detalleProductoPerso&id=<?php echo $producto['id']; ?>"
                                    class="card__btn">Ver más</a>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 300,
                modifier: 1,
                slideShadows: false,
            },
            pagination: {
                el: ".swiper-pagination",
            },
        });
    </script>

</body>

</html>