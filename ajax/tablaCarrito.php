<?php
include_once "agregarCarrito.php";
    // Verifica si hay productos para mostrar
if (!empty($productos)) {
    echo '<table border="1">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>TotalProducto</th>
                </tr>
            </thead>
            <tbody>';

    // Itera sobre cada producto y agrega una fila a la tabla
    foreach ($productos as $producto) {
        echo '<tr>
                <td>' . $producto['nombre'] . '</td>
                <td>' . $producto['cantidad'] . '</td>
                <td>' . $producto['precio'] . '</td>
                <td>' . $producto['precio'] * $producto['cantidad']. '</td>
              </tr>';
    }

    echo '</tbody></table>';
} else {
    echo '<p>No hay productos en el carrito.</p>';
}
?>




