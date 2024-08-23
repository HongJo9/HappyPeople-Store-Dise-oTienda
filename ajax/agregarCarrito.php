<?php
    // Deserializa el contenido del cookie 'productos' en la variable $productos. Si el cookie no existe, se inicializa como un arreglo vacío.
    $productos = unserialize($_COOKIE['productos'] ?? '');
    // Verifica si $productos no es un arreglo (por ejemplo, si el cookie estaba vacío o no se pudo deserializar correctamente), y en ese caso, lo inicializa como un arreglo vacío.
    if (is_array($productos) == false) $productos = array();
    // Inicializa la variable $siyaestaelproducto como falso, esta variable se usará para verificar si un producto ya existe en el arreglo $productos.
    $siyaestaelproducto = false;
    // Itera a través de cada elemento en el arreglo $productos.
    for ($i = 0; $i < count($productos); $i++) {
        $value = $productos[$i];
        // Comprueba si el 'id' del producto actual coincide con el 'id' recibido en la solicitud ($_REQUEST['id']).
        if ($value['id'] == $_REQUEST['id']) {
            // Si existe un producto con el mismo 'id', se suma la cantidad recibida ($_REQUEST['cantidad']) a la cantidad existente en el arreglo.
            $productos[$i]['cantidad'] = $productos[$i]['cantidad'] + $_REQUEST['cantidad'];
            // Establece la variable $siyaestaelproducto como verdadero, indicando que el producto ya existe en el arreglo.
            $siyaestaelproducto = true;
            break;
        }
    }
    // Si $siyaestaelproducto es falso, significa que no se encontró un producto con el mismo 'id' en el arreglo $productos.
    // En este caso, se crea un nuevo arreglo llamado $nuevo con información del producto y se agrega al arreglo $productos.
    if ($siyaestaelproducto == false) {
        $nuevo = array(
            "id" => $_REQUEST['id'],
            "nombre" => $_REQUEST['nombre'],
            "imgProducto" => $_REQUEST['imgProducto'],
            "cantidad"=>$_REQUEST['cantidad'],
            "precio"=>$_REQUEST['precio']
        );
        array_push($productos, $nuevo);
    }
    // Serializa el arreglo $productos y lo almacena en un cookie llamado "productos".
    setcookie("productos", serialize($productos));
    // Convierte el arreglo $productos a formato JSON y lo imprime como respuesta a la solicitud.
    echo json_encode($productos);    

    
?>




