<?php
include_once "happypeoplestore/DBecommerce.php";
$con = mysqli_connect($host, $user, $pass, $db);

// Supongamos que obtienes el ID del cliente de alguna manera (base de datos, sesión, etc.)
$idCliente = $_SESSION['idCliente']; // Reemplaza esto con la lógica real para obtener el ID del cliente


if (isset($_REQUEST['idBorrar'])) {
    $id = mysqli_real_escape_string($con, $_REQUEST['idBorrar'] ?? '');
    $queryDetalles = "DELETE from detalle_preventa where id_preventa='" . $id . "';";
    $resDetalles = mysqli_query($con, $queryDetalles);
    $query = "DELETE from pre_ventas where id_preventa='" . $id . "';";
    $res = mysqli_query($con, $query);
    if ($res) {
        ?>
        <div class="alert alert-success float-right position-absolute" role="alert">
            Su Pre-venta ha sido borrada con éxito
        </div>
        <?php
    } else {
        ?>
        <div class="alert alert-danger float-right" role="alert">
            Error al borrar <?php echo mysqli_error($con); ?>
        </div>
        <?php
    }
}

// Verifica si se envió el formulario de actualización
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actualizarPerfil'])) {
    // Obtener los datos del formulario
    $nombreCli = $_POST['nombreCli'] ?? '';
    $emailCli = $_POST['emailCli'] ?? '';
    $telefonoCli = $_POST['telefonoCli'] ?? '';
    $DNICli = $_POST['DNICli'] ?? '';
    $direccionCli = $_POST['direccionCli'] ?? '';

    // Actualizar los datos en la base de datos
    $queryActualizar = "UPDATE clientes SET nombre='$nombreCli', email='$emailCli', DNI='$DNICli', telefono='$telefonoCli', direccion='$direccionCli' WHERE id='$idCliente'";
    $resActualizar = mysqli_query($con, $queryActualizar);

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

// Obtener los datos del cliente después de la posible actualización
$queryCliente = "SELECT * FROM clientes WHERE id = '$idCliente'";
$resCliente = mysqli_query($con, $queryCliente);
$rowCliente = mysqli_fetch_assoc($resCliente);

$nombreCliente = $rowCliente['nombre'];
$emailCliente = $rowCliente['email'];
$telefonoCliente = $rowCliente['telefono'];
$DNICliente = $rowCliente['DNI'];
$direccionCliente = $rowCliente['direccion'];

// Obtener datos de compras pendientes
$comprasPendientes = array();
// Obtener datos de compras pendientes ordenados por ID de mayor a menor
$queryCP = "SELECT id_preventa, fecha_compra, total FROM pre_ventas WHERE id_cliente = '$idCliente' ORDER BY id_preventa DESC";
$resCP = mysqli_query($con, $queryCP);

while ($rowCP = mysqli_fetch_assoc($resCP)) {
    $comprasPendientes[] = $rowCP;
}

// Obtener datos de ventas aprobadas
$ventasAprobadas = array();
// Obtener datos de ventas aprobadas ordenados por ID de mayor a menor
$queryVentas = "SELECT id_venta, id_cliente, fecha_compra, fecha_confirmacion, total FROM ventas WHERE id_cliente = '$idCliente' ORDER BY id_venta DESC";
$resVentas = mysqli_query($con, $queryVentas);

