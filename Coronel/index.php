<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
require_once '../config/configbd.php';
mysqli_set_charset($link,"utf8");

#$inchert = 'nononono';
#if ($inchert == 'wawawawawa'){
#$pass = password_hash("Cesar@123", PASSWORD_DEFAULT);
#$fecha = date("Y-m-d");
#$sql= " INSERT INTO usuarios (username, password, first_name, last_name, telephone) VALUES ('23393274@utcancun.edu.mx', '$pass', 'Christian', 'Coronel', '9983714615') ";
#$resultado = mysqli_query($link, $sql);
#}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
<h1 class="my-5"><div class="body1">Hola, <b><?php echo htmlspecialchars($_SESSION["id"]); ?></b>, Bienvenido al catálogo de productos.
        <p>
            <a href="reset-password.php" class="btn btn-warning">Cambiar Contraseña</a>
            <a href="logout.php" class="btn btn-danger ml-3">Cerrar Sesión</a></div>
    </p></h1>

<p>¿Que es lo que quieres hacer?</p>


</body>
</html>
