<?php
require_once "requestCatalogo.php";
session_start();
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $item_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];
    $query = "INSERT INTO items_carrito (session_id, product_id, quantity) VALUES('$user_id', '$item_id', '1')";
    mysqli_query($link, $query) or die(mysqli_error($link));
    header('location: catalogo.php');
}
?>