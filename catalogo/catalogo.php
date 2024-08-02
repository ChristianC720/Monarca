<?php
/* Initialize the session */ session_start();
?>
<?php
/* Database credentials. Assuming you are running MySQL */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'user');
define('DB_PASSWORD', 'password');
define('DB_NAME', 'monarca');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: No se pudo conectar a la base de datos. " . mysqli_connect_error());
}

mysqli_set_charset($link, "utf8");
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
<body>
<?php  require '../admin/navbar.php'; ?>
<div class="row">
    <div class="side"style="background: none"></div>
    <div class="main"style="background: none"></div>
    <div class="side"style="background: none"></div>
</div>
<div class="row">
    <div class="side">
        <form action="/GitHub/Monarca/catalogo/catalogo.php" method="POST">
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
        /* Database credentials. Assuming you are running MySQL */

        /* Attempt to connect to MySQL database */
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

        // Check connection
        if($link === false){
            die("ERROR: No se pudo conectar a la base de datos. " . mysqli_connect_error());
        }
        mysqli_set_charset($link,"utf8");

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $search = $_POST["search_item"];
            $sql = "SELECT id, name, description, price, image FROM productos WHERE name LIKE '%{$search}%' ORDER BY price ASC";
        } else {
            $sql = "SELECT id, name, description, price, image FROM productos ORDER BY price ASC";

        }
        $result = mysqli_query($link, $sql);

        echo "<div class='product-container'>";
        while($consulta  = mysqli_fetch_array($result)){
            $imageData = base64_encode($consulta['image']);
            $id=$consulta["id"];
            echo "
        <a href='/GitHub/Monarca/catalogo/contenidoProducto.php?id=$id' class='product'><ul>
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
        <div class="fakeimg" style="position: fixed; margin-right: 10px; width: max(9%)"><img src="/GitHub/Monarca/imgs/ONIKQ00.jpg" style="height: fit-content;">PUBLICIDAD</img></div>
    </div>

</div>

<div class="footer" style="height: 100px; position: relative">
    <h2>Footer</h2>
</div>
</body>
</html>