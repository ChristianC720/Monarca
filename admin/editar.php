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

$errores = [];

// Obtener todos los registros de la tabla products
$sql = "SELECT * FROM productos";
$resultado = mysqli_query($link, $sql);

if (!$resultado) {
    die('Error en la consulta: ' . mysqli_error($link));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de productos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #ffbc0c;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #ffbc0c;
            color: white;
        }
        .button {
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            color: white;
        }
        .button-editar {
            background-color: #ffbc0c;
        }
        .button-editar:hover {
            background-color: #ffbc0c;
        }
    </style>
</head>
<body>
    <h1>Lista de productos</h1>
    <a href="/GitHub/Monarca/admin/indexadmin.php">Regresar</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
        </tr>
        <?php while ($products = mysqli_fetch_assoc($resultado)): ?>

                <td><?php echo htmlspecialchars($products['id']); ?></td>
                <td><?php echo htmlspecialchars($products['name']); ?></td>
                <td><?php echo htmlspecialchars($products['price']); ?></td>
                
                <td>
                    <form action="editar1.php" method="get">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($products['id']); ?> "hidden>
                        <button type="submit" name="tabla" value="Editar">Editar</button>
                    </form>
                    <form action="eliminar.php" method="get">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($products['id']); ?>"hidden>
                        <button type="submit" name="tabla" value="Eliminar">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php
mysqli_free_result($resultado);
mysqli_close($link);
?>
