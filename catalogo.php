<?php
/* Initialize the session */ session_start();
require_once "../config/configbd.php";
mysqli_set_charset($link, "utf8");
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
    <div class="side"style="background: none"></div>
    <div class="main"style="background: none"></div>
    <div class="side"style="background: none"></div>
</div>
<div class="row">
    <div class="side">
        <form action="catalogo.php" method="POST">
        <h4>Filtros</h4>
        <table>
            <tr><th>Tipo</th></tr>
            <tr><th><button class="search-container" style="width: 100%; padding : 10px" name="search_item" value="Mouse" >Mouse</button></th></tr>
            <tr><th><button class="search-container" style="width: 100%; padding : 10px" name="search_item" value="Monitor" >Monitor</button></th></tr>
            <tr><th><button class="search-container" style="width: 100%; padding : 10px" name="search_item" value="Teclado" >Teclado</button></th></tr>

            <tr><th>Marca</th></tr>
            <tr><th><button class="search-container" style="width: 100%; padding : 10px" name="search_item" value="Dell" >Dell</button></th></tr>
            <tr><th><button class="search-container" style="width: 100%; padding : 10px" name="search_item" value="Logitech" >Logitech</button></th></tr>
            <tr><th><button class="search-container" style="width: 100%; padding : 10px" name="search_item" value="Razer" >Razer</button></th></tr>
            <tr><th><button class="search-container" style="width: 100%; padding : 10px" name="search_item" value="MSI" >MSI</button></th></tr>
        </table>
        </form>
    </div>
    <div class="main">
        <?php
        require_once "requestCatalogo.php";
        echo "<div class='product-container'>";
        while($consulta  = mysqli_fetch_array($result)){
            $imageData = base64_encode($consulta['image']);
            $id=$consulta["id"];
            echo "
        <a href='contenidoProducto.php?id=$id' class='product'><ul>
        <div class='card' style='width: 18rem;'>
        <img src='data:image/jpeg;base64,$imageData' class='card-img-top' alt='Imagen de $consulta[name]' style='height: max-content;'>
        <div class='card-body'>
        <h5 class='card-title'>$consulta[name]</h5>
        $$consulta[price] 
        </div>
        </div>
        </ul>
        </a>";
        }
        echo "</div>";
        ?>
    </div>
    <div class="side" style="background: none">
        <div class="fakeimg" style="position: fixed; margin-right: 10px; width: max(9%)"><img src="../imgs/ONIKQ00.jpg" style="height: fit-content;">PUBLICIDAD</img></div>
    </div>

</div>

<div class="footer" style="height: 100px; position: relative">
    <h2>Footer</h2>
</div>
</body>
</html>