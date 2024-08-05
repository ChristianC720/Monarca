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
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = $telephone = $fname = $lname = "";
$username_err = $password_err = $confirm_password_err = $telephone_err = $fname_err = $lname_err = "";

/* #####SE NECESITA AÑADIR AL FORMULARIO REGISTER.PHP LO SIGUIENTE: ######
        - Un input para telefono y verificación de error
        - Un input para nombre y verificación de error
        - Un input para apellido y verificación de error

El statement para insertar datos debería verse de la siguiente manera:
# Linea de código: 80     $sql= " INSERT INTO usuarios (username, password, first_name, last_name, telephone) VALUES (?, ?, ?, ?, ?) ";

*/

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor, introduzca un nombre de Usuario.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "El nombre de Usuario solo puede contener letras, números, y guión bajo.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM usuarios WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Este nombre de Usuario ya está en uso.";
                } else{
                    $username = trim($_POST["username"]);
                    $fname = trim($_POST["name"]);
                }
            } else{
                echo "¡Lo siento! Algo salió mal, intentélo de nuevo más tarde.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor, introduzca una contraseña.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "La contraseña debe contener al menos 6 carácteres.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Por favor, confirme su contraseña.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Las contraseñas no coinciden.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO usuarios (username, first_name, password) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_name, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_name = $fname;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "¡Lo siento! Algo salió mal, intentélo de nuevo más tarde.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body><center>
    <div class="wrapper">
        <h2>Registrarse</h2>
        <p>Por favor, introduzca los siguientes datos para crear una cuenta.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Usuario</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="name" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $fname; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirmar Contraseña</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Registrarse">
                <input type="reset" class="btn btn-secondary ml-2" value="Reiniciar">
            </div>
            <p>¿Ya tienes una cuenta? <a href="login.php">Inicia Sesión</a>.</p>
        </form>
    </div></center>    
</body>
</html>