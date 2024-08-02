<?php
include '../config/configbd.php';
session_start();
if (!isset($_SESSION['loggedin'])) {
    echo'<script type="text/javascript">
                            alert("No tienes iniciada una sesión");
                            window.location.href="index.php";
                        </script>';
    exit;
}
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $item_id = $_GET["id"];
    $user_id = $_SESSION['user_id'];

    // Delete the rows from user_items table where item_id and user_id equal to the item_id and user_id we got from the cart page and session
    $query = "DELETE FROM items_carrito WHERE product_id='$item_id' AND session_id='$user_id'";
    $res = mysqli_query($link, $query);
    header("location:cart.php");
}
?>
