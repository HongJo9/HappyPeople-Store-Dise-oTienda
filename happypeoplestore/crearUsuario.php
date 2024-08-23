<?php
  if( isset($_REQUEST['guardar']) ){
    // Incluir el archivo de conexión a la base de datos
    include_once "DBecommerce.php";
    // Conectar a la base de datos
    $con = mysqli_connect($host, $user, $pass, $db);
    // Crear la consulta para buscar al usuario en la base de datos
    $email= mysqli_real_escape_string($con,$_REQUEST['email']??'');
    $pass= md5(mysqli_real_escape_string($con,$_REQUEST['pass']??''));
    $nombre= mysqli_real_escape_string($con,$_REQUEST['nombre']??'');

    $query = "INSERT INTO usuarios
    (email,pass,nombre) VALUES
    ('".$email."','".$pass."','".$nombre."');
    ";
    // Ejecutar la consulta
    $res = mysqli_query($con, $query);
    if($res){
      echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=usuarios&mensaje=Usuario creado exitosamente" />  ';
    }
    else{
      ?>
      <div class="alert alert-danger" role="alert">
        Error al crear usuario <?php echo mysqli_error($con);?>
      </div>
      <?php
    }

  }
?>

<!-- Contenedor de contenido. Contiene contenido de la página -->
    <div class="content-wrapper">
    <!-- Encabezado de contenido (encabezado de página) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Crear Usuario</h1>
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
                <form action="panel.php?modulo=crearUsuario" method="post">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" id="" class="form-control" placeholder="Correo Electronico" required="required">
                    </div>

                    <div class="form-group">
                      <label>Contraseña</label>
                      <input type="password" name="pass" id="" class="form-control" placeholder="Contraseña" required="required">
                    </div>

                    <div class="form-group">
                      <label>Nombre</label>
                      <input type="text" name="nombre" id="" class="form-control" placeholder="Nombre Completo" required="required">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary" name="guardar">Guardar nuevo usuario</button>
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