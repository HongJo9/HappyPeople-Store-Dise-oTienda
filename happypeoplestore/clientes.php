<?php
  // Incluir el archivo de conexión a la base de datos
  include_once "DBecommerce.php";
  // Conectar a la base de datos
  $con = mysqli_connect($host, $user, $pass, $db);
  if(isset($_REQUEST['idBorrar'])){
    $id= mysqli_real_escape_string($con,$_REQUEST['idBorrar']??'');
    $query="DELETE from clientes where id='".$id."';";
    $res=mysqli_query($con,$query);
    if($res){
      ?>
      <div class="alert alert-warning float-right" role="alert">
        Cliente borrado con exito        
      </div>
      <?php
    }else{
      ?>
      <div class="alert alert-danger float-right" role="alert">
        Error al borrar al cliente <?php echo mysqli_error($con);?>
      </div>
      <?php 
    } 
  }
?>
<!-- Contenedor de contenido. Contiene contenido de la página -->
  <div class="content-wrapper" style="background-image: radial-gradient(circle at 44.73% 110.27%, #ffffff 0, #ffffff 10%, #ffffff 20%, #ffffff 30%, #fffdfd 40%, #fff1f3 50%, #fce5eb 60%, #f7dbe5 70%, #f2d2e1 80%, #eccadf 90%, #e6c3de 100%);">
    <!-- Encabezado de contenido (encabezado de página) -->
    <section class="content-header" ">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>CLIENTES</h1>
          </div>
        </div>
      </div><!-- /.contenedor fluido -->
    </section>

    <!-- Contenido principal -->
    <section class="content">
      <div class="container-fluid" >
        <div class="row" >
          <div class="col-12" >
            <div class="card" style="backdrop-filter: blur(30px);
            border-radius: 30px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.8);
            overflow: hidden;
            width: 100%;
            padding: 20px;">
              <!-- /.card-header -->
              <div class="card-body" >
              <a href="panel.php?modulo=crearClientes" class="btn btn-primary" style="margin: 0 0 10px;">Crear Clientes</a>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>DNI</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                        
                        // Crear la consulta para buscar al usuario en la base de datos
                        $query = "SELECT id,email,nombre,DNI,telefono,direccion from clientes;";
                        // Ejecutar la consulta
                        $res = mysqli_query($con, $query);
                        // Recoger los datos del usuario
                        

                        while($row = mysqli_fetch_assoc($res) ){
                            
                        ?>
                         <tr>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['DNI'] ?></td>
                            <td><?php echo $row['telefono'] ?></td>
                            <td><?php echo $row['direccion'] ?></td>
                            <td> 
                                <a href="panel.php?modulo=editarClientes&id=<?php echo $row['id'] ?>" style="margin-right: 5px;"> <i class="icono fas fa-edit"></i> </a> <!-- Editar usuario -->
                            </td>
                            <td>
                            <a href="panel.php?modulo=clientes&idBorrar=<?php echo $row['id'] ?>" class="text-danger borrar"> <i class="icono fas fa-trash"></i> </a> <!-- Borrar usuario -->
                            </td>
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