<div class="navbar" id="navbar1">
    <ul>
        <!-- LOGO CON REDIRECCIONAMIENTO A LA PÁGINA PRINCIPAL -->
        <li><a href="index.php" class='logo' ><img src="logo-monarca.png" alt="LogoMonarca" width="50px"></a></li>

        <!-- INICIAR SESION / PERFIL -->
        <?php if(isset($_SESSION["loggedin"])) {
            echo "<li><a href='perfil.php' class='btn active'>" . htmlspecialchars($_SESSION["username"]) . '</a></li>';
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

        <!-- REDIRECCIONAMIENTO A: ADMINISTRADOR -->
        <?php if(isset($_SESSION["type_id"]) && $_SESSION["type_id"] == "1") {
            echo "<li><a href='admin.php' class='active'>" . 'ADMIN </a></li>'; } ?>
    </ul>
</div>