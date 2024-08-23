<?php
// Incluir el archivo de conexión a la base de datos
include_once "DBecommerce.php";

// Conectar a la base de datos
$con = mysqli_connect($host, $user, $pass, $db);

if (isset($_REQUEST['guardarcliente'])) {
    // Obtener los datos del formulario
    $email = mysqli_real_escape_string($con, $_REQUEST['email'] ?? '');
    $pass = md5(mysqli_real_escape_string($con, $_REQUEST['pass'] ?? ''));
    $nombre = mysqli_real_escape_string($con, $_REQUEST['nombre'] ?? '');
    $dni = mysqli_real_escape_string($con, $_REQUEST['dni'] ?? '');
    $telefono = mysqli_real_escape_string($con, $_REQUEST['telefono'] ?? '');
    $direccion = mysqli_real_escape_string($con, $_REQUEST['direccion'] ?? '');
    $id = mysqli_real_escape_string($con, $_REQUEST['id'] ?? '');

    // Crear la consulta para actualizar el cliente en la base de datos
    $query = "UPDATE clientes SET
        email='" . $email . "', pass='" . $pass . "', nombre='" . $nombre . "',
        DNI='" . $dni . "', telefono='" . $telefono . "', direccion='" . $direccion . "'
        WHERE id='" . $id . "';";

    // Ejecutar la consulta
    $res = mysqli_query($con, $query);

    if ($res) {
        echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=clientes&mensaje=Cliente ' . $nombre . ' editado exitosamente" />';
    } else {
        ?>
        <div class="alert alert-danger" role="alert">
            Error al editar cliente <?php echo mysqli_error($con); ?>
        </div>
    <?php
    }
}

// Esta línea recoge el id del cliente a editar
$id = mysqli_real_escape_string($con, $_REQUEST['id'] ?? '');
$query = "SELECT id, email, pass, nombre, DNI, telefono, direccion FROM clientes WHERE id='" . $id . "';";
$res = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($res);
?>

<!-- Contenedor de contenido. Contiene contenido de la página -->
<div class="content-wrapper">
    <!-- Encabezado de contenido (encabezado de página) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Cliente</h1>
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
                            <form action="panel.php?modulo=editarClientes" method="post">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Correo Electrónico" value="<?php echo $row['email'] ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input type="password" name="pass" class="form-control" placeholder="Contraseña" required>
                                </div>

                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" name="nombre" class="form-control" placeholder="Nombre Completo" value="<?php echo $row['nombre'] ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>DNI</label>
                                    <input type="text" name="dni" class="form-control" placeholder="Número de DNI" value="<?php echo $row['DNI'] ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Teléfono</label>
                                    <input type="text" name="telefono" class="form-control" placeholder="Número de Teléfono" value="<?php echo $row['telefono'] ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Dirección</label>
                                    <input type="text" name="direccion" class="form-control" placeholder="Dirección" value="<?php echo $row['direccion'] ?>" required>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                    <button type="submit" class="btn btn-primary" name="guardarcliente">Guardar cambios</button>
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
