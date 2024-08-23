<?php

include_once "happypeoplestore/DBecommerce.php";
$con = mysqli_connect($host, $user, $pass, $db);

//para jalar el valor del precio a pagar
if (isset($_COOKIE['TOTAL'])) {
    $total = $_COOKIE['TOTAL'];
} else {
    echo "No se ha proporcionado el valor de TOTAL.";
}

// Actualiza los datos del formulario del cliente
// Verifica si la sesión está activa
if (isset($_SESSION['idCliente'])) {
    if (isset($_POST['guardar'])) {
        $nombreCli = $_POST['nombreCli'] ?? '';
        $emailCli = $_POST['emailCli'] ?? '';
        $DNICli = $_POST['DNICli'];
        $telefonoCli = $_POST['telefonoCli'] ?? '';
        $direccionCli = $_POST['direccionCli'] ?? '';

        $queryGuardar = "UPDATE clientes SET nombre='$nombreCli', email='$emailCli',DNI='$DNICli', telefono='$telefonoCli', direccion='$direccionCli' WHERE id='" . $_SESSION['idCliente'] . "'";
        $resActualizar = mysqli_query($con, $queryGuardar);

        if ($resActualizar) {
            ?>
            <div class="alert alert-warning float-right position-absolute" role="alert">
                Se actualizó correctamente
            </div>
            <?php
        } else {
            ?>
            <div class="alert alert-danger float-right" role="alert">
                Error al actualizar <?php echo mysqli_error($con); ?>
            </div>
            <?php
        }
    }


    // Consulta para obtener los datos del cliente actualizados después de la posible actualización
    $query = "SELECT * FROM clientes WHERE id = '" . $_SESSION['idCliente'] . "'";
    $res = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($res);

    $idCliente= $row['id'];
    $nombreCliente = $row['nombre'];
    $emailCliente = $row['email'];
    $DNICliente =$row['DNI'];
    $telefonoCliente = $row['telefono'];
    $direccionCliente = $row['direccion'];
}

?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php if (isset($_SESSION['idCliente'])) : ?>


    <style>
    .dark-blurred-background {
        position: relative;
        height: 20vh;
        background-image: url('happypeoplestore/dist/img/fondo-tendencia.jpg');
        background-size: cover;
        background-position: center;
        overflow: hidden;
    }

    .dark-blurred-background::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-color: rgba(0, 0, 0, 0.5);
        /* Dark overlay */
        filter: blur(10px);
        /* Blur effect */
        z-index: 1;
    }

    .dark-blurred-background h2 {
        position: relative;
        z-index: 2;
        color: white;
        text-align: center;
        margin: 0;
        line-height: 20vh;
    }

    .dark-titulo-background {
        position: relative;
        height: 20vh;
        background-image: url('happypeoplestore/dist/img/fondo baner.jpg');
        background-size: cover;
        background-position: center;
        overflow: hidden;
    }

    .dark-titulo-background::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-color: rgba(0, 0, 0, 0.7);
        /* Dark overlay */
        filter: blur(10px);
        /* Blur effect */
        z-index: 1;
    }

    .dark-titulo-background h1 {
        position: relative;
        z-index: 2;
        color: white;
        text-align: center;
        margin: 0;
        line-height: 20vh;
        font-size: 50px;
    }
</style>
<div class="dark-blurred-background">
    </div>
<div class="dark-titulo-background">
    <h1>Sitio de Pago</h1>
