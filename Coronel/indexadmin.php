<?php
require_once "../config/configbd.php";
/* Initialize the session */ session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && $_SESSION["type_id"] != "1"){
    header("location: index.php");
    exit;
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <script src="consultBooks.js"></script>
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
<?php  require('navbar.php'); ?>
<div class="row">
    <div class="side"></div>
    <div class="main"></div>
</div>
<div class="row">
    <div class="side">
        <h4>Opciones</h4>
        <table>
            <tr><th><button class="tablink" style="width: 100%" onclick="openPage('AAdmin', this, 'RGBA(247, 147, 30,1 )')">Añadir Administradores</button></th></tr>
            <tr><th><button class="tablink" style="width: 100%" onclick="openPage('EAdmin', this, 'RGBA(247, 147, 30,1 )')">Eliminar Administradores</button></th></tr>
            <tr><th><button class="tablink" style="width: 100%" onclick="openPage('AProd', this, 'RGBA(247, 147, 30,1 )')">Añadir Productos</button></th></tr>
            <tr><th><button class="tablink" style="width: 100%" onclick="openPage('EProd', this, 'RGBA(247, 147, 30,1 )')">Eliminar Productos</button></th></tr>
            <tr><th><button class="tablink" style="width: 100%" onclick="openPage('AProv', this, 'RGBA(247, 147, 30,1 )')">Añadir Proveedores</button></th></tr>
            <tr><th><button class="tablink" style="width: 100%" onclick="openPage('EProv', this, 'RGBA(247, 147, 30,1 )')">Eliminar Proveedores</button></th></tr>
            <tr><th><button class="tablink" style="width: 100%" onclick="openPage('AInv', this, 'RGBA(247, 147, 30,1 )')">Añadir Inventario</button></th></tr>
            <tr><th><button class="tablink" style="width: 100%" onclick="openPage('EInv', this, 'RGBA(247, 147, 30,1 )')">Eliminar Inventario</button></th></tr>
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
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); $telephone_err = $username = $username_err = ""; ?>" method="post">
                        <div class="form-group">
                            <label>Usuario</label>
                            <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                            <span class="invalid-feedback"><?php echo $username_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" name="password" class="form-control <?php echo (!empty($telephone_err)) ? 'is-invalid' : ''; ?>">
                            <span class="invalid-feedback"><?php echo $telephone_err; ?></span>
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
                            <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                            <span class="invalid-feedback"><?php echo $username_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-danger" value="Eliminar">
                        </div>
                    </form>

                </div>
            </div>

            <!--CONTENIDO PRODUCTOS-->
            <!--Añadir-->
            <div id="AProd" class="tabcontent">
                <h3>Añadir Productos</h3>
                <div class="wrapper">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Usuario</label>
                            <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                            <span class="invalid-feedback"><?php echo $username_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Añadir">
                        </div>
                    </form>

                </div>
            </div>
            <!--Eliminar-->
            <div id="EProd" class="tabcontent">
                <h3>Eliminar Productos</h3>
                <div class="wrapper">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Usuario</label>
                            <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                            <span class="invalid-feedback"><?php echo $username_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-danger" value="Eliminar">
                        </div>
                    </form>

                </div>
            </div>

            <!--CONTENIDO PROVEEDORES-->
            <!--Añadir-->
            <div id="AProv" class="tabcontent">
                <h3>Añadir Proveedores</h3>
                <div class="wrapper">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Usuario</label>
                            <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                            <span class="invalid-feedback"><?php echo $username_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Añadir">
                        </div>
                    </form>

                </div>
            </div>
            <!--Eliminar-->
            <div id="EProv" class="tabcontent">
                <h3>Eliminar Proveedores</h3>
                <div class="wrapper">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Usuario</label>
                            <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                            <span class="invalid-feedback"><?php echo $username_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-danger" value="Eliminar">
                        </div>
                    </form>

                </div>
            </div>

            <!--CONTENIDO INVENTARIO-->
            <!--Añadir-->
            <div id="AInv" class="tabcontent">
                <h3>Añadir Inventario</h3>
                <div class="wrapper">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Usuario</label>
                            <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                            <span class="invalid-feedback"><?php echo $username_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Añadir">
                        </div>
                    </form>

                </div>
            </div>
            <!--Eliminar-->
            <div id="EInv" class="tabcontent">
                <h3>Eliminar Inventario</h3>
                <div class="wrapper">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Usuario</label>
                            <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                            <span class="invalid-feedback"><?php echo $username_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-danger" value="Eliminar">
                        </div>
                    </form>

                </div>
            </div>

        </div>

        <?php





        ?>
    </div>
</div>
<div class="footer" style="height: 100px">
    <h2>Footer</h2>
</div>
</body>
</html>
