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


// Verificar si se ha proporcionado un ID
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die('ID no proporcionado.');
}

$id = mysqli_real_escape_string($link, $_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $image = $_FILES['imagen'];

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $image = $_FILES['imagen']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
    }
    $sqlActualizar = "UPDATE productos SET name = '$nombre', image='$imgContent' WHERE id=$id";


    if (mysqli_query($link, $sqlActualizar)) {
        echo'<script type="text/javascript">
    alert("Datos actualizados correctamente");
    window.location.href="/GitHub/Monarca/admin/editar.php";
</script>';
        exit;
    } else {
        echo "Error actualizando el registro: " . mysqli_error($link);
    }
} else {
    $sql = "SELECT * FROM productos WHERE id=$id";
    $resultado = mysqli_query($link, $sql);

    if (!$resultado) {
        die('Error en la consulta: ' . mysqli_error($link));
    }

    $consulta = mysqli_fetch_assoc($resultado);

    if (!$consulta) {
        die('No se encontró un producto con el ID proporcionado.');
    }

    mysqli_free_result($resultado);
}

mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
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
        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #ffbc0c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #ffbc0c;
        }
    </style>
</head>
<body>
    <h1>Editar un producto</h1>
    <a href="editar.php">Regresar a Lista</a>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="">nombre</label>
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($consulta['name']); ?> ">
        <label for="">precio</label>
        <?php $precio2 = (double)htmlspecialchars($consulta['price']); ?>
        <input type="number" name="precio" value="<?php echo $precio2 = (double)htmlspecialchars($consulta['price']); ?>" step="0.01">
        <label for="">Descripción</label>
        <input type="text" name="descripcion" value="<?php echo htmlspecialchars($consulta['description']); ?> ">
        <label for="">imagen</label>
        <input type="file" accept="image/*" name="imagen" value="">
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>