</div>
<div class="container">
    <div class="row">
        
        <form class="col-8 pl-5 pr-5" method="post" action="" class="mb-5">
            <!--PASO1 y Paso2 formulario de los datos del cliente -->
            <div class="pt-5">
                <h2 style="text-decoration: underline; color:#f20519">PASO 1</h2>
                <h3>Verificar Datos del cliente</h3>
                <div class="form-group">
                    <label for="nombreCli">Nombre</label>
                    <input type="text" name="nombreCli" id="nombreCli" class="form-control" value="<?php echo $nombreCliente ?>">
                </div>

                <div class="form-group">
                    <label for="emailCli">Correo Electrónico</label>
                    <input type="email" name="emailCli" id="emailCli" class="form-control" value="<?php echo $emailCliente ?>">
                </div>

                <div class="form-group">
                    <label for="telefonoCli">Teléfono</label>
                    <input type="number" name="telefonoCli" id="telefonoCli" class="form-control" value="<?php echo $telefonoCliente ?>">
                </div>

                <div class="form-group">
                    <label for="DNICli">DNI</label>
                    <input type="number" name="DNICli" id="DNICli" class="form-control" value="<?php echo $DNICliente ?>">
                </div>

                <div class="form-group">
                    <label for="direccionCli">Dirección</label>
                    <textarea name="direccionCli" id="direccionCli" class="form-control" rows="3"><?php echo $direccionCliente ?></textarea>
                </div>
                    
                <a style="background-color: #fbe3b4; padding: 13px; color:black; margin: 15px 0 0 0;" href="index.php?modulo=carrito" role="button">Regresar al carrito</a>
                <button style="background-color: #FF0000; padding: 10px; color:white; border: solid #FF0000" type="submit" class="float-right" name="guardar" value="guardar">Actualizar Datos</button>

                <!-- Terminos y condiciones -->
                <div class="mt-5" style="margin-bottom: 80px;">
                    <h2 style="text-decoration: underline; color:#f20519;">PASO 2</h2>
                    <h4>Aceptar términos y condiciones</h4>
                    <ul >
                        <li>El comprador es responsable de proporcionar información precisa y completa para la transacción.</li>
                        <li>El pago que se pagará puede ser la mitad o en todo caso el pago completo.
                        </li>
                        <li>Usted comprende y acepta que es su responsabilidad verificar los detalles del producto, incluyendo el precio y la cantidad, antes de completar la transacción.</li>
                        <li>Una vez que haya realizado el pago del 50% o el 100% a través de Yape o Plin, recibirá una confirmación de pago de nuestra tienda en línea.</li>
                        <li>Deberá presentar la confirmación de su compra al recoger los productos.</li>
                        <li>Los productos deben ser recogidos dentro del plazo especificado en la confirmación de la compra. No se realizarán cambios o devoluciones si no se recogen los productos a tiempo.</li>
                        <li>Toda la información de pago que proporcione a través de Yape o Plin se manejará de manera segura y confidencial. No almacenamos detalles de tarjetas de crédito ni información financiera.</li>
                    </ul>
                    <!-- boton para aceptar -->
                    <div class="form-check mt-3">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="terminosCheckbox" name="" value="checkedValue">
                            <strong>He leído y aceptado los términos y condiciones</strong>
                        </label>
                    </div>
                </div>
            </div>
        </form>

        <!-- PASO 3 precio total y tutorial de pago con codigo de yape -->
        <form class="col-4 pr-5 " method="post" action="index.php?modulo=recibo" onsubmit="return validarTerminos();">
            <div class="pt-5" id="productosInsertados">
                <h2 style="text-decoration: underline; color:#f20519">PASO 3</h2>
                <div class="m-4">
                    <h5>Precio a pagar S/<span style="font-weight: bold; font-size: 30px;"><?php echo " ". $total?></span></h5>
                </div>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/0nD3T8B1R8w"></iframe>
                </div>
                <div class="mt-5">
                    <ul class="ml-5">
                        <li>Ingresa a Yape o Plin desde tu celular</li>
                        <li>Escanea el código QR, o hazlo al número 955257611</li>
                        <li>Ingresa el monto a transferir</li>
                        <li>Como nota enviar los productos a comprar</li>
                    </ul>
                </div>
                <!-- codigo de yape -->
                <div style="text-align: center;" class="mb-4">
                    <img class="img-fluid" src="../tiendavirtual/happypeoplestore/dist/img/Yape-CodigoQR.jpg" alt="">
                </div>
                <ul class="ml-5">
                    <li>Confirmar la compra para terminar el pedido</li>
                </ul>

                <!-- Campos ocultos para pasar datos -->
                <input type="hidden" name="nombreCliHidden" id="nombreCliHidden" value="<?php echo $nombreCliente ?>">
                <input type="hidden" name="emailCliHidden" id="emailCliHidden" value="<?php echo $emailCliente ?>">
                <input type="hidden" name="TelefonoCliHidden" id="TelefonoCliHidden" value="<?php echo $telefonoCliente ?>">
                <input type="hidden" name="DNICliHidden" id="DNICliHidden" value="<?php echo $DNICliente ?>">
                <input type="hidden" name="direccionCliHidden" id="direccionCliHidden" value="<?php echo $direccionCliente ?>">
                <input type="hidden" name="totalHidden" id="totalHidden" value="<?php echo $total ?>">

                
                <div style="text-align: center;">
                    <button style="background-color: #FF0000; color: white" type="submit" name="confirmarPago" onsubmit="validarTerminos();" class="btn mt-3 mb-5">Confirmar Pago</button>
                </div>
            </div>
        </form>
    </div>    




    
