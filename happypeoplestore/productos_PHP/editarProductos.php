<?php
include "DBecommerce.php"; // Incluye el archivo con la información de conexión
$con = mysqli_connect($host, $user, $pass, $db);

// Verifica si se ha enviado un ID de producto para editar
if (isset($_GET['id'])) {
    $producto_id = $_GET['id'];

    // Obtiene los datos del producto actual
    $query = "SELECT * FROM productos WHERE id = $producto_id";
    $result = mysqli_query($con, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $nombre_actual = $row['nombre'];
        $categoria_actual = $row['Categoria'];
        $precio_actual = $row['precio'];
        $stock_actual = $row['stock'];
        $imagen_actual = $row['imgProducto'];
        $descripcion_actual=$row['descripcion_producto'];
    } else {
        echo "Producto no encontrado.";
        exit;
    }
} else {
    echo "ID de producto no proporcionado.";
    exit;
}

// Procesa la actualización del producto
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombreMod'];
    $categoria = $_POST['categoriaMod'];
    $precio = $_POST['precioMod'];
    $stock = $_POST['stockMod'];
    $descripcion= $_POST['descripcionMod'];
    
    // Verifica si se ha enviado una nueva imagen y procesarla si es necesario
    $query = "UPDATE productos SET nombre = '$nombre', Categoria = '$categoria' , precio = '$precio', stock = '$stock', descripcion_producto = '$descripcion'";
    if (isset($_FILES['nueva_imagen'])) {
        $carpeta_destino = 'dist/img/';
        $nombre_archivo = $_FILES['nueva_imagen']['name'];
        $archivo_temporal = $_FILES['nueva_imagen']['tmp_name'];
        $ruta = $carpeta_destino . $nombre_archivo;
        
        if (move_uploaded_file($archivo_temporal, $ruta)) {
            // Elimina la imagen anterior
            unlink($imagen_actual);
            // Actualiza los datos en la base de datos, incluida la ruta de la imagen
            $ruta = mysqli_real_escape_string($con, $ruta);
            $query .= ", imgProducto = '$ruta'";
        } else {
            echo "Error al mover el archivo.";
        }
    }
    $query .= " WHERE id = $producto_id";
    mysqli_query($con, $query);

    // Redirige a la página de productos.php
    if($result){
      echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=productos&mensaje=el producto modificado exitosamente" /> ';
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
                    <h1>Editar Producto personalizado</h1>
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
                                    <label>ID del Producto</label>
                                    <input type="text" name="id" value="<?php echo $producto_id; ?>" class="form-control" placeholder="ID del producto" required="required" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Nombre del Producto</label>
                                    <input type="text" name="nombreMod" value="<?php echo $nombre_actual; ?>" class="form-control" placeholder="Producto ingresado" required="required">
                                </div>

                                <div class="form-group">
                                    <label>Categoría</label>
                                    <select name="categoriaMod" class="form-control">
                                        <option value="Importado" <?php echo ($categoria_actual === 'Importado') ? 'selected' : ''; ?>>Importado</option>
                                        <option value="Personalizado" <?php echo ($categoria_actual === 'Personalizado') ? 'selected' : ''; ?>>Personalizado</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label>Precio del producto</label>
                                    <input type="text" name="precioMod" value="<?php echo $precio_actual; ?>" class="form-control" placeholder="Precio" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Stock</label>
                                    <input type="text" name="stockMod" value="<?php echo $stock_actual; ?>" class="form-control" placeholder="Cantidad de productos" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Descripcion</label>
                                    <textarea name="descripcionMod" id="" class="form-control" rows="3" placeholder="Escribe una descripcion del producto"><?php echo $descripcion_actual ?></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="imgprevia" name="imgProducto" style="margin-top: 10px;">
                                        <label>Imagen actual del producto:</label>
                                        <br>
                                        <img src="<?php echo $imagen_actual; ?>" id="" src="" alt="" style="max-width: 200px;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Selecciona una nueva imagen:</label>
                                    <input type="file" name="nueva_imagen" id="imgProducto" class="form-control" placeholder="" require="required" onchange="previewImage()">
                                    <div class="imgprevia" style="margin-top: 10px;">
                                        <label>Imagen previa</label>
                                        <br>
                                        <img id="imgPreview" src="" alt="" style="max-width: 200px;">
                                    </div>
                                </div>
                                <script>
                                    // Esta función muestra una vista previa de la imagen seleccionada por el usuario
                                    function previewImage() {
                                        // Obtener el elemento de vista previa de la imagen
                                        var preview = document.querySelector('#imgPreview');
                                        // Obtener el archivo seleccionado
                                        var file = document.querySelector('#imgProducto').files[0];
                                        // Crear un objeto FileReader
                                        var reader = new FileReader();
                                        // Establecer el controlador de eventos onloadend
                                        reader.onloadend = function() {
                                            // Establecer la fuente de la imagen de vista previa en el resultado del FileReader
                                            preview.src = reader.result;
                                        }
                                        // Si se seleccionó un archivo, leerlo como una URL de datos
                                        if (file) {
                                            reader.readAsDataURL(file);
                                        } else {
                                            // Si no se seleccionó ningún archivo, borrar la fuente de la imagen de vista previa
                                            preview.src = "";
                                        }
                                    }
                                </script>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="guardar">Guardar Cambios</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

