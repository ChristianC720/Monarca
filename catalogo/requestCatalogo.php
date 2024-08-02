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
mysqli_set_charset($link,"utf8");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $search = $_POST["search_item"];
    $sql = "SELECT id, name, description, price, image FROM productos WHERE name LIKE '%{$search}%' ORDER BY price ASC";
} else {
    $sql = "SELECT id, name, description, price, image FROM productos ORDER BY price ASC";

}
$result = mysqli_query($link, $sql);
?>