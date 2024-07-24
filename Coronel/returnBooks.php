<?php
require_once('connection.php');

//$value = $_POST['value'];

$sql = "SELECT * FROM libros WHERE available = 1";

$result = mysqli_query($link, $sql) or die (mysqli_error($link));

if (mysqli_num_rows($result) > 0)
{
    $data = array();

    while($row = mysqli_fetch_assoc($result))
    {
    $data[] = $row;
    }
    $json = json_encode($data);

    echo $json;
}





?>