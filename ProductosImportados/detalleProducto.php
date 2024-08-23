<?php
    $id=mysqli_real_escape_string($con,$_REQUEST['id']??'');
    $queryProducto="SELECT id,nombre,precio,stock,imgProducto,descripcion_producto FROM productos where id='$id';";
    $resProducto=mysqli_query($con,$queryProducto);
    $rowProducto=mysqli_fetch_assoc($resProducto);
?>
<style>
    .card {
        background-image: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    }
</style>
<div class="card card-solid">
    <div class="row mt-4 pl-5 ">
            <div class="col-lg-7">
                <img src="happypeoplestore/<?php echo $rowProducto['imgProducto']; ?>" class="p-5 img-fluid mb-3" alt="Imagen del producto">
                <a class="btn btn-warning mb-5" href="index.php?modulo=productos" role="button"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Ir a productos</a>
            </div>
            <div class="col-lg-5 pr-5 pl-5 pt-4">
                <h2 class="text-dark font-weight-bold"><?php echo $rowProducto['nombre']; ?></h2>
                <hr>
                <div class="mb-3">
                    <h5 class="text-success">Precio</h5>
                    <h2 class="font-weight">S/ <?php echo $rowProducto['precio']; ?></h2>
                </div>
                <hr>
                <div class="mb-3">
                    <h5 class="text-info">Stock</h5>
                    <p class="font-weight">Disponible: <?php echo $rowProducto['stock']; ?></p>
                </div>
                <hr>
                <div class="container mt-2">
                    <div class="row">
                        <div class="col-md-3 d-flex align-items-center">
                            <h5 class="font-weight-bold">Cantidad</h5>
                        </div>
                        <div class="col-md-4 d-flex align-items-center">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary" type="button" id="restar">-</button>
                            </div>
                            <input type="number" class="form-control text-center" id="cantidadProducto" value="1" style="background-color: white;" oninput="validarNumero(event)" onkeydown="cambiarNumeroConTeclado(event)" readonly>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="sumar">+</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary btn-lg btn-block" id="agregarCarrito"
                            data-id="<?php echo $_REQUEST['id']; ?>"
                            data-nombre="<?php echo $rowProducto['nombre']; ?>"
                            data-img="<?php echo $rowProducto['imgProducto']; ?>"
                            data-precio="<?php echo $rowProducto['precio']; ?>">
                        <i class="fas fa-cart-plus fa-lg mr-2"></i>
                        Agregar al Carrito
                    </button>
                </div>
                <hr><hr>
                <div class="col-md-12">
                    <h5 class="font-weight-bold">Detalles del producto</h5>
                </div>
                <hr>
                <p class="text-muted"><?php echo $rowProducto['descripcion_producto']; ?></p>
            </div>
            <?php
                include_once "productos.php";
            ?>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Obtener el campo de entrada y los botones
            var cantidadInput = $("#cantidadProducto");
            var sumarButton = $("#sumar");
            var restarButton = $("#restar");

            // Manejar clic en el botón de suma
            sumarButton.click(function() {
                cantidadInput.val(parseInt(cantidadInput.val()) + 1);
            });

            // Manejar clic en el botón de resta
            restarButton.click(function() {
                if (parseInt(cantidadInput.val()) > 1) {
                    cantidadInput.val(parseInt(cantidadInput.val()) - 1);
                }
            });
        });
    </script>