<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);

    $response = "Tu ticket ha sido generado. Nos pondremos en contacto contigo pronto.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Generado</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Ticket Generado</h1>
    <p><?php echo $response; ?></p>
    <a href="formulario.html" class="back-link">Volver al Formulario de Soporte</a>
    <a href="../index.php" class="back-link">Volver al Inicio</a>

    <!-- Start of Tawk.to Script -->
    <script type="text/javascript">
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    (function() {
        var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/66a8490f32dca6db2cb742c3/1i40lqph9';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
    </script>
    <!-- End of Tawk.to Script -->

    <script>
        window.onload = function() {
            alert("El chat en vivo está habilitado.");
        };
    </script>
</body>
</html>