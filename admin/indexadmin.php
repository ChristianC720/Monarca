<?php
require_once "/GitHub/Monarca/config/configbd.php";
mysqli_set_charset($link,"utf8");
/* Initialize the session */ session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && $_SESSION["type_id"] != "1"){
    echo'<script type="text/javascript">
    alert("Usted no es administrador, no se puede acceder a esta pagina");
    window.location.href="/GitHub/Monarca/index.php";
</script>';
    exit;
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/GitHub/Monarca/css/styles.css">
    <script src="/GitHub/Monarca/javascript/adminjs.js"></script>
</head>
<body>
<style>
    body{ font: 14px sans-serif; }
    .wrapper{ width: 360px; padding: 20px; }
    /* Style tab links */
    #Home {background-color: floralwhite;}
    #News {background-color: floralwhite;}
    #Contact {background-color: floralwhite;}
    #About {background-color: floralwhite;}
</style>
<?php  require('/GitHub/Monarca/admin/navbar.php'); ?>
<div class="row">
    <div class="side" style="background: none"></div>
    <div class="main"></div>
</div>
<div class="row">
    <div class="side">
        <h4>Opciones</h4>
        <table>
            <tr><th><button class="tablink" style="width: 100%" onclick="openPage('AAdmin', this, 'RGBA(247, 147, 30,1 )')">Añadir Administradores</button></th></tr>
            <tr><th><button class="tablink" style="width: 100%" onclick="openPage('EAdmin', this, 'RGBA(247, 147, 30,1 )')">Eliminar Administradores</button></th></tr>
            <tr><th><button class="tablink" style="width: 100%" onclick="openPage('AProd', this, 'RGBA(247, 147, 30,1 )')">Añadir Productos</button></th></tr>
            <tr><th><button class="tablink" style="width: 100%" onclick="openPage('EdProd', this, 'RGBA(247, 147, 30,1 )')">Editar Productos</button></th></tr>
            <tr><th><button class="tablink" style="width: 100%" onclick="openPage('ElProd', this, 'RGBA(247, 147, 30,1 )')">Eliminar Productos</button></th></tr>
        </table>
    </div>
    <div class="main">
        <div style="text-align: center"><H2>Funciones de Administrador</H2></div>
        <div class="search-container" style="float: none; position: relative; top: 50%; left: 50%; transform: translate(-50%, -50%);" >

            <body>
            <!--CONTENIDO ADMINISTRADORES-->
            <!--Añadir-->
            <div id="AAdmin" class="tabcontent">
                <h3>Añadir Administradores</h3>
                <div class="wrapper">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <div class="form-group">
                            <label>Usuario</label>
                            <input type="text" name="username" class="form-control" value="">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group">
                            <label>Tipo</label>
                            <select>
                                <option value="" selected></option>
                                <option value="Owner">Owner</option>
                                <option value="Administrator">Administrador</option>
                                <option value="CommonUser">Usuario</option>
                            </select>
                        </div>
                            <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" name="password" class="form-control">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Añadir">
                        </div>
                    </form>

                </div>
            </div>
            <!--Eliminar-->
            <div id="EAdmin" class="tabcontent">
                <h3>Eliminar Administradores</h3>
                <div class="wrapper">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Usuario</label>
                            <input type="text" name="username" class="form-control" value="">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" name="password" class="form-control">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-danger" value="Eliminar">
                        </div>
                    </form>

                </div>
            </div>

            <!--CONTENIDO PRODUCTOS-->
            <!--AÑADIR PRODUCTO-->
<?php
$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['addProd']) {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $description = $_POST['descripcion'];
    $image = $_FILES['imagen'];

    if ($nombre === '') {
        $errores[] = 'Debes especificar el nombre';
    }
    if ($precio === '') {
        $errores[] = 'Debes especificar una precio';
    }
    if ($description === '') {
        $errores[] = 'Debes especificar una proveedor';
    }
    if ($image === '') {
        $errores[] = 'Debes ingresar la imagen';
    }
    if (empty($errores)) {
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
            $image = $_FILES['imagen']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));
        }
        $peticionInsertar = "INSERT INTO productos (name, description, price, image) VALUES ('$nombre', '$description', '$precio', '$imgContent')";

        if (mysqli_query($link, $peticionInsertar)) {
            echo 'Datos insertados correctamente';
        } else {
            if (mysqli_errno($link) == 1062) { // Código de error para entradas duplicadas
                header('Location: /GitHub/Monarca/mensaje_error.php');
                exit();
            } else {
                echo "Error al insertar datos: " . mysqli_error($link);
            }
        }
    } else {
        echo'<script type="text/javascript">
    alert("No se ha podido insertar el producto, intente de nuevo");
    window.location.href="/GitHub/Monarca/admin/indexadmin.php"';
        exit;
    }
}
?>
            <div id="AProd" class="tabcontent">
                <h3>Añadir Productos</h3>
                <div class="wrapper">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="nombre" class="form-control" value="" placeholder="Nombre producto">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group">
                            <label>Precio</label>
                            <input type="number" name="precio" class="form-control" value="" placeholder="Precio producto" >
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="descripcion" class="form-control" value="" placeholder="Descripción producto">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group">
                            <label>Imagen</label>
                            <input type="file" accept="image/*" name="imagen">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="addProd" value="Añadir">
                        </div>
                    </form>
                </div>
            </div>

            <!--EDITAR PRODUCTO-->

            <div id="EdProd" class="tabcontent">
    <h3>Editar Productos</h3>
    <a href="/GitHub/Monarca/admin/editar.php">Editar</a>

            <!--ELIMINAR PRODUCTO-->
