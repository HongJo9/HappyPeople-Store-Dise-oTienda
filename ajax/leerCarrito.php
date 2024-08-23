<?php
    // Deserializa el contenido del cookie 'productos' en la variable $productos. Si el cookie no existe, se inicializa como un arreglo vacío.
    $productos = unserialize($_COOKIE['productos'] ?? '');

    echo json_encode($productos);
?>


