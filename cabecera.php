<div class="cabecera" style="z-index: 100; ">
    <nav class="container navbar navbar-expand-lg navbar-dark align-items-center"
        style="background-color: transparent; width: 100%;">
        <!-- Logo de cabecera -->
        <div class="navbar-brand col-md-3">
            <!-- logo -->
            <a href="index.php"><img src="happypeoplestore/dist/img/Happy-people-logo-oficial-blanco-1--1.png" alt="Logo"
                    class="img-fluid" style="max-width: 150px; margin: 20px 0 15px -10px"></a>
        </div>

        <!-- Botón de hamburguesa para dispositivos pequeños en el lado derecho -->
        <button class="navbar-toggler ml-auto navbar-dark" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <!-- Enlaces de navegación -->
        <div style="padding: 0 60px;" class="collapse navbar-collapse col-md-6" id="navbarNav">
            <ul class="navbar-nav" style="display: flex; justify-content: space-between; width: 100%;">

                <li class="nav-item"><a href="index.php?modulo=contactos" class="navegacion nav-link"
                        style="color:white; font-size: 20px; font-weight: bold; width: 25%; text-align: center;">Eventos</a>
                </li>
                <li class="nav-item"><a href="index.php?modulo=tienda" class="navegacion nav-link"
                        style="color:white; font-size: 20px; font-weight: bold; width: 25%; text-align: center;">Tienda</a>
                </li>
                <li class="nav-item"><a href="index.php?modulo=nosotros" class="navegacion nav-link"
                        style="color:white; font-size: 20px; font-weight: bold; width: 25%; text-align: center;">Conócenos</a>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse col-md-3 d-flex justify-content-center align-items-center">
            <div>
                <div>
                    <div >
                        <!-- Iniciar sesión -->
                        <div class="nav-item dropdown" id="loginButton">
                            <!-- Icono de login -->
                            <!-- Botón con imagen y texto -->
                            <button class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" style="font-weight: bold; background-color: white; border: none; color:#c00425; margin:-40px 0 10px 0; border-radius: 20px;">
                                <img src="happypeoplestore/dist/img/Happy-people-logo-oficial-COLOR1.png" alt="Ícono"
                                    style="width: 20px; height: 20px; margin-right: 2px; ">
                                cliente's happy
                            </button>
                            <!-- Contenido de login -->
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                <?php
                                if (isset($_SESSION['idCliente']) == false) {
                                    ?>
                                    <a href="happypeoplestore/panel.php" class="dropdown-item">
                                        <i class="fa fa-id-card-o" aria-hidden="true"></i> Administración
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="login.php" class="dropdown-item">
                                        <i class="fas fa-door-open mr-2"></i> Iniciar sesión
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="registro.php" class="dropdown-item">
                                        <i class="nav icon fas fa-sign-in-alt mr-2"></i> Registrarse
                                    </a>
                                    <?php
                                } else {
                                    ?>
                                    <h6 style="background-image: radial-gradient(circle at 25.74% 70.36%, #392d69 0, #001051 50%, #00003b 100%); color:white"
                                        href="index.php?modulo=usuario" class="dropdown-item">
                                        <i class="fa fa-id-badge" style="font-size: 20px;" aria-hidden="true"></i><i
                                            class="text-primary mr-2"></i> Bienvenido
                                        <?php echo $_SESSION['nombreCliente'] ?>
                                    </h6>
                                    <a href="happypeoplestore/panel.php" class="dropdown-item">
                                        <i class="fa fa-id-card-o" aria-hidden="true"></i> Administración
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="index.php?modulo=perfil" class="dropdown-item">
                                        <i class="fas fa-user text-primary mr-2"></i> Mi Espacio
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <form action="index.php" method="post">
                                        <button name="accion" class="btn btn-danger dropdown-item" type="submit"
                                            value="cerrar">
                                            <i class="fas fa-door-closed text-danger mr-2"></i> Cerrar Sesión
                                        </button>
                                    </form>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <!--Carrito Botón con contador -->
                    <button class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"
                        style="margin: 0 0 0 10px; padding: 10px 15px 8px 6px; background-color: #f20519; color: white; border: none; border-radius: 5px; font-weight: bold">
                        <span class="fa-stack">
                            <!-- Reemplazamos el icono por una imagen -->
                            <img src="happypeoplestore/dist/img/CARRITO-LOGO-HAPPY-PEOPPLE.png" alt="Carrito"
                                style="width: 20px; margin-top: -10px">
                            <!-- Modificamos el estilo del contador -->
                            <span class="fa-stack-1x badge badge-danger rounded-circle" id="badgeProducto"
                                style="font-size: 8px; margin: 14px 0 0 23px; background-color:white; color:red; width: 16px; height: 16px; line-height: 16px;">9</span>
                        </span>
                        LLEVAMÉ
                    </button>
                    <!-- Ventana emergente -->
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="listaCarrito">
                        <!-- Total de productos en dinero -->
                    </div>


                </div>
            </div>
        </div>
    </nav>
</div>

<?php
$mensaje = $_REQUEST['mensaje'] ?? '';
if ($mensaje) {
    ?>
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <?php echo $mensaje; ?>
    </div>
    <?php
}
?>

<style>
    * {
        margin: 0;
        padding: 0;
    }

    .cabecera{
        position: fixed;
        width: 100%;
        z-index: 2;
        transition: backdrop-filter 0.8s, background-color 0.9s;
    }
    .blur-header {
        backdrop-filter: blur(5px);
    }

    .hide-button {
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.5s, visibility 0.5s;
    }

    .navegacion {
        color: black;
    }

    .navegacion:hover {
        color: darkgray;
    }
</style>

<script>
    window.addEventListener('scroll', function() {
        const header = document.querySelector('.cabecera');
        const loginButton = document.getElementById('loginButton');
        if (window.scrollY > 50) {
            header.classList.add('blur-header');
            loginButton.classList.add('hide-button');
        } else {
            header.classList.remove('blur-header');
            loginButton.classList.remove('hide-button');
        }
    });
</script>
