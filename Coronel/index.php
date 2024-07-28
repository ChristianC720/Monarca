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
    <script src="consultBooks.js"></script>
</head>
<body>
<div class="navbar" id="navbar1">
    <ul>
        <!-- LOGO CON REDIRECCIONAMIENTO A LA PÁGINA PRINCIPAL -->
        <li><a href="index.php" class='logo' ><img src="logo_monarca.png" alt="LogoMonarca" width="50px"></a></li>

        <!-- INICIAR SESION / PERFIL -->
        <?php if(isset($_SESSION["loggedin"])) {
            echo "<li><a href='perfil.php' class='active'>" . htmlspecialchars($_SESSION["username"]) . '</a></li>';
            echo "<li><a href='logout.php' class='btn btn-danger ml-1'>Cerrar Sesión </a></li>"; }
        else { echo "<li><a href='login.php' class='active'> Iniciar Sesion </a></li>"; } ?>

        <!-- BARRA DE BÚSQUEDA -->
        <li><div class="search-container">
                <input type="text" placeholder="Search.." name="search_item">
                <button type="submit"><i class="fa fa-search"></i></button>
            </div></li>

        <!-- REDIRECCIONAMIENTO A: ACERCA DE -->
        <li><a href="" class="link">Acerca de</a></li>

        <!-- REDIRECCIONAMIENTO A: SOPORTE AL CLIENTE -->
        <li><a href="" class="link">Soporte al cliente</a></li>

        <!-- REDIRECCIONAMIENTO A: SOPORTE AL CLIENTE -->
        <li><a href="" class="fa fa-shopping-cart"><?php echo '<br>$' . $carrito_total = 00.00; ?></a></li>
        <li></li>
    </ul>
</div>
<div class="row">
    <div class="side"></div>
    <div class="main">

    </div>
    <div class="side"></div>
</div>
    <div class="row">
    <div class="side">
        <div class="fakeimg" style="height:60px;">PUBLICIDAD</div>
    </div>
    <div class="main">
        <?php
        require_once "requestCatalogo.php";
        $rownumbers = 1;
        echo "<div class='product-container'>";
        while($consulta  = mysqli_fetch_array($result) and ($rownumbers <= 12)) {
            echo "<a href='#' class='product'> 
    <ul>
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
    <div class="side">

        <div class="fakeimg" style="height:60px;">PUBLICIDAD</div>
    </div>

</div>

<div class="footer">
    <h2>Footer</h2>
</div>



<script>
    function myFunction() {
        var x = document.getElementById("navbar1");
        if (x.className === "navbar") {
            x.className += " responsive";
        } else {
            x.className = "navbar";
        }
    }
</script>
</body>
</html>
