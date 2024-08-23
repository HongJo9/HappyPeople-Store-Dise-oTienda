<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <?php
    $id = mysqli_real_escape_string($con, $_REQUEST['id'] ?? '');
    $queryProducto = "SELECT id, nombre, precio, stock, imgProducto, descripcion_producto FROM productos WHERE id='$id';";
    $resProducto = mysqli_query($con, $queryProducto);
    $rowProducto = mysqli_fetch_assoc($resProducto);
    ?>
    <style>
        .card {
            background-image: url("happypeoplestore/dist/img/fondo-detalle-producto.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding: 180px 280px;
            margin-bottom: 0;
        }

        .contenido-detalle {
            display: flex;
            flex-wrap: wrap;
        }

        .imagen-producto {
            background-image: url("happypeoplestore/<?php echo $rowProducto['imgProducto']; ?>");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 300px;
        }

        .descripcion_producto {
            border-radius: 25px;
            margin-left: -25px;
            padding: 70px 20px;
        }

        .input-group {
            border-radius: 20px;
            overflow: hidden;
            background-color: red;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            width: 100%;
        }

        .input-group .btn {
            border: none;
            background-color: red;
            color: white;
        }

        .input-group .form-control {
            border: none;
            border-radius: 0;
            text-align: center;
            width: 10px;
            height: 50px;
            background-color: red;
            color: white;
            z-index: 10;
            margin: 0 0 0 10px;
        }

        .input-group .input-group-prepend .btn,
        .input-group .input-group-append .btn {
            border-radius: 0;
        }

        .input-group .input-group-prepend .btn:first-child {
            border-radius: 20px 0 0 20px;
        }

        .input-group .input-group-append .btn:last-child {
            border-radius: 0 20px 20px 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .blanco-fondo {
            background-color: rgba(244, 244, 244, 0.61);
            padding: 40px 30px 60px 30px;
            border-radius: 30px;
        }

        .container-parte2-detalle {
            max-width: 900px;
            margin: 0 auto;
            padding: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 30px;
            display: flex;
            justify-content: center;
            background-color: #FCE6B4;
            border: 2px solid black;
        }

        .section-header {
            padding: 10px;
            width: 60%;
        }

        .section-header h3 {
            color: #d32f2f;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .section-header p {
            color: #333;
            font-size: 18px;
        }

        .section-header .highlight {
            font-weight: 600;
        }

        .whatsapp-section {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 30%;
        }

        a .contact {
            margin-right: 10px;
        }

        .pad {
            padding-left: 25px;
        }

        .pade {
            padding-left: 18px;
        }

        a .contact h4 {
            background-color: #00a651;
            padding: 10px;
            border-radius: 5px;
            font-size: 18px;
            color: white;
            text-align: center;
        }

        a .contact .contact-highlight {
            font-weight: 900;
            font-size: 30px;
        }

        .col-12 {
            padding-left: 0;
        }

        .contact-image img {
            width: 90px;
        }

        .contact-image {
            display: flex;
            justify-content: center;
        }

        .image-gallery {
            display: flex;
            justify-content: space-around;
        }

        .image-item img {
            height: 400px;
            border: 3px dotted white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .card {
                padding: 50px 20px;
            }

            .contenido-detalle {
                flex-direction: column;
            }

            .imagen-producto {
                min-height: 200px;
                margin-bottom: 20px;
            }

            .descripcion_producto {
                margin-left: 0;
                padding: 30px 20px;
            }

            .container-parte2-detalle {
                flex-direction: column;
            }

            .section-header,
            .whatsapp-section {
                width: 100%;
                text-align: center;
            }

            .image-item img {
                height: 200px;
            }
        }

        .botones-extra1,
        .botones-extra2 a:hover {
            text-decoration: none;
        }
    </style>
    <div class="card">
        <div class="row contenido-detalle" style="padding-bottom: 50px;">
            <div class="col-12 col-md-7 imagen-producto d-flex align-items-end">
                <div style="background-color: rgba(0, 0, 0, 0.8); padding: 30px 40px 30px 30px; color: white;">
                    <h4 style="color:#FCE6B4">Descripción</h4>
                    <p style="color:white;"><?php echo $rowProducto['descripcion_producto']; ?></p>
                </div>
            </div>
            <div class="col-12 col-md-5 descripcion_producto" style="background-color: white;">
                <h2 style="color:#FF0000;" class="font-weight-bold text-center"><?php echo $rowProducto['nombre']; ?>
                </h2>
                <hr style="border: 1px dotted #FF0000">
                <div class="mb-3">
                    <h4 class="pad" style="color:#55777F; font-weight:700">Precio</h4>
                    <hr class="pad" style="width: 50%; color:#55777F; margin: 0 0 5px 0;">
                    <h2 class="pad" style="color:#55777F; font-weight: 400;">S/ <?php echo $rowProducto['precio']; ?>
                    </h2>
                </div>
                <div style="padding: 15px;"></div>
                <div class="mb-3">
                    <h4 class="pad" style="color:#55777F; font-weight:700">Stock</h4>
                    <hr class="pad" style="width: 50%; color:#55777F; margin: 0 0 5px 0;">
                    <h2 class="pad" style="color:#55777F; font-weight: 400;"><?php echo $rowProducto['stock']; ?> <span
                            style="font-size: 20px;">unidades</span></h2>
                </div>
                <div class="pad" class="container mt-2">
                    <div class="row">
                        <div class="d-flex mt: 10px;" style="margin: 0 0 0 13px">
                            <h4 style="color: #FF0000; padding: 0 0 5px 0;" class="font-weight-bold">Cantidad</h4>
                        </div>
                        <div  class="col-12 d-flex justify-content-start; padding: 0;  ">
                            <div class="input-group mb-3" style="width: 50%; margin: 0 0 0 13px;">
                                <div class="input-group-prepend">
                                    <button class="btn" type="button" id="restar">&#9664;</button>
                                </div>
                                <input type="number" class="form-control" id="cantidadProducto" value="1"
                                    oninput="validarNumero(event)" onkeydown="cambiarNumeroConTeclado(event)" readonly>
                                <div class="input-group-append">
                                    <button class="btn" type="button" id="sumar">&#9654;</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pade">
                    <button style="background-color: #FF0000; color:white; border-radius: 24px; margin: 20px 0 0 0;"
                        class="btn btn-lg btn-block" id="agregarCarrito" data-id="<?php echo $_REQUEST['id']; ?>"
                        data-nombre="<?php echo $rowProducto['nombre']; ?>"
                        data-img="<?php echo $rowProducto['imgProducto']; ?>"
                        data-precio="<?php echo $rowProducto['precio']; ?>">
                        Agregar al Carrito <img src="happypeoplestore/dist/img/CARRITO-LOGO-HAPPY-PEOPPLE.png"
                            alt="Carrito" style="width: 20px; margin-top: -10px">
                    </button>
                </div>
                <div id="extra-buttons" class="row mt-3" style="display: none; margin: 0 0 0 22px">
                    <div class="col-12 col-md-6 botones-extra1">
                        <button class="btn-block"
                            style="font-size: 20px; background-color: #fce6b4; color:white; border-radius: 24px; padding: 5px; color: black"
                            id="extraButton1"><a style="color: black" href="index.php?modulo=carrito">Ver
                                Carrito</a></button>
                    </div>
                    <div class="col-12 col-md-6 botones-extra2">
                        <button class="btn-block"
                            style="font-size: 20px; background-color: black; color:white; border-radius: 24px; padding: 5px; color: white"
                            id="extraButton2"><a style="color: white" href="index.php?modulo=tienda">Ir a
                                Tienda</a></button>
                    </div>
                </div>
            </div>
        </div>



        <div>
            <div class="blanco-fondo">
                <div class="container-parte2-detalle" style="margin: auto">
                    <div class="section-header" style="margin: 0 0 0 10px">
                        <h3>¿Cómo personalizamos juntos?</h3>
                        <p>Te <i style="font-size: 20px; font-weight:bold;">ayudamos</i> aterrizar esas ideas para regalar, realicemos una llamada para <span
                                class="highlight" style="text-decoration: underline;">REIMAGINAR CON IA</span></p>
                        <h3 style="font-weight: bold;">Visualiza los videos y sigues los pasos</h3>
                    </div>
                    <div class="whatsapp-section">
                        <a href="https://wa.link/ke3nx2" target="_blank">
                            <div class="contact">
                                <h4>Chatea con <span class="contact-highlight">nosotros</span></h4>
                            </div>
                            <div class="contact-image">
                                <img src="happypeoplestore/dist/img/whatsapp-seccion6.png" alt="WhatsApp">
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Image Gallery -->
            <div class="image-gallery" style="margin: -50px 0 0 0;">
                <div style="cursor: pointer;" class="image-item1 image-item" data-toggle="modal"
                    data-target="#videoModal1">
                    <img src="happypeoplestore/dist/img/miniatura1.jpg" alt="Image 1">
                </div>
                <div style="cursor: pointer;" class="image-item2 image-item" data-toggle="modal"
                    data-target="#videoModal2">
                    <img src="happypeoplestore/dist/img/miniatura2.jpg" alt="Image 2">
                </div>
                <div style="cursor: pointer;" class="image-item3 image-item" data-toggle="modal"
                    data-target="#videoModal3">
                    <img src="happypeoplestore/dist/img/miniatura3.jpg" alt="Image 3">
                </div>
            </div>

            <!-- Video Modals -->
            <div class="modal fade" id="videoModal1" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel1"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="videoModalLabel1">Video 1</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <video width="100%" controls>
                                <source src="happypeoplestore/dist/img/video_1_-_paso_uno_happy_people.mp4" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="videoModal2" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel2"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="videoModalLabel2">Video 2</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <video width="100%" controls>
                                <source src="happypeoplestore/dist/img/video_2_de_happy_people.mp4" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="videoModal3" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel3"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="videoModalLabel3">Video 3</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <video width="100%" controls>
                                <source src="happypeoplestore/dist/img/video_3_happy_people.mp4" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            // Obtener el campo de entrada y los botones
            var cantidadInput = $("#cantidadProducto");
            var sumarButton = $("#sumar");
            var restarButton = $("#restar");

            // Manejar clic en el botón de suma
            sumarButton.click(function () {
                cantidadInput.val(parseInt(cantidadInput.val()) + 1);
            });

            // Manejar clic en el botón de resta
            restarButton.click(function () {
                if (parseInt(cantidadInput.val()) > 1) {
                    cantidadInput.val(parseInt(cantidadInput.val()) - 1);
                }
            });

            // Manejar clic en el botón de agregar al carrito
            $("#agregarCarrito").click(function () {
                $("#extra-buttons").show();
            });
        });

        // popup
        // Limpiar el src del video cuando se cierra el modal
        $('.modal').on('hidden.bs.modal', function () {
            $(this).find('video').attr('src', '');
        });
    </script>

    </script>
</body>

</html>