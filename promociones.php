<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Tienda en Línea</title>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

        .contenedor {
            width: 100%;
            overflow: hidden;
        }

        .slider-contenedor {
            width: 100%;
            display: flex;
            transition: transform 1s;
        }

        .contenido-slider {
            width: 100%;
            height: 600px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-shrink: 0;
            position: relative;
            text-align: center;
        }

        .contenido-slider:nth-child(1) {
            background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.7)),
            url("happypeoplestore/dist/img/a.jpg");
            color: #fff;
            background-size: cover;
            background-position: center;
        }

        .contenido-slider:nth-child(2) {
            background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.7)),
            url("happypeoplestore/dist/img/itzy.jpg");
            color: #fff;
            background-size: cover;
            background-position: center;
        }

        .contenido-slider:nth-child(3) {
            background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.7)),
            url("happypeoplestore/dist/img/bts.jpg");
            color: #fff;
            background-size: cover;
            background-position: center;
        }

        .texto {
            width: 80%;
            position: relative;
            z-index: 2;
        }

        .texto h1 {
            font-size: 2em;
            margin-bottom: 20px;
        }

        .contenido-slider a {
            color: #fff;
            width: 300px;
            display: inline-block;
            padding: 15px 30px;
            text-align: center;
            border-radius: 3px;
            margin-top: 20px;
            text-decoration: none;
            background-color: #000;
            transition: background-color 1s;
        }

        .contenido-slider a:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <div class="slider-contenedor">
            <section class="contenido-slider">
                <div class="texto">
                    <h1>
                        Te damos la bienvenida a nuestro rincón en línea.<br/>
                        ¡Es un placer tenerte aquí!
                    </h1>
                    <a href="index.php?modulo=nosotros" class="button">Conócenos</a>
                </div>
                <img src="animacion.svg" alt="">
            </section>

            <section class="contenido-slider">
                <div class="texto">
                    <h1>
                        ¡Bienvenido a nuestra tienda en línea! Descubre productos de alta calidad y encuentra las mejores ofertas.
                    </h1>
                    <a href="index.php?modulo=tienda" class="button">Compra ya</a>
                </div>
                <img src="animacion2.svg" alt="">
            </section>

            <section class="contenido-slider">
                <div class="texto">
                    <h1>
                        Calidad que puedes confiar. Cada producto está cuidadosamente seleccionado para brindarte la mejor experiencia de compra.
                    </h1>
                    <a href="#" class="button">Compra ya</a>
                </div>
                <img src="animacion2.svg" alt="">
            </section>
        </div>
    </div>

    <script>
    let slider = document.querySelector(".slider-contenedor");
    let sliderIndividual = document.querySelectorAll(".contenido-slider");
    let contador = 0;
    let width = sliderIndividual[0].clientWidth;
    let intervalo = 5000; // Duración de cada imagen en milisegundos

    window.addEventListener("resize", function () {
        width = sliderIndividual[0].clientWidth;
    });

    function iniciarSlider() {
        setInterval(function () {
            slides();
        }, intervalo);
    }

    function slides() {
        contador++;

        if (contador < sliderIndividual.length) {
            slider.style.transform = "translate(" + (-width * contador) + "px)";
            slider.style.transition = "transform 3s"; // Duración de la transición

        } else {
            setTimeout(function () {
                slider.style.transform = "translate(0px)";
                slider.style.transition = "transform 1s";
                contador = 0;
            }, 2000); // Duración adicional para la última imagen
        }
    }

    // Iniciar el slider cuando la página se carga completamente
    window.addEventListener("load", iniciarSlider);
</script>

</body>
</html>
