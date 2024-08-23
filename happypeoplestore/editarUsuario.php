<?php
    // Incluir el archivo de conexión a la base de datos
    include_once "DBecommerce.php";
    // Conectar a la base de datos
    $con = mysqli_connect($host, $user, $pass, $db);

  if( isset($_REQUEST['guardarusuario']) ){
    // Crear la consulta para buscar al usuario en la base de datos
    $email= mysqli_real_escape_string($con,$_REQUEST['email']??'');
    $pass= md5(mysqli_real_escape_string($con,$_REQUEST['pass']??''));
    $nombre= mysqli_real_escape_string($con,$_REQUEST['nombre']??'');
    $id= mysqli_real_escape_string($con,$_REQUEST['id']??'');

    $query = "UPDATE usuarios set
    email='" . $email . "',pass='" . $pass . "',nombre='" . $nombre . "'
    where id='".$id."';
    ";
    // Ejecutar la consulta
    $res = mysqli_query($con, $query);
    if($res){
        echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=usuarios&mensaje=Usuario '.$nombre.' editado exitosamente" /> ';
    }
    else{
      ?>
      <div class="alert alert-danger" role="alert">
        Error al editar usuario <?php echo mysqli_error($con);?>
      </div>
      <?php
    }
  }
// Esta línea recoge el id del usuario a editar
$id= mysqli_real_escape_string($con,$_REQUEST['id']??'');
$query="SELECT id,email,pass,nombre from usuarios where id='".$id."'; ";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($res);
?>

<!-- Contenedor de contenido. Contiene contenido de la página -->
  <div class="content-wrapper">
    <!-- Encabezado de contenido (encabezado de página) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Usuario</h1>
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
                <form action="panel.php?modulo=editarUsuario" method="post">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" id="" class="form-control" placeholder="Correo Electronico" value="<?php echo $row['email'] ?>" required="required">
                    </div>

                    <div class="form-group">
                      <label>Contraseña</label>
                      <input type="password" name="pass" id="" class="form-control" placeholder="Contraseña" required="required">
                    </div>

                    <div class="form-group">
                      <label>Nombre</label>
                      <input type="text" name="nombre" id="" class="form-control" placeholder="Nombre Completo" value="<?php echo $row['nombre'] ?>"  required="required">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>" >
                        <button type="submit" class="btn btn-primary" name="guardarusuario">Guardar nuevo usuario</button>
                    </div>
                </form>
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