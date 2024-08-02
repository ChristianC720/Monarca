<?php
/* Initialize the session */ session_start();
if (!isset($_SESSION['loggedin'])) {
    echo'<script type="text/javascript">
    alert("Sesión no iniciada");
    window.location.href="../index.php";
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
    <script src="C:/Users/Documents/GitHub/Monarca/javascript/adminjs.js"></script>
</head>
<body>
<?php  require('../admin/navbar.php'); ?>
<div class="row">
    <div class="side" style="background: none"></div>
    <div class="main product">
        <div class="product-container">
            <ul>
                <li>Usuario: <?php echo $_SESSION['username']; ?> </li>
                <li>Nombre: <?php echo $_SESSION['first_name']; ?> </li>
                <li><a href="reset-password.php" class="btn btn-primary">Cambiar Contraseña</a></li>
            </ul>
        </div>
    </div>
    <div class="side" style="background: none"></div>
</div>
</body>
</html>

