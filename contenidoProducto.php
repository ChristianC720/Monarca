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
    <link rel="stylesheet" href="../css/vista.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<?php include "navbar.php"; ?>
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
                    <p><a href="cart-add.php?id=<?php echo $id; ?>" name="add" value="add" class="btn btn-primary">Añadir al carrito</a><p>

            </div>
        </div>
    <?php else: ?>
        <p>No se encontró el producto.</p>
    <?php endif; ?>
</div>
</body>
</html>