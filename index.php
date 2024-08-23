<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Happy People Store</title>
    <link rel="icon" type="image/png" href="happypeoplestore/dist/img/icono.jpg" sizes="16x16">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="happypeoplestore/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha384-Y3+3Hh1EMBv3pckuhFEmzYlSWmE+VR8C2jrojlU2ksQpIaz+IpyR8j1VW1E5HvjQ" crossorigin="anonymous">
    <link rel="stylesheet" href="happypeoplestore/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="happypeoplestore/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Crimson+Pro:ital,wght@0,200..900;1,200..900&family=Jost:ital,wght@0,100..900;1,100..900&family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Protest+Strike&display=swap">
    <?php
    session_start();
    $accion = $_REQUEST['accion'] ?? '';
    if ($accion == 'cerrar') {
        session_destroy();
        header("Refresh:0");
    }
    ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Crimson+Pro:ital,wght@0,200..900;1,200..900&family=Jost:ital,wght@0,100..900;1,100..900&family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Protest+Strike&display=swap');

        * {
            font-family: 'Jost', sans-serif;
            font-size: 14px;
        }

        body {
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        /* Pantalla de carga */
        #loading-screen {
            position: fixed;
            width: 100%;
            height: 100%;
            background-color: #c00425;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: transform 1s ease-out;
        }

        #loading-screen.hidden {
            transform: translateY(-100%);
        }

        .loader {
            display: inline-block;
            width: 150px;
            height: 120px;
            background-image: url('happypeoplestore/dist/img/ISOTIPO-HAPPY.gif');
            background-size: cover;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Icono que sigue al puntero */
        #cursor-icon {
            position: fixed;
            width: 50px;
            pointer-events: none;
            z-index: 10000;
            transition: transform 0.1s ease-out;
        }

        /* Estilos para el botón de música */
        #music-button {
            position: fixed;
            bottom: 90px;
            /* Ajust according to WhatsApp button position */
            right: 25px;
            width: 60px;
            height: 60px;
            background-color: #ff4081;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10001;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        #music-button i {
            color: white;
            font-size: 24px;
        }

        #music-controls {
            position: fixed;
            bottom: 160px;
            /* Ajust according to WhatsApp button position */
            right: 20px;
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 10px;
            padding: 10px;
            display: none;
            z-index: 10002;
        }

        #music-controls button {
            background-color: transparent;
            border: none;
            color: white;
            font-size: 20px;
            margin: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <!-- Pantalla de carga -->
    <div id="loading-screen">
        <div class="loader"></div>
    </div>
    <!-- Icono que sigue al puntero -->
    <img id="cursor-icon" src="happypeoplestore/dist/img/Happy-people-logo-oficial-blanco-3.png" alt="Icono del puntero"
        style="display: none;">
    
    <?php
    include_once "happypeoplestore/DBecommerce.php";
    $con = mysqli_connect($host, $user, $pass, $db);
    ?>
    <div>
        <div>
            <div>
                <?php
                include_once "cabecera.php";
                $modulo = $_REQUEST['modulo'] ?? '';
                if ($modulo == "productos" || $modulo == "") {
                    include_once "seccion2.php";
                    include_once "seccion3.php";
                    include_once "seccion4.php";
                    include_once "seccion5.php";
                    include_once "liston.php";
                    include_once "seccion6.php";
                    include_once "seccion7.php";
                }
                if ($modulo == "detalleProducto") {
                    include_once "ProductosImportados/detalleProducto.php";
                }
                if ($modulo == "perfil") {
                    include_once "perfil.php";
                }
                if ($modulo == "pedidos") {
                    include_once "perfil.php";
                }
                if ($modulo == "detalleProductoPerso") {
                    include_once "ProductosPersonalizados/detalleProductoPerso.php";
                }
                if ($modulo == "carrito") {
                    include_once "carrito.php";
                }
                if ($modulo == "pago") {
                    include_once "pago.php";
                }
                if ($modulo == "recibo") {
                    include_once "recibo.php";
                }
                if ($modulo == "nosotros") {
                    include_once "nosotros.php";
                }
                if ($modulo == "contactos") {
                    include_once "contactos.php";
                }
                if ($modulo == "recibo") {
                    include_once "recibo.php";
                }
                if ($modulo == "tienda") {
                    include_once "Tienda-Productos/tienda.php";
                }
                if ($modulo == "ProductosInsert") {
                    include_once "ProductosInsert.php";
                }
                if ($modulo == "Recibo_Venta") {
                    include_once "recibos/Recibo_Venta.php";
                }
                if ($modulo == "Recibo_Preventa") {
                    include_once "recibos/Recibo_Preventa.php";
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    include_once "footer.php";
    include_once "whatsapp.php";
    include_once "iconologin.php"
        ?>
    <script src="happypeoplestore/plugins/jquery/jquery.min.js"></script>
    <script src="happypeoplestore/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="happypeoplestore/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="happypeoplestore/plugins/moment/moment.min.js"></script>

    <script src="happypeoplestore/dist/js/pages/dashboard.js"></script>
    <script src="happypeoplestore/js/carritoCompras.js"></script>
    <!-- YouTube IFrame API -->
    <script src="https://www.youtube.com/iframe_api"></script>
    <script>
        // Variables
        let player;
        let isPlaying = false;

        
        // Cursor follow icon logic
        window.addEventListener('load', function () {
            const loadingScreen = document.getElementById('loading-screen');
            loadingScreen.classList.add('hidden');
            loadingScreen.addEventListener('transitionend', () => loadingScreen.style.display = 'none');

            const cursorIcon = document.getElementById('cursor-icon');
            cursorIcon.style.display = 'block';
            let mouseX = 0, mouseY = 0;
            let currentX = 0, currentY = 0;
            const delay = 0.1;

            document.addEventListener('mousemove', (e) => {
                mouseX = e.clientX;
                mouseY = e.clientY;
            });

            function animate() {
                currentX += (mouseX - currentX) * delay;
                currentY += (mouseY - currentY) * delay;
                cursorIcon.style.transform = `translate(${currentX}px, ${currentY}px)`;
                requestAnimationFrame(animate);
            }

            animate();
        });
    </script>
</body>

</html>
