<?php
// guardarDatos.php

// Recibir los datos del cliente
$data = json_decode(file_get_contents('php://input'), true);

// Configuración de la conexión a la base de datos (usando MySQLi)
    $servername = "localhost";
    $username = "b87ndk8p_root";
    $password = "happy123store";
    $dbname = "b87ndk8p_ecommerce";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);
// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Iterar sobre los datos y guardarlos en la base de datos
foreach ($data as $item) {
    $nombre = $item['nombre'];
    $precio = $item['precio'];
    $cantidad = $item['cantidad'];
    $total = $item['totalProducto'];

    // Preparar la consulta SQL (usando declaración preparada para prevenir la inyección SQL)
    $stmt = $conn->prepare("INSERT INTO tu_tabla (nombre, precio, cantidad, total) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nombre, $precio, $cantidad, $total);
    $stmt->execute();
}

// Cerrar la conexión
$conn->close();

// Responder al cliente (puedes enviar cualquier cosa que desees de vuelta)
echo json_encode(['message' => 'Datos guardados con éxito']);
?>
