<div class="navbar" id="navbar1" style="background-color: RGBA(255, 255, 255,1);">
    <ul>
        <!-- LOGO CON REDIRECCIONAMIENTO A LA PÁGINA PRINCIPAL -->
        <li><a href="/GitHub/Monarca/index.php" class='logo'><img src="/GitHub/Monarca/imgs/logo-monarca.png" alt="LogoMonarca" width="50px"></a></li>

        <!-- INICIAR SESION / PERFIL -->
        <?php if(isset($_SESSION["loggedin"])) {
            echo "<li><a href='/GitHub/Monarca/Sesion/perfil.php' class='btn active'>" . htmlspecialchars($_SESSION["username"]) . '</a></li>';
            echo "<li><a href='/GitHub/Monarca/Sesion/logout.php' class='btn btn-danger ml-1'>Cerrar Sesión </a></li>"; }
        else { echo "<li><a href='/GitHub/Monarca/Sesion/login.php' class='active'> Iniciar Sesion </a></li>"; } ?>

        <!-- BARRA DE BÚSQUEDA -->
        <li><div class="search-container">
                <form action="/GitHub/Monarca/catalogo/catalogo.php" method="POST">
                    <input type="text" placeholder="Search.." name="search_item" value="<?php if(isset($search)){echo $search;} ?>">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </li>

        <!-- REDIRECCIONAMIENTO A: CATÁLOGO -->
        <li><a href="/GitHub/Monarca/catalogo/catalogo.php" class="link">Catálogo</a></li>

        <!-- REDIRECCIONAMIENTO A: ACERCA DE -->
        <li><a href="/GitHub/Monarca/admin/acercade.php" class="link">Acerca de</a></li>

        <!-- REDIRECCIONAMIENTO A: SOPORTE AL CLIENTE -->
        <li><a href="/GitHub/Monarca/SoporteTecnico/index.html" class="link">Soporte al cliente</a></li>

        <!-- REDIRECCIONAMIENTO A: CARRITO -->
        <li><a href="/GitHub/Monarca/catalogo/carrito/cart.php" class="fa fa-shopping-cart"><?php if(isset($_SESSION['sum'])){ echo '<br>' . $_SESSION['sum']  ? : '00.00';} ?></a></li>

        <!-- REDIRECCIONAMIENTO A: ADMINISTRADOR -->
        <?php if(isset($_SESSION["type_id"]) && $_SESSION["type_id"] == "1") {
            echo "<li><a href='/GitHub/Monarca/admin/indexadmin.php' class='active'>" . 'ADMIN </a></li>'; } ?>
    </ul>
</div>