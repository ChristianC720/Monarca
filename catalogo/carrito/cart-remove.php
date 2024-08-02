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
session_start();
if (!isset($_SESSION['loggedin'])) {
    echo'<script type="text/javascript">
                            alert("No tienes iniciada una sesión");
                            window.location.href="/GitHub/Monarca/index.php";
                        </script>';
    exit;
}
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $item_id = $_GET["id"];
    $user_id = $_SESSION['user_id'];

    // Delete the rows from user_items table where item_id and user_id equal to the item_id and user_id we got from the cart page and session
    $query = "DELETE FROM items_carrito WHERE product_id='$item_id' AND session_id='$user_id'";
    $res = mysqli_query($link, $query);
    header("location:/GitHub/Monarca/catalogo/carrito/cart.php");
}
?>
