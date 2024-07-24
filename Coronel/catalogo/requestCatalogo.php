<?php
require_once "../../../config/configbd.php";
mysqli_set_charset($link,"utf8");

$sql = "SELECT id, category_id, discount_id, name, description, price FROM productos";

?>