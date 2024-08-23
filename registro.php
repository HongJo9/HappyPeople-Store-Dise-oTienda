<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My ecommerce</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="happypeoplestore/dist/img/icono.jpg" type="image/x-icon">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="happypeoplestore/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="happypeoplestore/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="happypeoplestore/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <style>

@import url('https://fonts.googleapis.com/css2?family=Crimson+Pro:ital,wght@0,200..900;1,200..900&family=Jost:ital,wght@0,100..900;1,100..900&family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Protest+Strike&display=swap');
        body {
            background-image: url('happypeoplestore/dist/img/fondo-login.jpeg'); /* Cambia 'path/to/your/image.jpg' por la ruta de tu imagen de fondo */
            background-size: cover;
            background-attachment: fixed;
            background-repeat: no-repeat;
            font-family: 'jost', sans-serif;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-box {
            backdrop-filter: blur(30px);
            border: 2px solid #7a623b;
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
            background: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .boton {
            background-color: #7a623b;
            border-color: #7a623b;
        }

        .boton:hover {
            background-color: #634f32;
            border-color: #634f32;
        }

        .text-success {
            color: #28a745;
        }

        .text-success:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <b style="color:white; font-weight: bold;">Se nuestro cliente</b>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Regístrate</p>
                <?php
                if (isset($_REQUEST['registro'])) {
                    session_start();
                    $nombre = $_REQUEST['nombre'] ?? '';
                    $DNI = $_REQUEST['DNI'] ?? '';
                    $email = $_REQUEST['email'] ?? '';
                    $telefono = $_REQUEST['telefono'] ?? '';
                    $direccion = $_REQUEST['direccion'] ?? '';
                    $pasword = $_REQUEST['pass'] ?? '';
                    $pasword = md5($pasword);
                    include_once "happypeoplestore/DBecommerce.php";
                    $con = mysqli_connect($host, $user, $pass, $db);
                    // Consulta para verificar si el correo electrónico ya existe
                    $check_query = "SELECT * FROM clientes WHERE email = '$email'";
                    $check_result = mysqli_query($con, $check_query);

                    if (mysqli_num_rows($check_result) > 0) {
                        // El correo electrónico ya existe en la base de datos, mostrar un mensaje de error.
                ?>
                        <div class="alert alert-danger" role="alert">
                            Este correo electrónico ya está registrado.
                        </div>
                    <?php
                    } else {
                        $query = "INSERT into clientes (nombre,email,DNI,telefono,direccion,pass) values ('$nombre','$email','$DNI','$telefono','$direccion','$pasword')";
                        $res = mysqli_query($con, $query);
                        if ($res) {
                    ?>
                            <div class="alert alert-primary" role="alert">
                                <strong>Registro exitoso</strong>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="alert alert-danger" role="alert">
                                Error de registro
                            </div>
                <?php
                        }
                    }
                }
                ?>
                <form method="post" style="margin: 0 0 20px 0;">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Nombre" name="nombre" required="required">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Correo Electrónico" name="email" required="required">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Contraseña" name="pass" required="required">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="number" class="form-control" placeholder="Teléfono" name="telefono" required="required">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="number" class="form-control" placeholder="DNI" name="DNI" required="required">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Dirección" name="direccion" required="required">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button style="padding: 10px 20px;  background-color: #FF0000; color:white; border: #FF0000; border-radius: 10px;" type="submit" class="btn btn-primary boton" name="registro">Registrarse</button>
                            <a style="color: #FF0000; margin: 10px 0 0 0" href="login.php" class="float-right">Ir a Iniciar Sesión</a>
                        </div>
                    </div>
                </form>
                <a style="padding: 10px 20px; background-color: #fee6b6; color:black; border: #FF0000; border-radius: 10px; margin: 10px 0 0 0" class=" mt-3" href="index.php" role="button">Regresar a la tienda</a>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="happypeoplestore/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="happypeoplestore/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="happypeoplestore/dist/js/adminlte.min.js"></script>
</body>

</html>
