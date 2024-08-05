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
    <link rel="stylesheet" href="/GitHub/Monarca/css/styles.css">
    <script src="/GitHub/Monarca/javascript/adminjs.js"></script>
</head>
<body style="background-color: RGBA(247, 147, 30,1);">
<?php  require('admin/navbar1.php'); ?>
<div class="row" >
    <div class="side" style="background: none">
        <div class="fakeimg" style="position: fixed; margin-left: 10px; width: max(9%)"><img src="/GitHub/Monarca/imgs/ONIKQ00.jpg" style="height: fit-content;">PUBLICIDAD</img></div></div>
    <div class="main" style="background-color: RGBA(247, 147, 30,1);">
            <div class="navbar" style="position: relative; margin-right: 10px; height: auto"><img src="/GitHub/Monarca/imgs/ofertas.png">PUBLICIDAD</img></div>
    </div>
    <div class="side" style="background: none">
        <div class="fakeimg" style="position: fixed; margin-right: 10px; width: max(9%)"><img src="/GitHub/Monarca/imgs/ONIKQ00.jpg" style="height: fit-content;">PUBLICIDAD</img></div>
    </div>
</div>
    <div class="row">
        <div class="side" style="background: none"></div>
    <div class="main">
        <div class="product navbar" style="font-size: 5vh">SUGERIDOS</div><br>
        <?php
        require_once "catalogo/requestCatalogo.php";
        $rownumbers = 1;
        echo "<div class='product-container'>";
        while($consulta  = mysqli_fetch_array($result) and ($rownumbers <= 6)) {
            $imageData = base64_encode($consulta['image']);
            $id=$consulta["id"];
            echo "<a href='/GitHub/Monarca/catalogo/contenidoProducto.php?id=$id' class='product'><ul>
        <div class='card' style='width: 18rem;'>
        <img src='data:image/jpeg;base64,$imageData' class='card-img-top' alt='Imagen de $consulta[name]' style='height: max-content;'>
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
    <h2></h2>
</div>
</body>
</html>