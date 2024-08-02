<?php
/* Initialize the session */ session_start();
if (!isset($_SESSION['loggedin'])) {
    echo'<script type="text/javascript">
    alert("Sesión no iniciada");
    window.location.href="index.php";
</script>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <script src="adminjs.js"></script>
</head>
<body>
<?php  require('navbar.php'); ?>
<div class="row">
    <div class="side"></div>
    <div class="main"></div>
</div>
<a href="reset-password.php" class="btn btn-primary">Cambiar Contraseña</a>
</body>
</html>

