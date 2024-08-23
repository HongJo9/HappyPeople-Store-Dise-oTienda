<?php
// Verificar si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $whatsappNumber = "984358846"; // Número de WhatsApp de destino
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $mensaje = $_POST['mensaje'];

    // Crear el mensaje de WhatsApp
    $whatsappMessage = "Nombre: $nombre\nNúmero de celular: $celular\nCorreo electrónico: $email\nMensaje: $mensaje";

    // URL para abrir WhatsApp con el número y el mensaje, y habilitar WhatsApp Web
    $whatsappUrl = "https://wa.me/$whatsappNumber/?text=" . urlencode($whatsappMessage) . "&source=web";

    // Redireccionar al usuario a la URL de WhatsApp
    header("Location: $whatsappUrl");
    exit();
} else {
    echo "Acceso no autorizado";
}
?>