<?php
$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['ElProd']) {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $description = $_POST['descripcion'];
    $image = $_FILES['imagen'];

    if ($nombre === '') {
        $errores[] = 'Debes especificar el nombre';
    }
    if ($precio === '') {
        $errores[] = 'Debes especificar una precio';
    }
    if ($description === '') {
        $errores[] = 'Debes especificar una proveedor';
    }
    if ($image === '') {
        $errores[] = 'Debes ingresar la imagen';
    }
    if (empty($errores)) {
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
            $image = $_FILES['imagen']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));
        }
        $peticionInsertar = "INSERT INTO productos (name, description, price, image) VALUES ('$nombre', '$description', '$precio', '$imgContent')";

        if (mysqli_query($link, $peticionInsertar)) {
            echo 'Datos insertados correctamente';
        } else {
            if (mysqli_errno($link) == 1062) { // Código de error para entradas duplicadas
                header('Location: /GitHub/Monarca/admin/mensaje_error.php');
                exit();
            } else {
                echo "Error al insertar datos: " . mysqli_error($link);
            }
        }
    } else {
        echo'<script type="text/javascript">
    alert("No se ha podido insertar el producto, intente de nuevo");
    window.location.href="/GitHub/Monarca/admin/indexadmin.php"';
        exit;
    }
}
?>
            <div id="ElProd" class="tabcontent">
    <h3>Añadir Productos</h3>
    <div class="wrapper">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" value="" placeholder="Nombre producto">
                <span class="invalid-feedback"></span>
            </div>
            <div class="form-group">
                <label>Precio</label>
                <input type="number" name="precio" class="form-control" value="" placeholder="Precio producto" >
                <span class="invalid-feedback"></span>
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" name="descripcion" class="form-control" value="" placeholder="Descripción producto">
                <span class="invalid-feedback"></span>
            </div>
            <div class="form-group">
                <label>Imagen</label>
                <input type="file" accept="image/*" name="imagen">
                <span class="invalid-feedback"></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="EdProd" value="Añadir">
            </div>
        </form>
    </div>
</div>
        </div>
    </div>

    <div class="side" style="background: none"></div>
    </div>
<div class="footer" style="height: 100px">
    <h2>Footer</h2>
</div>
</body>
</html>
