<?php
    include_once "index.php";
?>

<div class="container">
    <div class="personalizados">
        <h2 class="text-center m-5">Productos en venta</h2>

        <div id="productSlider" class="carousel slide prodslider" data-ride="carousel">
            <div class="carousel-inner row mt-2">
                <?php
                    // Obtén el valor de nombre desde el formulario de búsqueda
                    $nombre = mysqli_real_escape_string($con, $_REQUEST['nombre'] ?? '');
                    // Modifica la consulta SQL para filtrar por nombre si se proporciona uno
                    $query = "SELECT * FROM productos WHERE 1=1 ";
                    if (!empty($nombre)) {
                        $query .= "AND nombre LIKE '%" . $nombre . "%'";
                    }
                    // Agrega la condición para la categoría "Importado"
                    $query .= "AND categoria = 'Importado'";

                    // Realiza la consulta SQL
                    $res = mysqli_query($con, $query);
                    $totalProducts = mysqli_num_rows($res);
                    $productsPerPage = 4;
                    $totalSlides = ceil($totalProducts / $productsPerPage);

                    // Muestra los productos en el slider agrupados de cuatro en cuatro
                    for ($i = 0; $i < $totalSlides; $i++) {
                        echo '<div class="carousel-item ' . (($i == 0) ? 'active' : '') . '">';
                        echo '<div class="row">';

                        // Recorre los resultados y muestra hasta cuatro productos en el slider
                        for ($j = $i * $productsPerPage; $j < ($i + 1) * $productsPerPage && $j < $totalProducts; $j++) {
                            $row = mysqli_fetch_assoc($res);
                            if ($row) {
                ?>
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="card">
                                        <img class="card-img-top img-thumbnail mx-auto d-block" src="happypeoplestore/<?php echo $row['imgProducto'] ?>" alt="" style="width: 200px; height: 200px;">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <h1 class="card-title font-weight-bold display-7"><?php echo $row['nombre']; ?></h1>
                                            </div>
                                            <hr>
                                            <p class="card-text"><strong>Precio: </strong> <?php echo "S/.".$row['precio'] ?></p>
                                            <p class="card-text"><strong>Cantidad actual: </strong> <?php echo $row['stock']?> unidades</p>
                                            <a href="index.php?modulo=detalleProducto&id=<?php echo $row['id'] ?>" class="btn btn-primary d-flex align-items-center justify-content-center">Ver mas</a>
                                        </div>
                                    </div>
                                </div>
                <?php
                            }
                        }

                        echo '</div>';
                        echo '</div>';
                    }
                ?>
            </div>

            <!-- Botones de navegación -->
            <a class="carousel-control-prev custom-carousel-control" href="#productSlider" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon custom-carousel-control-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next custom-carousel-control" href="#productSlider" role="button" data-slide="next">
                <span class="carousel-control-next-icon custom-carousel-control-icon" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
            </a>
        </div>
    </div>
</div>

<!-- Asegúrate de incluir jQuery y Bootstrap JS en tu página -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<style>

    .personalizados {
        background-image: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        padding: 10px;
    }

    .prodslider{
        margin-left: 15px;
    }
    /* Estilo personalizado para los botones de navegación del carrusel */
    .custom-carousel-control {
        background-color: black; /* Fondo negro para los botones */
        border: none; /* Sin borde */
        border-radius: 50%; /* Forma redonda */
        width: 30px; /* Ajusta el ancho según tus preferencias */
        height: 30px; /* Ajusta la altura según tus preferencias */
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
    }

    /* Cambia el color del icono de flecha a blanco */
    .custom-carousel-control-icon {
        fill: white; /* Color blanco para el icono */
    }
</style>

<script>
    $(document).ready(function () {
        $(".card").hover(
            function () {
                $(this).addClass("shadow-lg"); // Agrega la clase de sombra al pasar el mouse
            },
            function () {
                $(this).removeClass("shadow-lg"); // Quita la clase de sombra al retirar el mouse
            }
        );

        $("#productSlider").carousel(); // Asegúrate de inicializar el carrusel
    });
</script>
