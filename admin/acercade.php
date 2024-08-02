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
    <link rel="stylesheet" href="/GitHub/Monarca/css/styles.css">
    <script src="/GitHub/Monarca/javascript/adminjs.js"></script>
</head>
<body style="background-color: RGBA(247, 147, 30,1);">
<?php  require('navbar1.php'); ?>
<div class="row" >
    <div class="side" style="background: none">
        <div class="fakeimg" style="position: fixed; margin-left: 10px; width: max(9%)"></div></div>
    <div class="main" style="background-color: RGBA(247, 147, 30,1);">
        <div class="navbar" style="position: relative; margin-right: 10px; height: auto"></div>
    </div>
    <div class="side" style="background: none">
        <div class="fakeimg" style="position: fixed; margin-right: 10px; width: max(9%)"></div>
    </div>
</div>
<div class="row">
    <div class="side" style="background: none"></div>
    <div class="main">
        <div class="product navbar" style="font-size: 5vh">ACERCA DE</div><br>
        <div style="font-size: 2vh">
        <ul>
            <li>Misión:
                <br>"Ofrecer una experiencia única de compra en línea al proporcionar productos electrónicos personalizados de alta calidad que satisfagan las necesidades y preferencias individuales de nuestros clientes. Nos comprometemos a la innovación continua y a la excelencia en el servicio al cliente, garantizando satisfacción y valor en cada interacción."
            </li>
        </ul>
        <ul>
            <li>
                Visión:
                <br>"Convertirnos en el líder global en el mercado de productos electrónicos personalizados, siendo reconocidos por nuestra capacidad para anticipar las tendencias tecnológicas y ofrecer soluciones innovadoras que mejoren la vida diaria de nuestros clientes."
            </li>
        </ul>
        <ul>
            <li>
                Valores:

                <br>Innovación: Buscamos constantemente nuevas formas de personalizar y mejorar nuestros productos para ofrecer soluciones únicas y avanzadas.
                <br>Calidad: Nos comprometemos a mantener los más altos estándares en la fabricación y selección de productos para asegurar la durabilidad y el rendimiento.
                <br>Servicio al Cliente: Valoramos a nuestros clientes y nos esforzamos por brindar un soporte excepcional y una experiencia de compra sin problemas.
                <br>Integridad: Operamos con transparencia y honestidad, garantizando que nuestras prácticas comerciales sean éticas y responsables.
                <br>Sostenibilidad: Nos dedicamos a adoptar prácticas respetuosas con el medio ambiente en todos los aspectos de nuestra operación, desde el diseño hasta la entrega.</li>
        </li>
        </ul>
        </div>
    </div>
    <div class="side" style="background: none"></div>

</div>

<div class="footer" style="height: 100px">
    <h2>Footer</h2>
</div>
</body>
</html>
