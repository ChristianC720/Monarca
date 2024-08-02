<?php
/* Initialize the session */ session_start();
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
<body style="background-color: RGBA(247, 147, 30,1);">
<?php  require('navbar1.php'); ?>
<div class="row" >
    <div class="side" style="background: none">
        <div class="fakeimg" style="position: fixed; margin-left: 10px; width: max(9%)"><img src="../imgs/ONIKQ00.jpg" style="height: fit-content;">PUBLICIDAD</img></div></div>
    <div class="main" style="background-color: RGBA(247, 147, 30,1);">
            <div class="navbar" style="position: relative; margin-right: 10px; height: auto"><img src="../imgs/ofertas.png">PUBLICIDAD</img></div>
    </div>
    <div class="side" style="background: none">
        <div class="fakeimg" style="position: fixed; margin-right: 10px; width: max(9%)"><img src="../imgs/ONIKQ00.jpg" style="height: fit-content;">PUBLICIDAD</img></div>
    </div>
</div>
    <div class="row">
        <div class="side" style="background: none"></div>
    <div class="main">
        <div></div>
        <?php
        require_once "requestCatalogo.php";
        $rownumbers = 1;
        echo "<div class='product-container'>";
        while($consulta  = mysqli_fetch_array($result) and ($rownumbers <= 12)) {
            echo "<a href='contenidoProducto.php' class='product'><ul>
        <div class='card' style='width: 18rem;'>
        <img src='imagefake' class='fakeimage' alt='imagen de $consulta[name]' height='200px'>
        <div class='card-body'>
        <h5 class='card-title'>$consulta[name]</h5>
        $$consulta[price] </div></div></ul></a>";
            $rownumbers++;
        }
        echo "</div>";
        ?>
    </div>
        <div class="side" style="background: none"></div>

</div>

<div class="footer" style="height: 100px">
    <h2>Footer</h2>
</div>
</body>
</html>