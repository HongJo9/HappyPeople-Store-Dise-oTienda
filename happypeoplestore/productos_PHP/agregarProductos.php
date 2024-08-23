<?php
  include "DBecommerce.php"; // Incluye el archivo con la información de conexión
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Obtener los valores de los campos de texto
      $nombre = $_POST['nombre'];
      $categoria = $_POST['categoria'];
      $precio = $_POST['precio'];
      $stock = $_POST['stock'];
      $descripcion = $_POST['descripcion'];
  
      // Verificar si se ha enviado una imagen
      if (isset($_FILES['imgProducto'])) {
          // Ruta de la carpeta de destino
          $carpeta_destino = 'dist/imgProducto';  
          // Nombre del archivo original
          $nombre_archivo = $_FILES['imgProducto']['name'];
          // Ruta temporal del archivo
          $archivo_temporal = $_FILES['imgProducto']['tmp_name'];
          // Mover el archivo a la carpeta de destino
          if (move_uploaded_file($archivo_temporal, $carpeta_destino .'/'. $nombre_archivo)) {
              // Conectarse a la base de datos
              $con = mysqli_connect($host, $user, $pass, $db);
              // Escapar los valores para evitar SQL Injection
              $nombre = mysqli_real_escape_string($con, $nombre);
              $precio = mysqli_real_escape_string($con, $precio);
              $stock = mysqli_real_escape_string($con, $stock);
              $nombre_archivo = mysqli_real_escape_string($con, $nombre_archivo);
              $ruta=$carpeta_destino.'/'.$nombre_archivo;
              // Crear la consulta para insertar en la base de datos
              $query = "INSERT INTO productos (nombre,Categoria, precio, stock, imgProducto,descripcion_producto ) VALUES ('$nombre','$categoria', '$precio', '$stock', '$ruta','$descripcion')";
  
              // Ejecutar la consulta
              $res = mysqli_query($con, $query) or die(mysqli_error($con));
          } else {
              echo "Error al mover el archivo.";
          }
          if($res){
            echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=productos&mensaje=producto creado exitosamente" />  ';
          }
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
            <h1>Agregar Producto</h1>
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
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Nombre del Producto</label>
                      <input type="text" name="nombre" id="" class="form-control" placeholder="Producto ingresado" required="required">
                    </div>

                    <div class="form-group">
                      <label>Categoría</label>
                      <select name="categoria" class="form-control">
                        <option value="Importado">Importado</option>
                        <option value="Personalizado">Personalizado</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Precio del producto</label>
                      <input type="text" name="precio" id="" class="form-control" placeholder="Precio" required="required">
                    </div>

                    <div class="form-group">
                      <label>Stock</label>
                      <input type="text" name="stock" id="" class="form-control" placeholder="Cantidad de productos" required="required">
                    </div>

                    <div class="form-group">
                      <label>Descripcion del Producto</label>
                      <textarea name="descripcion" id="" class="form-control" rows="3" placeholder="Escribe una descripcion del producto"></textarea>
                    </div>

                    <div class="form-group">
                      <label>Imagen de producto</label>
                      <input type="file" name="imgProducto" id="imgProducto" class="form-control" placeholder="" require="required" onchange="previewImage()">
                      <div class="imgprevia" style="margin-top: 10px;">
                        <label>Imagen previa</label>
                          <br>
                        <img id="imgPreview" src="" alt="" style="max-width: 200px;">
                      </div>
                    </div>
                    <script>
                      function previewImage() {
                        var preview = document.querySelector('#imgPreview');
                        var file = document.querySelector('#imgProducto').files[0];
                        var reader = new FileReader();
                        reader.onloadend = function() {
                          preview.src = reader.result;
                        }
                        if (file) {
                          reader.readAsDataURL(file);
                        } else {
                          preview.src = "";
                        }
                      }
                    </script>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary" name="guardar">Agregar nuevo producto</button>
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
