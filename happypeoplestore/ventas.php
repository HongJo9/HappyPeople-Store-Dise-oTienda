<?php
  // Incluir el archivo de conexión a la base de datos
  include_once "DBecommerce.php";
  // Conectar a la base de datos
  $con = mysqli_connect($host, $user, $pass, $db);
  if(isset($_REQUEST['idBorrar'])){
    $id= mysqli_real_escape_string($con,$_REQUEST['idBorrar']??'');
    $querydetalles="DELETE from detalle_venta where id_venta='".$id."';";
    $resdetalle=mysqli_query($con,$querydetalles);
    $query="DELETE from ventas where id_venta='".$id."';";
    $res=mysqli_query($con,$query);
    if($res){
      ?>
      <div class="alert alert-warning float-right" role="alert">
        La Venta a sido borrado con exito        
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
?>
<!-- Contenedor de contenido. Contiene contenido de la página -->
  <div class="content-wrapper" style="background-image: radial-gradient(circle at 44.73% 110.27%, #ffffff 0, #ffffff 10%, #ffffff 20%, #ffffff 30%, #fffdfd 40%, #fff1f3 50%, #fce5eb 60%, #f7dbe5 70%, #f2d2e1 80%, #eccadf 90%, #e6c3de 100%);">
    <!-- Encabezado de contenido (encabezado de página) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-10">
            <h1>VENTAS</h1> <br>
          </div>
        </div>
      </div><!-- /.contenedor fluido -->
    </section>

    <!-- Contenido principal -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
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
                        <th>Nombre</th>
                        <th>Fecha de Pre-Venta</th>
                        <th>Fecha de Venta</th>
                        <th>Monto pagado</th>
                        <th>Detalles</th>
                        <th>Eliminar</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                        
                        // Crear la consulta para buscar al usuario en la base de datos
                        $query = "SELECT id_venta,id_cliente,fecha_compra,fecha_confirmacion,total from ventas;";
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
                            <td><?php echo $row['id_venta']?></td>
                            <td><?php echo $nombreCliente ?></td>
                            <td><?php echo $row['fecha_compra'] ?></td>
                            <td><?php echo $row['fecha_confirmacion'] ?></td>
                            <td><?php echo "S/. ".$row['total'] ?></td>
                            <td> 
                                <a href="panel.php?modulo=Recibo_Venta&idVenta=<?php echo $row['id_venta'] ?>" class="text-primary"> <i class="icono fa fa-info-circle" aria-hidden="true"></i> </a>
                            <td><a href="panel.php?modulo=ventas&idBorrar=<?php echo $row['id_venta'] ?>" class="text-danger borrar"> <i class="icono fas fa-trash"></i> </a> <!-- Borrar usuario -->
                            </td></td>
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