<?php else : ?>
    <!-- por si no inicia sesion se le pedira iniciarla -->
    <div class="text-center fondo" style="height: 80vh; padding: 0 0 20px 0">
        <div style="padding: 100px 0 0 0;">
            <img class="imagenlogin" src="happypeoplestore/dist/img/pago-login.png" alt="">
        </div>
        <div style="padding: 0 0 10px 0" class="Logeate" >
            <div style="margin: 0 0 30px 0; color:white;" class="mt-3">
                <h5>Debe iniciar sesión para continuar</h5>
            </div>
            <div class="mb-3">
                <a style="background-color: red; color: white; padding:15px;"  href="login.php" role="button">Iniciar sesión</a>
                <a style="background-color: #fee6b6; color: black; padding:15px;;"  href="Tienda-Productos/tienda.php" role="button">Regresar a la tienda</a>
            </div>
        </div>
        <div class="vacio">
        </div>
    </div>
<?php endif; ?>
</div>

<style>
    .imagenlogin{
        max-width: 100%; /* Hace que la imagen sea responsiva */
        height: auto; /* Ajusta la altura automáticamente según el ancho */
        /* Puedes ajustar el tamaño según tus necesidades */
        max-height: 300px; /* Altura máxima */
        margin-bottom: -15px; /* Espaciado inferior */
    }
    .Logeate{
        width: 400px; /* Ancho del div */
        padding: 20px; /* Espaciado interno del div */
        backdrop-filter: blur(10px);
        border-radius: 15px; /* Radio de las esquinas */
        border: 2px solid #7a623b; /* Borde amarillo */
        margin-left: auto;
        margin-right: auto;
        
    }
    .fondo{
        background-image: url("happypeoplestore/dist/img/fondo baner.jpg");
        background-size: cover; /* Cubre todo el contenedor */
        background-position: center; /* Centra la imagen en el contenedor */
        background-repeat: no-repeat; /* Evita la repetición de la imagen */
        background-attachment: fixed; /* Hace que la imagen de fondo sea fija mientras se desplaza la página */
    }
    .vacio{
        padding: 0 0 60px 0;
    }

    .row{
        background-image: radial-gradient(circle at 49.04% 55.42%, #ffffff 0, #fffbfc 25%, #f5f5f5 50%, #eaefee 75%, #e0e9e6 100%);
    }
</style>
<script>
    function validarTerminos() {
        var checkbox = document.getElementById("terminosCheckbox");
        
        if (checkbox.checked) {
            // Llenar los campos ocultos con los datos del cliente y el TOTAL
            document.getElementById("idCliHidden").value = "<?php echo $idCliente ?>";
            document.getElementById("nombreCliHidden").value = "<?php echo $nombreCliente ?>";
            document.getElementById("emailCliHidden").value = "<?php echo $emailCliente ?>";
            document.getElementById("TelefonoCliHidden").value = "<?php echo $telefonoCliente ?>";
            document.getElementById("DNICliHidden").value = "<?php echo $DNICliente ?>";
            document.getElementById("direccionCliHidden").value = "<?php echo $direccionCliente ?>";
            document.getElementById("totalHidden").value = "<?php echo $total ?>";
            return true; // El formulario se enviará si el checkbox está marcado.
        } else {
            alert("Debes aceptar los términos y condiciones para continuar.");
            return false; // Evita que el formulario se envíe si el checkbox no está marcado.
        }
    }
</script>
</body>
</html>
