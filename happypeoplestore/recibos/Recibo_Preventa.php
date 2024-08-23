<?php
    include_once "../happypeoplestore/DBecommerce.php";
    $con = mysqli_connect($host, $user, $pass, $db);

    // Verifica si se proporcionó el parámetro idPreventa en la URL
    if (isset($_GET['idPreventa'])) {
        // Obtén el valor de idPreventa y almacénalo en una variable
        $idPreventa = $_GET['idPreventa'];
    }

    $idCliente = $_SESSION['idCliente'] ?? '';

    $queryPV="SELECT id_preventa, id_cliente, fecha_compra,total FROM pre_ventas where id_preventa='".$idPreventa."';";
    $resQueryPV=mysqli_query($con, $queryPV);
    $rowPV=mysqli_fetch_assoc($resQueryPV);

    $IDCLIENTE = $rowPV['id_cliente'];
        $queryCliente = "SELECT id,email, nombre, DNI, telefono, direccion FROM clientes WHERE id = '".$IDCLIENTE."';";
        $resultadoCliente= mysqli_query($con, $queryCliente);
        $rowCliente = mysqli_fetch_assoc($resultadoCliente);
        
    $NOMBRECLIENTE=$rowCliente['nombre'];
    $EMAILCLIENTE=$rowCliente['email'];
    $DNICLIENTE=$rowCliente['DNI'];
    $TELEFONOCLIENTE=$rowCliente['telefono'];
    $DIRECCIONCLIENTE=$rowCliente['direccion'];

    $FECHACOMPRA= $rowPV['fecha_compra'];
    $TOTAL= $rowPV['total'];
  
    $queryDPV = "SELECT id_producto,cantidad, precio_unitario FROM detalle_preventa where id_preventa='".$idPreventa."';";
    $resQueryDPV=mysqli_query($con, $queryDPV);
?>
<body>
    <!-- Contenedor de contenido. Contiene contenido de la página -->
    <div class="content-wrapper">
        <!-- Encabezado de contenido (encabezado de página) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detalles de Pre-Ventas</h1>
                    </div>
                </div>
            </div><!-- /.contenedor fluido -->
        </section>

        <!-- Contenido principal -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="container" >
                                    <div class="row">
                                        <div>
                                            <div class="container pr-5 pb-5" >
                                                <div class="row">
                                                    <div class="col-4"></div>
                                                    <div class="col-8">
                                                        <a href="panel.php?modulo=pre_ventas" class="btn btn-warning" style="margin: 0 0 10px;">Regresar a Pre-Ventas</a>
                                                        <!-- Recibo en un cuadro -->
                                                        <div class="recibo" >
                                                            <div class="row" >
                                                                <div class="col-4">
                                                                    <img src="../happypeoplestore/dist/img/logo recibo.jpg" class="img-fluid" alt="">
                                                                </div>
                                                                <div class="col-8">
                                                                    <table class="table table-bordered table-striped">
                                                                        <thead>
                                                                            <tr>
                                                                                <th style="background: black; color: #ccc;">Fecha PreCompra</th>
                                                                                <th style="background: black; color: #ccc;">Fecha de Aprobacion</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td><?php echo $FECHACOMPRA ?></td>
                                                                                <td>En espera.</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="datosRecibo">
                                                                <div class="info-cliente">
                                                                    <p><strong>Codigo PreCompra: </strong><?php echo $idPreventa ?></p>
                                                                    <p><strong>Cliente: </strong><?php echo $NOMBRECLIENTE ?></p>
                                                                    <p><strong>E-mail: </strong><?php echo $EMAILCLIENTE ?></p>
                                                                    <p><strong>Teléfono: </strong><?php echo $TELEFONOCLIENTE ?></p>
                                                                    <p><strong>DNI: </strong><?php echo $DNICLIENTE ?></p>
                                                                    <p><strong>Dirección: </strong><?php echo $DIRECCIONCLIENTE ?></p>
                                                                    <p><strong>Terminos y Condiciones: </strong> Usted acepto los terminos y condiciones</p>
                                                                    <p><strong>Estado de Compra: </strong> Pendiente</p>
                                                                </div>
                                                            </div>
                                                            <!-- //resumen de productos insertados por el cliente -->
                                                            <table class="table-bordered table-striped detalle-productos" >
                                                                <thead>
                                                                    <tr>
                                                                        <th style="background: black; color: #ccc;">Producto</th>
                                                                        <th style="background: black; color: #ccc;">Precio Unitario</th>
                                                                        <th style="background: black; color: #ccc;">Cantidad</th>
                                                                        <th style="background: black; color: #ccc;">Subtotal</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php

                                                                    while ($rowDPV = mysqli_fetch_assoc($resQueryDPV)) {
                                                                        $IDPRODUCTO = $rowDPV['id_producto'];
                                                                        $CANTIDAD = $rowDPV['cantidad'];
                                                                        $PRECIOUNITARIO = $rowDPV['precio_unitario'];
                                                                        $TOTALNETO = number_format(($PRECIOUNITARIO * $CANTIDAD), 2);

                                                                        $queryProducto = "SELECT nombre FROM productos WHERE id = $IDPRODUCTO";
                                                                        $resultadoProducto = mysqli_query($con, $queryProducto);
                                                                        $rowProducto = mysqli_fetch_assoc($resultadoProducto);
                                                                        $NOMBREPRODUCTO = $rowProducto['nombre'];

                                                                        // Imprimir la fila de la tabla
                                                                        echo '<tr>';
                                                                        echo '<td>' . $NOMBREPRODUCTO . '</td>';
                                                                        echo '<td>' . "S/. ".$PRECIOUNITARIO . '</td>';
                                                                        echo '<td>' . $CANTIDAD . '</td>';
                                                                        echo '<td>' . "S/. ".$TOTALNETO . '</td>';
                                                                        echo '</tr>';
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                    
                                                            <!-- Mostrar el total de la compra -->
                                                            <div class="total">
                                                                Total: S./ <?php echo $TOTAL; ?>
                                                            </div>
                                                            <div class="instrucciones">
                                                                <p>Gracias por su compra. Guarde este recibo para la entrega de su producto.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .fondo{
            background-image: radial-gradient(circle at 50% 50%, #fef5f7 0, #f4eff0 25%, #e9e9e9 50%, #dfe3e2 75%, #d5dddb 100%);
        }

        .recibo {
            width: 600px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 10px;
        }


        .logo {
            max-width: 20%;
            height: auto;
        }

        .info-cliente {
            margin-top: 10px;
        }

        .detalle-productos {
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
        }

        .detalle-productos th,
        .detalle-productos td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        .detalle-productos th {
            background-color: #f2f2f2;
        }

        .total {
            margin: 10px 5px 0 0;
            text-align: right;
            font-weight: bold;
        }

        .instrucciones {
            margin-top: 20px;
        }
    </style>
</body>

