<?php
  // Incluir el archivo de conexión a la base de datos
  include_once "DBecommerce.php";
  // Conectar a la base de datos
  $con = mysqli_connect($host, $user, $pass, $db);
  if(isset($_REQUEST['idBorrar'])){
    $id= mysqli_real_escape_string($con,$_REQUEST['idBorrar']??'');
    $querydetalles="DELETE from detalle_preventa where id_preventa='".$id."';";
    $resdetalle=mysqli_query($con,$querydetalles);
    $query="DELETE from pre_ventas where id_preventa='".$id."';";
    $res=mysqli_query($con,$query);
    if($res){
      ?>
      <div class="alert alert-warning float-right" role="alert">
        La Pre-venta a sido borrado con exito        
      </div>
      <?php
    }else{
      ?>
      <div class="alert alert-danger float-right" role="alert">
        Error al borrar <?php echo mysqli_error($con);?>
      </div>
      <?php 
    } 
  }

  if (isset($_REQUEST['idCancelar'])) {
    $id = mysqli_real_escape_string($con, $_REQUEST['idCancelar'] ?? '');
    $querySelect = "SELECT id_preventa, id_cliente, fecha_compra, total FROM pre_ventas WHERE id_preventa = ?";
    $stmtSelect = mysqli_prepare($con, $querySelect);
    mysqli_stmt_bind_param($stmtSelect, 's', $id);
    mysqli_stmt_execute($stmtSelect);
    
    $resSelect = mysqli_stmt_get_result($stmtSelect);
    $rowSelect = mysqli_fetch_assoc($resSelect);

    $idClienteS = $rowSelect['id_cliente'];
    $FechaCompraS = $rowSelect['fecha_compra'];
    $totalS = $rowSelect['total'];

    // Convertir la cadena de fecha a un formato aceptable para MySQL
    $FechaCompraS = date('Y-m-d H:i:s', strtotime($FechaCompraS));

    // Insertar el registro para la tabla ventas
    $queryInsert = "INSERT INTO ventas (id_cliente, fecha_compra, total, estado) VALUES (?, ?, ?, 'finalizado')";
    $stmtInsert = mysqli_prepare($con, $queryInsert);
    mysqli_stmt_bind_param($stmtInsert, 'iss', $idClienteS, $FechaCompraS, $totalS);
    $resInsert = mysqli_stmt_execute($stmtInsert);
    $idVenta = mysqli_insert_id($con);

    $querySelectdeta = "SELECT id_preventa, id_producto, cantidad, precio_unitario FROM detalle_preventa where id_preventa='".$id."';";
    $resSelectdetalle=mysqli_query($con,$querySelectdeta);
    while($rowSelectDetalle=mysqli_fetch_assoc($resSelectdetalle)){
      $a= $rowSelectDetalle['id_preventa'];
      $b= $rowSelectDetalle['id_producto'];
      $c= $rowSelectDetalle['cantidad'];
      $d= $rowSelectDetalle['precio_unitario'];

      $queryInsertdeta = "INSERT INTO `detalle_venta` (`id_venta`, `id_producto`, `cantidad`, `precio_unitario`, `estado`)
      VALUES(?, ?, ?, ?, 'finalizado')";
      $stmtInsertdeta = mysqli_prepare($con, $queryInsertdeta);
      mysqli_stmt_bind_param($stmtInsertdeta, 'iids', $idVenta, $b, $c, $d);
      $resInsertdeta = mysqli_stmt_execute($stmtInsertdeta);

      $querydetallespre="DELETE from detalle_preventa where id_preventa='".$id."';";
      $resdetallepre=mysqli_query($con,$querydetallespre);
      $querypre="DELETE from pre_ventas where id_preventa='".$id."';";
      $respre=mysqli_query($con,$querypre);
    }

    if($resInsert){
      ?>
      <div class="alert alert-warning float-right" role="alert">
        Venta Aprobada con exito
      </div>
      <?php
    }else{
      ?>
      <div class="alert alert-danger float-right" role="alert">
        Error al SELECCIONAR <?php echo mysqli_error($con);?>
      </div>
      <?php 
    } 

  }
?>
<!-- Contenedor de contenido. Contiene contenido de la página -->
  <div class="content-wrapper" style="background-image: radial-gradient(circle at 44.73% 110.27%, #ffffff 0, #ffffff 10%, #ffffff 20%, #ffffff 30%, #fffdfd 40%, #fff1f3 50%, #fce5eb 60%, #f7dbe5 70%, #f2d2e1 80%, #eccadf 90%, #e6c3de 100%);">
    <!-- Encabezado de contenido (encabezado de página) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-10">
            <h1>Pre-ventas</h1> <br>
          </div>
        </div>
      </div><!-- /.contenedor fluido -->
    </section>

    <!-- Contenido principal -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12" >
            <div class="card" style="backdrop-filter: blur(30px);
            border-radius: 30px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.8);
            overflow: hidden;
            width: 100%;
            padding: 20px;">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Fecha de Pre-venta</th>
                        <th>Nombre</th>
                        <th>Precio por pagar</th>
                        <th>Detalles</th>
                        <th>Aprobar</th>
                        <th>Eliminar</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                        
                        // Crear la consulta para buscar al usuario en la base de datos
                        $query = "SELECT id_preventa,id_cliente,fecha_compra,total from pre_ventas;";
                        // Ejecutar la consulta
                        $res = mysqli_query($con, $query);
                        // Recoger los datos del usuario
                        

                        while($row = mysqli_fetch_assoc($res) ){
                            // Obtener el nombre del cliente usando el id_cliente de la tabla pre_ventas
                            $idCliente = $row['id_cliente'];
                            $queryNombreCliente = "SELECT nombre FROM clientes WHERE id = '$idCliente'";
                            $resNombreCliente = mysqli_query($con, $queryNombreCliente);

                            // Verificar si la consulta del nombre del cliente fue exitosa
                            if ($resNombreCliente) {
                                $rowNombreCliente = mysqli_fetch_assoc($resNombreCliente);
                                $nombreCliente = $rowNombreCliente['nombre'];
                            } else {
                                $nombreCliente = "Error al obtener el nombre";
                            }
                        ?>
                         <tr>
                            <td><?php echo $row['id_preventa'] ?></td>
                            <td><?php echo $row['fecha_compra'] ?></td>
                            <td><?php echo $nombreCliente ?></td>
                            <td><?php echo "S/. ".$row['total'] ?></td>
                            <td>
                              <a href="panel.php?modulo=Recibo_Preventa&idPreventa=<?php echo $row['id_preventa'] ?>" class="text-primary">
                                  <i class="icono fa fa-info-circle" aria-hidden="true"></i>
                              </a>
                              <!-- Ver detalles de la compra -->
                            </td>
                            <td><a href="panel.php?modulo=pre_ventas&idCancelar=<?php echo $row['id_preventa'] ?>" class="text-success cancelar"> <i class="icono fa fa-check-circle" aria-hidden="true"></i> </a> <!-- Confirmar pago de yape --></td>
                            <td><a href="panel.php?modulo=pre_ventas&idBorrar=<?php echo $row['id_preventa'] ?>" class="text-danger borrar"> <i class="icono fas fa-trash"></i> </a> <!-- Borrar usuario --></td>
                        </tr>
                        <?php
                        }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <style>
    .icono {
      font-size: 20px;
      display: flex;
      align-items: center;
      justify-content: center; /* Tamaño del icono */
    }
  </style>