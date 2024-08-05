<?php
session_start(); // Inicia sesión para usar $_SESSION
include '../config/configbd.php';

// Verifica conexión
if ($link->connect_error) {
    die("Conexión fallida: " . $link->connect_error);
}

// Obteniene el ID del producto desde la URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
// Guardar la URL de retorno en la sesión
$_SESSION['url_retorno'] = "Detalles_del_producto.php?id=" . $id;
// Consulta la base de datos para obtener los detalles del producto
$sql = "SELECT id, name, price, description, image FROM productos WHERE id = ?";
$stmt = $link->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

// Verifica si se encontró el producto
$product = null;
if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $producto_id = $_POST['producto_id'];
    $nombre = $_POST['nombre'];
    $cantidad = 1;


    if (isset($_SESSION['carrito'][$producto_id])) {
        $_SESSION['carrito'][$producto_id]['cantidad'] += $cantidad;
    } else {
        $_SESSION['carrito'][$producto_id] = [
            'nombre' => $nombre,
            'cantidad' => $cantidad
        ];
    }
}

// Cerrar conexión
$link->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Producto</title>
    <link rel="stylesheet" href="/GitHub/Monarca/css/vista.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/GitHub/Monarca/css/styles.css">
</head>
<body>
<div class="navbar" id="navbar1">
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
        <li><a href="/GitHub/Monarca/" class="link">Acerca de</a></li>

        <!-- REDIRECCIONAMIENTO A: SOPORTE AL CLIENTE -->
        <li><a href="/GitHub/Monarca/SoporteTecnico/index.php" class="link">Soporte al cliente</a></li>

        <!-- REDIRECCIONAMIENTO A: CARRITO -->
        <li><a href="/GitHub/Monarca/catalogo/carrito/cart.php" class="fa fa-shopping-cart"><?php if(isset($_SESSION['sum'])){ echo '<br>' . $_SESSION['sum']  ? : '00.00';} ?></a></li>

        <!-- REDIRECCIONAMIENTO A: ADMINISTRADOR -->
        <?php if(isset($_SESSION["type_id"]) && $_SESSION["type_id"] == "1") {
            echo "<li><a href='/GitHub/Monarca/admin/indexadmin.php' class='active'>" . 'ADMIN </a></li>'; } ?>
    </ul>
</div>
<div id="catalogo-container">
    <?php if ($product): ?>
        <div class="producto">
            <div class="img-especifica">
                <?php $imageData = base64_encode($product['image']);
                echo "<img src='data:image/jpeg;base64,$imageData' class='card-img-top' alt='Imagen de $product[name]' style='height: max-content;'>" ?>
            </div>
            <div class="detalle-producto">
                <h1 class="nombre"><?php echo htmlspecialchars($product['name']); ?></h1>
                <p>Cantidad: 100
                <p>Precio: <?php echo isset($product['price']) ? '$' . number_format($product['price'], 2) : 'N/A'; ?></p>
                <p><?php echo $product['description']   ? : 'N/A'; ?></p>
                <!--agregar al carrito o favoritos-->
                    <p><a href="/GitHub/Monarca/catalogo/carrito/cart-add.php?id=<?php echo $id; ?>" name="add" value="add" class="btn btn-primary">Añadir al carrito</a><p>

            </div>
        </div>
    <?php else: ?>
        <p>No se encontró el producto.</p>
    <?php endif; ?>
</div>
</body>
</html>