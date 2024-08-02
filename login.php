<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    echo'<script type="text/javascript">
                            alert("Usted ya inició sesión.");
                            window.location.href="index.php";
                        </script>';
    exit;
}
// Include config file
require_once "../config/configbd.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, type_id, username, password, first_name FROM usuarios WHERE username = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $type_id, $username, $hashed_password, $fname);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            $status = session_status();
                            if($status == PHP_SESSION_NONE){
                                //There is no active session
                                session_start();
                            }else
                            if($status == PHP_SESSION_DISABLED){
                                //Sessions are not available
                            }else
                            if($status == PHP_SESSION_ACTIVE){
                                //Destroy current and start new one
                                session_destroy();
                                session_start();
                            }
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["user_id"] = $id;
                            $_SESSION["type_id"] = $type_id;
                            $_SESSION["username"] = $username;
                            $_SESSION["first_name"] = $fname;
                            $_SESSION['sum'] = 0;
                            // Redirect user to welcome page
                            header("location: index.php");
                            exit;
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Nombre o Contraseña inválidos.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Nombre o Contraseña inválidos.";
                }
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
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body><center>
    <div class="wrapper">
        <h2>Iniciar sesión</h2>
        <p>Por favor, introduzca sus datos para Iniciar Sesión.</p>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

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
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>¿No tienes una cuenta? <a href="register.php">Registrate</a>.</p>
        </form>
    </div></center>
</body>
</html>