<?php
require_once "../config/configbd.php";
mysqli_set_charset($link,"utf8");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $search = $_POST["search_item"];
    $sql = "SELECT id, name, description, price, image FROM productos WHERE name LIKE '%{$search}%' ORDER BY price ASC";
} else {
    $sql = "SELECT id, name, description, price, image FROM productos ORDER BY price ASC";

}
$result = mysqli_query($link, $sql);

/*
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $search = $_POST["search_item"];
    $sql = "SELECT id, name, description, price, image FROM productos WHERE name LIKE '%{$search}%' ORDER BY name DESC";
} else {
    $sql = "SELECT id, name, description, price, image FROM productos ORDER BY name DESC";

}
*/
?>