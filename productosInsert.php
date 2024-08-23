<?php
include_once "ajax/agregarCarrito.php";
// Deserializa el contenido del cookie 'productos' en la variable $productos. Si el cookie no existe, se inicializa como un arreglo vacío.
$productos = unserialize($_COOKIE['productos'] ?? '');
// Verifica si $productos no es un arreglo (por ejemplo, si el cookie estaba vacío o no se pudo deserializar correctamente), y en ese caso, lo inicializa como un arreglo vacío.
if (!is_array($productos)) $productos = array();

// Respuesta en formato HTML para la tabla
echo "<table border='1'>
        <tr>
            <th>Nombre del Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
        </tr>";

// Iterar a través de cada producto en $productos y mostrar los datos en la tabla
foreach ($productos as $producto) {
    echo "<tr>
            <td>{$producto['nombre']}</td>
            <td>{$producto['precio']}</td>
            <td>{$producto['cantidad']}</td>
          </tr>";
}

echo "</table>";
?>
