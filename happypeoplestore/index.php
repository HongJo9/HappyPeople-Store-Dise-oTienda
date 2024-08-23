<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar sesión</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <style>
        body {
            background-image: url('dist/img/admin.png'); /* Cambia la ruta con la URL de tu imagen */
            background-size: cover;
            background-attachment: fixed;
            background-repeat: no-repeat;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-box {
            background: rgba(255, 255, 255, 0.8);
            border: 2px solid #ddd; /* Cambia el color del borde según tu preferencia */
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 400px;
            width: 100%;
            padding: 20px;
        }

        .login-logo {
            font-size: 30px;
            text-align: center;
            margin-bottom: 20px;
        }

        .login-card-body {
            background: rgba(255, 255, 255, 0.5); /* Ajusta la opacidad según tu preferencia */
        }

        .input-group {
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: #f39f18; /* Cambia el color del botón según tu preferencia */
            border-color: #ffa500;
        }

        .btn-primary:hover {
            background-color: #dd9a2e; /* Cambia el color del botón al pasar el ratón */
            border-color: #ffa500;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Happy People Store</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Administra tus productos</p>

                <?php
        // Si se ha pulsado el botón de login
        if (isset($_REQUEST['login'])) {
          // Iniciar una nueva sesión o reanudar la existente
          session_start();
          // Recoger el email y la contraseña del formulario de login
          $email = $_REQUEST['email'] ?? '';
          $pasword = $_REQUEST['pass'] ?? '';
          // Encriptar la contraseña con md5
          $pasword = md5($pasword);
          // Incluir el archivo de conexión a la base de datos
          include_once "DBecommerce.php";
          // Conectar a la base de datos
          $con = mysqli_connect($host, $user, $pass, $db);
          // Crear la consulta para buscar al usuario en la base de datos
          $query = "SELECT id,email,nombre from usuarios where email='" . $email . "' and pass='" . $pasword . "';  ";
          // Ejecutar la consulta
          $res = mysqli_query($con, $query);
          // Recoger los datos del usuario
          $row = mysqli_fetch_assoc($res);
          // Si el usuario existe
          if ($row) {
            // Guardar los datos del usuario en la sesión
            $_SESSION['id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['nombre'] = $row['nombre'];
            // Redirigir al usuario al panel de control
            header("location: panel.php");
          } else {
        ?>
            <div class="alert alert-danger" role="alert">
              Error de login
            </div>
        <?php
          }
        }
        ?>

                <form method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Correo electrónico" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Contraseña" name="pass">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <button type="submit" class="btn btn-primary btn-block" name="login">Iniciar sesión</button>
                        </div>
                        <div class="col-7">
                            <a href="../index.php" class="btn btn-primary btn-success"><i class="fa fa-cart-plus" aria-hidden="true"></i> Regresar a la tienda</a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>