while ($rowVenta = mysqli_fetch_assoc($resVentas)) {
    $ventasAprobadas[] = $rowVenta;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Happy People Store | Perfil</title>
    <style>
        .cuerpo {
            background-color: white;
        }
    </style>
</head>
<body>
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
    <h1>Mi espacio personal</h1>
</div>
<div class="cuerpo container pt-5 pb-5">
    <div class="row">
        <form class="col-4 pl-5" method="post" action="" class="mb-5">
            <!-- PASO 1 y Paso 2 formulario de los datos del cliente -->
            <div>
                <h2 style="text-decoration: underline;">MI PERFIL</h2>
                <div class="form-group">
                    <label for="nombreCli">Nombre</label>
                    <input type="text" name="nombreCli" id="nombreCli" class="form-control" value="<?php echo $nombreCliente ?>">
                </div>

                <div class="form-group">
                    <label for="emailCli">Correo Electronico</label>
                    <input type="email" name="emailCli" id="emailCli" class="form-control" value="<?php echo $emailCliente ?>">
                </div>

                <div class="form-group">
                    <label for="telefonoCli">Telefono</label>
                    <input type="number" name="telefonoCli" id="telefonoCli" class="form-control" value="<?php echo $telefonoCliente ?>">
                </div>

                <div class="form-group">
                    <label for="DNICli">DNI</label>
                    <input type="number" name="DNICli" id="DNICli" class="form-control" value="<?php echo $DNICliente ?>">
                </div>

                <div class="form-group">
                    <label for="direccionCli">Direccion</label>
                    <textarea name="direccionCli" id="direccionCli" class="form-control" rows="3"><?php echo $direccionCliente ?></textarea>
                </div>
                <button style="background-color: #FF0000; color: white" type="submit" class="btn " name="actualizarPerfil">Actualizar Datos</button>
            </div>
        </form>
        <div class="pr-5 col-8 container">
            <h2 style="text-decoration: underline;">COMPRAS PENDIENTES</h2>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Fecha de Compra</th>
                    <th>Monto Final</th>
                    <th>Detalles</th>
                    <th>Eliminar</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($comprasPendientes as $compra) {
                        echo '<tr>';
                        echo '<td>' . $compra['id_preventa'] . '</td>';
                        echo '<td>' . $compra['fecha_compra'] . '</td>';
                        echo '<td>' ."S/. ". $compra['total'] . '</td>';
                        // Agrega un formulario oculto para enviar el id_venta a Recibo_Venta.php
                        echo '<td>
                        <form method="post" action="index.php?modulo=Recibo_Preventa" target="_blank" style="display:inline;">
                            <input type="hidden" name="idPreventa" value="' . $compra['id_preventa'] . '">
                            <button type="submit" class="icono text-success" style="border: none;">
                                <i class="icono fa fa-info-circle" aria-hidden="true"></i>
                            </button>
                        </form>
                        </td>';
                        //eliminar 
                        echo '<td>';
                        echo '<form method="post" action="" style="display:inline;">';
                        echo '<input type="hidden" name="idBorrar" value="' . $compra['id_preventa'] . '">';
                        echo '<button type="submit" class="icono borrar text-danger" name="eliminarPreventa" style="background:none;border:none;padding:0;cursor:pointer;"> <i class="icono fas fa-trash"></i> </button>';
                        echo '</form>';
                        echo '</td>';

                        echo '</td>';
                        echo '</tr>';
                    }
                ?>
                </tbody>
            </table>

            <h2 style="text-decoration: underline;">COMPRAS APROBADAS</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Fecha de Compra</th>
                        <th>Fecha de Aprobacion</th>
                        <th>Monto Final</th>
                        <th>Detalles</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($ventasAprobadas as $venta) {
                        echo '<tr>';
                        echo '<td>' . $venta['id_venta'] . '</td>';
                        echo '<td>' . $venta['fecha_compra'] . '</td>';
                        echo '<td>' . $venta['fecha_confirmacion'] . '</td>';
                        echo '<td>' ."S/. ". $venta['total'] . '</td>';
                        // Agrega un formulario oculto para enviar el id_venta a Recibo_Venta.php
                        echo '<td>
                                <form method="post" action="index.php?modulo=Recibo_Venta" target="_blank">
                                    <input type="hidden" name="idVenta" value="' . $venta['id_venta'] . '">
                                    <button type="submit" class="icono text-success" >
                                        <i class="icono fa fa-info-circle" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </td>';
                        
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function enviarFormulario(idPreventa) {
        document.getElementById('formPreventa' + idPreventa).submit();
    }
</script>
<style>
    .icono {
        font-size: 20px; 
        display: flex; 
        align-items: center;
        justify-content: center; 
        border: none; 
        padding: 0; 
        cursor: pointer;
        margin: 0 auto; /* Esto centra horizontalmente */
    }
  </style>
</body>
</html>
