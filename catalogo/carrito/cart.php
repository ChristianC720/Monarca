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

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carrito</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/GitHub/Monarca/css/styles.css">
    <script src="/GitHub/Monarca/javascript/adminjs.js"></script>
</head>

<body>
    <div>
        <?php
        include '../../admin/navbar.php';
        ?>
        <div class="d-flex flex-column justify-content-center align-items-center align-self-center" style="height:100vh" id="content">
            <div class="justify-content-center align-items-center" style="margin-top: 10vh; height: 100%">
                <table class="table table-striped" style="color: #d79f34" >
                    <?php
                    $sum = 0;
                    if (!isset($_SESSION['loggedin'])) {
                        echo'<script type="text/javascript">
                            alert("No tienes iniciada una sesión");
                            window.location.href="/GitHub/Monarca/index.php";
                        </script>';
                        exit;
                    }
                    $user_id = $_SESSION['user_id'];
                    $query = " SELECT productos.price AS Precio, productos.id, productos.name AS Nombre FROM items_carrito JOIN productos ON items_carrito.product_id = productos.id WHERE items_carrito.session_id='$user_id'";
                    $result = mysqli_query($link, $query);
                    if (mysqli_num_rows($result) >= 1) {
                    ?>
                        <thead>
                            <tr>
                                <th>Cantidad</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                                $sum += $row["Precio"];
                                $_SESSION['sum'] = $sum;
                                $id = $row["id"] . ", ";
                                echo "<tr><td>" . "1" . "</td><td>" . $row["Nombre"] . "</td><td>$ " . $row["Precio"] . "</td><td><a href='cart-remove.php?id={$row['id']}' class='remove_item_link'> Quitar</a></td></tr>";
                            }
                            $id = rtrim($id, ", ");
                            echo "<tr><td></td><td>Total</td><td>$ " . $_SESSION['sum'] . "</td><td><a href='/GitHub/Monarca/catalogo/Pago.php' class='btn btn-primary'>Ordenar</a></td></tr>";
                            ?>
                        </tbody>
                    <?php
                    } else {
                        $_SESSION['sum'] = $sum;
                        echo "<img src='/GitHub/Monarca/imgs/emptycart.png' class='fa fa-shopping-cart' height='300px'><br/>";
                        echo "<div class='h5'>Oh no!, parece ser que tu carrito está vacío,<br> vuelve cuando hayas añadido algo.</div>";
                    }
                    ?>
                    <?php
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!--footer -->
        <div class="footer" style="height: 100px">
            <h2>Footer</h2>
        </div>

    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<?php if (isset($_GET['error'])) {
    $z = $_GET['error'];
    echo "<script type='text/javascript'>
$(document).ready(function(){
$('#signup').modal('show');
});
</script>";
    echo "<script type='text/javascript'>alert('" . $z . "')</script>";
} ?>
<?php if (isset($_GET['errorl'])) {
    $z = $_GET['errorl'];
    echo "<script type='text/javascript'>
$(document).ready(function(){
$('#login').modal('show');
});
</script>";
    echo "<script type='text/javascript'>alert('" . $z . "')</script>";
} ?>

</html>