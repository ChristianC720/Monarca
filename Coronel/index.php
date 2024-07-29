<?php
/* Initialize the session */ session_start();
?>

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
<?php  require('navbar.php'); ?>
<div class="row">
    <div class="side"></div>
    <div class="main">
    </div>
    <div class="side"></div>
</div>
    <div class="row">
    <div class="side">
        <div class="fakeimg" style="height:60px;">PUBLICIDAD</div>
    </div>
    <div class="main">
        <?php
        require_once "requestCatalogo.php";
        $rownumbers = 1;
        echo "<div class='product-container'>";
        while($consulta  = mysqli_fetch_array($result) and ($rownumbers <= 12)) {
            echo "<a href='#' class='product'> 
    <ul>
        <div class='card' style='width: 18rem;'>
        <img src='imagefake' class='fakeimage' alt='imagen de $consulta[name]' height='200px'>
        <div class='card-body'>
        <h5 class='card-title'>$consulta[name]</h5>
        $$consulta[price] </div></div></ul></a>";
            $rownumbers++;
        }
        echo "</div>";

        ?>
    </div>
    <div class="side">

        <div class="fakeimg" style="height:60px;">PUBLICIDAD</div>
    </div>

</div>

<div class="footer">
    <h2>Footer</h2>
</div>



<script>
    function myFunction() {
        var x = document.getElementById("navbar1");
        if (x.className === "navbar") {
            x.className += " responsive";
        } else {
            x.className = "navbar";
        }
    }
</script>
</body>
</html>
