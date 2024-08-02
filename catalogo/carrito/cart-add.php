<?php
session_start();
include '/GitHub/Monarca/config/configbd.php';
if (!isset($_SESSION['loggedin'])) {
    echo'<script type="text/javascript">
                            alert("No se pudo añadir al carrito, por favor inicie sesión.");
                            window.location.href="/GitHub/Monarca/index.php";
                        </script>';
    exit;
}
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $item_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];
    $query = "INSERT INTO items_carrito(session_id, product_id) VALUES('$user_id', '$item_id')";
    mysqli_query($link, $query) or die(mysqli_error($link));
    header('location: /GitHub/Monarca/catalogo/catalogo.php');
}
?>   