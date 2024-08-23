<?php
if (isset($_POST['guardar'])) {
    // Incluir el archivo de conexión a la base de datos
    include_once "DBecommerce.php";

    // Conectar a la base de datos
    $con = mysqli_connect($host, $user, $pass, $db);

    // Verificar la conexión
    if (!$con) {
        die("Error de conexión a la base de datos: " . mysqli_connect_error());
    }

    // Obtener los datos del formulario
    $email = mysqli_real_escape_string($con, $_POST['email'] ?? '');
    $pass = md5(mysqli_real_escape_string($con, $_POST['pass'] ?? ''));
    $nombre = mysqli_real_escape_string($con, $_POST['nombre'] ?? '');
    $dni = mysqli_real_escape_string($con, $_POST['dni'] ?? '');
    $telefono = mysqli_real_escape_string($con, $_POST['telefono'] ?? '');
    $direccion = mysqli_real_escape_string($con, $_POST['direccion'] ?? '');

    // Crear la consulta para insertar un nuevo cliente
    $query = "INSERT INTO clientes (email, pass, nombre, DNI, telefono, direccion) VALUES ('$email', '$pass', '$nombre', '$dni', '$telefono', '$direccion')";

    // Ejecutar la consulta
    $res = mysqli_query($con, $query);

    // Verificar el resultado de la consulta
    if ($res) {
        echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=clientes&mensaje=Cliente creado exitosamente" />';
    } else {
        ?>
        <div class="alert alert-danger" role="alert">
            Error al crear nuevo cliente <?php echo mysqli_error($con); ?>
        </div>
    <?php
    }

    // Cerrar la conexión
    mysqli_close($con);
}
?>

<!-- Contenedor de contenido. Contiene contenido de la página -->
<div class="content-wrapper">
    <!-- Encabezado de contenido (encabezado de página) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Crear Cliente</h1>
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
                            <form action="panel.php?modulo=crearClientes" method="post">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Correo Electrónico" required>
                                </div>

                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input type="password" name="pass" class="form-control" placeholder="Contraseña" required>
                                </div>

                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" name="nombre" class="form-control" placeholder="Nombre Completo" required>
                                </div>

                                <div class="form-group">
                                    <label>DNI</label>
                                    <input type="text" name="dni" class="form-control" placeholder="Número de DNI" required>
                                </div>

                                <div class="form-group">
                                    <label>Teléfono</label>
                                    <input type="text" name="telefono" class="form-control" placeholder="Número de Teléfono" required>
                                </div>

                                <div class="form-group">
                                    <label>Dirección</label>
                                    <input type="text" name="direccion" class="form-control" placeholder="Dirección" required>
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
