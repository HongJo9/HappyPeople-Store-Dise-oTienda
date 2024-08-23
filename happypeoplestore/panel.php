<!DOCTYPE html>
<html lang="en">
  <!-- <?php
    session_start();
    // Regenera el ID de sesión
    session_regenerate_id(true);
    // Cierra la sesión si se recibe una petición para cerrarla
    if(isset($_REQUEST['sesion']) && $_REQUEST['sesion'] == "cerrar"){
      session_destroy();
      header("location: index.php");
    }
    // Verifica si la sesión está iniciada, si no, redirige al usuario a index.php
    if (isset($_SESSION['id'])==false){
      header("location: index.php");
    }
    else{
      $modulo=$_REQUEST['modulo']??'';
    }
    
  ?> -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Happy People Store | Panel de control</title>

  <!-- Fuente de Google: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="css/botonesbajos.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
  <link rel="stylesheet" href="css/editor.dataTables.min.css">
  <!-- tipo de letra -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap">
</head>
<style>
  *{
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
  }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper " >


<!-- ----------------------------------------------------------------------------------------------------------------------------------------------- -->
  <!-- navegacion -->
  <nav style="background-image: radial-gradient(circle at 36.56% 21.17%, #e82d13 0, #e11c19 25%, #d8001d 50%, #cf0020 75%, #c60023 100%);" class="main-header navbar navbar-expand navbar-white navbar-light" >
    <!-- Enlaces de navegación izquierdos(Icono amburguesa) -->
    <ul class="navbar-nav">
      <li class="nav-item">
      <a class="nav-link" title="Abrir menú" data-widget="pushmenu" href="#" role="button">
    <i class="fas fa-bars" style="color: white;"></i>
</a>
      </li>
    </ul>


<!-- Boton de perfil -->
    <ul class="navbar-nav ml-auto"">
        <a class="nav-link text-light" href="../">
          <i class="bi bi-cart"></i> Ir a la tienda
        </a>
        <a class="nav-link text-light" href="panel.php?modulo=editarUsuario&id=<?php echo $_SESSION['id']; ?>">
          <i class="far fa-user"></i> Mi perfil
        </a>
        <a class="nav-link text-warning" title="Cerrar sesion" href="panel.php?modulo=&sesion=cerrar">
          <i class="fas fa-door-closed"></i> Cerrar Sesion
        </a>
    </ul>
  </nav>
<!-- ---------------------------------------------------------------------------------------------------------------------------------------- -->
  <!-- Contenedor de barra lateral principal -->
  <aside class="main-sidebar sidebar-dark-success elevation-4" style="background-image: radial-gradient(circle at 36.56% 21.17%, #a31312 0, #9a0014 50%, #910015 100%);">
    <!--Logo Principal-->
    <a href="#" class="brand-link">
      <img src="dist/img/logo.png" alt="Logo" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-light">Tienda Virtual</span>
    </a>

    <!-- Barra lateral -->
    <div class="sidebar">
      <!-- Espacio de usuario de la barra lateral (opcional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['nombre'];?></a>
        </div>
      </div>

      <!-- Menu Izquierda modulos-->
      <!-- titulo del modulo general "Tienda virtual" -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="fa fa-shopping-cart nav-icon" aria-hidden="true"></i>
              <p>
                Tienda Virtual
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <!-- Opciones de menu (Modulos del Menu) -->
            <ul class="nav nav-treeview">
              <!-- Modulo de estadisticas -->
              <li class="nav-item">
                <a href="panel.php?modulo=estadisticas" class="nav-link <?php echo ($modulo=="estadisticas" || $modulo=="" )?" active ":" "; ?>">
                  <i class="far fa-chart-bar nav-icon"></i>
                  <p>Estadisticas</p>
                </a>
              </li>

              <!-- Modulo de usuarios -->
              <li class="nav-item">
                <a href="panel.php?modulo=usuarios" class="nav-link <?php echo ($modulo=="usuarios" || $modulo=="crearUsuario" || $modulo=="editarUsuario")?" active ":" "; ?>">
                  <i class="far fa-user nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>

              <!-- Modulo de usuarios -->
              <li class="nav-item">
                <a href="panel.php?modulo=clientes" class="nav-link <?php echo ($modulo=="clientes" || $modulo=="crearClientes" || $modulo=="editarClientes")?" active ":" "; ?>">
                  <i class="fa fa-users nav-icon" aria-hidden="true"></i>
                  <p>Clientes</p>
                </a>
              </li>

              <!-- Modulo de Productos importados-->
              <li class="nav-item">
                <a href="panel.php?modulo=productos" class="nav-link <?php echo ($modulo=="productos" || $modulo=="agregarProductos" || $modulo=="editarProductos")?" active ":" "; ?>">
                  <i class="fa fa-shopping-bag nav-icon"></i>
                  <p>Productos</p>
                </a>
              </li>
              
              <!-- Modulo de pre-Ventas -->
              <li class="nav-item">
                <a href="panel.php?modulo=pre_ventas" class="nav-link <?php echo ($modulo=="pre_ventas" || $modulo=="Recibo_Preventa")?" active ":" "; ?>">
                <i class="fa fa-shopping-basket nav-icon" aria-hidden="true"></i>
                  <p>PreVentas</p>
                </a>
              </li>

              <!-- Modulo de Ventas -->
              <li class="nav-item">
                <a href="panel.php?modulo=ventas" class="nav-link <?php echo ($modulo=="ventas" || $modulo=="Recibo_Venta" )?" active ":" "; ?>">
                  <i class="fa fa-table nav-icon"></i>
                  <p>Ventas</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
  <?php
  if(isset($_REQUEST['mensaje'])){
    ?>
    <div class="alert alert-primary alert-dismissible fade show float-right" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
      </button>
      <?php echo $_REQUEST['mensaje'] ?>
    </div>
    <?php
  }

    if($modulo=="estadisticas" || $modulo==""){
      include_once "estadisticas.php";
    }

    if($modulo=="usuarios"){
      include_once "usuarios.php";
    }

    if($modulo=="clientes"){
      include_once "clientes.php";
    }

    if($modulo=="productos"){
      include_once "productos_PHP/productos.php";
    }

    if($modulo=="pre_ventas"){
      include_once "pre_ventas.php";
    }

    if($modulo=="ventas"){
      include_once "ventas.php";
    }

    if($modulo=="crearUsuario"){
      include_once "crearUsuario.php";
    }

    if($modulo=="crearClientes"){
      include_once "crearClientes.php";
    }
    if($modulo=="editarUsuario"){
      include_once "editarUsuario.php";
    }
    if($modulo=="editarClientes"){
      include_once "editarClientes.php";
    }

    if($modulo=="agregarProductos"){
      include_once "productos_PHP/agregarProductos.php";
    }

    if($modulo=="editarProductos"){
      include_once "productos_PHP/editarProductos.php";
    }

    if($modulo=="Recibo_Preventa"){
      include_once "recibos/Recibo_Preventa.php";
    }

    if($modulo=="Recibo_Venta"){
      include_once "recibos/Recibo_Venta.php";
    }
  ?>
</div>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="plugins/sparklines/sparkline.js"></script>
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="dist/js/adminlte.js"></script>
<script src="dist/js/pages/dashboard.js"></script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  $(document).ready(function () {
    $(".borrar").click(function (e) { 
      e.preventDefault();
      var res=confirm("¿Realmente quieres eliminarlo?");
      if(res==true){
        var link=$(this).attr("href");
        window.location=link;
      }

    });
  });
</script>
</body>
</html>