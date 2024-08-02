<?php
session_start();
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