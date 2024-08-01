<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $problem = $_POST['problem'];
    $response = "";

    switch ($problem) {
        case "no_internet":
            $response = "Tienes problemas de conexión, verifica si tu señal es estable. Si el problema persiste, contacta a tu proveedor de servicios de Internet.";
            break;
        case "problema_carrito":
            $response = "Por favor, intenta añadir los productos de nuevo. Si el problema persiste, contacta con nuestro soporte técnico.";
            break;
        case "problema_software":
            $response = "Si tienes problemas con el software, intenta refrescar la página. Si los problemas continúan, favor comunicarse con un técnico";
            break;
        case "problema_navegacion":
            $response = "Puede que haya un problema técnico en proceso, por favor esperar a que nuestro equipo técnico solucione el problema";
            break;
        default:
            $response = "Por favor, selecciona un problema del formulario.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respuesta Automática de Soporte Técnico</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<img src="img/Logo.jpeg" alt="Logo" style="width: 100px; margin-bottom: 20px;">
    <h1>Respuesta Automática de Soporte Técnico</h1>
    <p><?php echo htmlspecialchars($response); ?></p>
    <a href="formulario.html">Volver al formulario</a>
</body>
</html>
