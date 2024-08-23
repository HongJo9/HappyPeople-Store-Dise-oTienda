<?php
  include_once "DBecommerce.php";
  $con = mysqli_connect($host, $user, $pass, $db);
  // Consulta para obtener la cantidad de ventas por día de la semana
  $queryVentas = "SELECT DAYOFWEEK(fecha_confirmacion) AS dia_semana, COUNT(*) AS cantidad FROM ventas GROUP BY dia_semana";
  $resultadoVentas = mysqli_query($con, $queryVentas);

  // Consulta para obtener la cantidad de preventas por día de la semana
  $queryPreventas = "SELECT DAYOFWEEK(fecha_compra) AS dia_semana, COUNT(*) AS cantidad FROM pre_ventas GROUP BY dia_semana";
  $resultadoPreventas = mysqli_query($con, $queryPreventas);

  // Inicializar arrays para almacenar los datos
  $datosVentas = array_fill(1, 7, 0);
  $datosPreventas = array_fill(1, 7, 0);

  // Llenar los arrays con los resultados de las consultas
  while ($filaVentas = mysqli_fetch_assoc($resultadoVentas)) {
      $datosVentas[$filaVentas['dia_semana']] = $filaVentas['cantidad'];
  }

  while ($filaPreventas = mysqli_fetch_assoc($resultadoPreventas)) {
      $datosPreventas[$filaPreventas['dia_semana']] = $filaPreventas['cantidad'];
  }
?>


<div class="content-wrapper" style="background-image: radial-gradient(circle at 44.73% 110.27%, #ffffff 0, #ffffff 10%, #ffffff 20%, #ffffff 30%, #fffdfd 40%, #fff1f3 50%, #fce5eb 60%, #f7dbe5 70%, #f2d2e1 80%, #eccadf 90%, #e6c3de 100%);">
  <!-- Encabezado de contenido (encabezado de página) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">ESTADISTICAS</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <!-- ETIQUETAS -->
        <div class="row">
          <!-- ETIQUETA DE VENTAS -->
          <?php
            include_once "DBecommerce.php";
            $con = mysqli_connect($host, $user, $pass, $db);
            // Consulta para obtener el número de registros
            $query = "SELECT COUNT(*) AS total_registros FROM ventas";
            $resultado = mysqli_query($con, $query);

            // Verificar si la consulta fue exitosa
            if ($resultado) {
                // Obtener el resultado como un array asociativo
                $fila = mysqli_fetch_assoc($resultado);
                // Almacenar el número de registros en una variable
                $totalRegistros = $fila['total_registros'];
            } else {
                echo "Error en la consulta: " . mysqli_error($conexion);
            }
          ?>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $totalRegistros ?></h3>
                <p>Ventas</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>
          
          <!-- ETIQUETA DE PREVENTAS -->
          <?php
            include_once "DBecommerce.php";
            $con = mysqli_connect($host, $user, $pass, $db);
            // Consulta para obtener el número de registros
            $queryP = "SELECT COUNT(*) AS total_registrosP FROM pre_ventas";
            $resultadoP = mysqli_query($con, $queryP);

            // Verificar si la consulta fue exitosa
            if ($resultadoP) {
                // Obtener el resultado como un array asociativo
                $fila = mysqli_fetch_assoc($resultadoP);
                // Almacenar el número de registros en una variable
                $totalRegistrosP = $fila['total_registrosP'];
            } else {
                echo "Error en la consulta: " . mysqli_error($conexion);
            }
          ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $totalRegistrosP ?></h3>
                <p>Pre-ventas</p>
              </div>
              <div class="icon">
                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
              </div>
            </div>
          </div>

          <!-- ETIQUETA DE CLIENTES -->
          <?php
            include_once "DBecommerce.php";
            $con = mysqli_connect($host, $user, $pass, $db);
            // Consulta para obtener el número de registros
            $queryC = "SELECT COUNT(*) AS total_registrosC FROM clientes";
            $resultadoC = mysqli_query($con, $queryC);

            // Verificar si la consulta fue exitosa
            if ($resultadoC) {
                // Obtener el resultado como un array asociativo
                $fila = mysqli_fetch_assoc($resultadoC);
                // Almacenar el número de registros en una variable
                $totalRegistrosC = $fila['total_registrosC'];
            } else {
                echo "Error en la consulta: " . mysqli_error($conexion);
            }
          ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $totalRegistrosC ?></h3>

                <p>Clientes Registrados</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>

          <!-- ETIQUETA DE PRODUCTOS -->
          <?php
            include_once "DBecommerce.php";
            $con = mysqli_connect($host, $user, $pass, $db);
            // Consulta para obtener el número de registros
            $queryC = "SELECT COUNT(*) AS productostotal FROM productos";
            $resultadoC = mysqli_query($con, $queryC);

            // Verificar si la consulta fue exitosa
            if ($resultadoC) {
                // Obtener el resultado como un array asociativo
                $fila = mysqli_fetch_assoc($resultadoC);
                // Almacenar el número de registros en una variable
                $totalProductos = $fila['productostotal'];
            } else {
                echo "Error en la consulta: " . mysqli_error($conexion);
            }
          ?>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $totalProductos ?></h3>
                <p>Total de productos</p>
              </div>
              <div class="icon">
                <i class="fa fa-cube" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
          
        <div class="row justify-content-center">
          <section class="col-lg-9 ">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-bar mr-1"></i>
                  Ventas y Preventas por Día de la Semana
                </h3>
              </div>

              <div class="card-body">
                <canvas id="bar-chart" ></canvas>
              </div>
            </div>
          </section>
        </div>

      </div>
    </section>
</div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  // Configuración del gráfico
  var ctx = document.getElementById('bar-chart').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
      datasets: [
        {
          label: 'Ventas',
          backgroundColor: '#FFCD00',
          borderColor: '#E39101',
          borderWidth: 2,
          data: <?php echo json_encode(array_values($datosVentas)); ?>,
          barPercentage: 0.9 , // Ajusta el ancho de la barra
        },
        {
          label: 'Preventas',
          backgroundColor: '#FF1300',
          borderColor: '#BC0000',
          borderWidth: 2,
          data: <?php echo json_encode(array_values($datosPreventas)); ?>,
          barPercentage: 0.9, // Ajusta el ancho de la barra
        },
      ],
    },
    options: {
      scales: {
        x: {
          stacked: false, // Cambiado a false para que las barras no se apilen
        },
        y: {
          stacked: false, // Cambiado a false para que las barras no se apilen
        },
      },
    },
  });
</script>
