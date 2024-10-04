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

// Eliminar registro si se envía una solicitud POST para eliminar
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['tabla'])) {
    $id = mysqli_real_escape_string($link, $_GET['id']);
    if ($id != 7){
    $sqlEliminar = "DELETE FROM productos WHERE id=$id";

    if (mysqli_query($link, $sqlEliminar)) {
        echo'<script type="text/javascript">
        alert("Registro eliminado con éxito");
        window.location.href="/GitHub/Monarca/admin/editar.php";
        </script>';
    } else {
        echo "Error eliminando el registro: " . mysqli_error($link);
    }
} else {
        echo'<script type="text/javascript">
    alert("No se puede eliminar el administrador del sistema");
    window.location.href="/GitHub/Monarca/admin/editar.php";
</script>';
    }
}

?>

<?php
mysqli_close($link);
?>
