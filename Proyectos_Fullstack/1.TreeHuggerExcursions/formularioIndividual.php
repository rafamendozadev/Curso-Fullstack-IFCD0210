<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&family=Hind+Madurai&family=Libre+Baskerville&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Compra Individual</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <?php
        include "header.php"
        ?>
    </header>
    <main class="contenedor">
        <!-- <h2 class="contenedor">Resumen de compra:</h2> -->

        <?php

        $precioBase = 35;
        $personas = $_POST['personas'];
        $periodo = $_POST['periodo'] * 2;
        $precioTotal = $precioBase * $periodo;

        echo "<div class='tabla-comprar'>
        
        <h3>resumen de compra:</h3>
        <ul>
        <li><p>precio <b>sin</b> descuento <b>por persona: " . $precioTotal . "€.</b></p></li>";

        if ($periodo >= 4) {
            $descuento = 0.20;
        } else if ($periodo >= 3) {
            $descuento = 0.10;
        } else if ($periodo >= 2) {
            $descuento = 0.05;
        } else {
            $descuento = 0;
        }

        if ($descuento > 0) {
            echo "<li><p>el descuento por duración es de: <b>" . $descuento * 100 . "%.</b></p></li>";
        }

        $precioFinal = $precioTotal * (1 - $descuento);
        $precioFinalTotal = $precioFinal * $personas;


        if ($descuento > 0) {
            echo "<li><p>precio <b>con</b> descuento para <b>" . $personas . " personas: " . $precioFinalTotal . "€.</b></p></li>";
        }

        $picnic = false;
        if (isset($_POST['picnic'])) {
            $precioFinalTotal += (20 * $personas);
            echo "<li><p>servicio extra: Picnic natural (" . $personas . "): <b>" . 20 * $personas . "€.</b></p></li>";
        }

        $kitNatural = false;
        if (isset($_POST['kitNatural'])) {
            $precioFinalTotal += (40 * $personas);
            echo "<li><p>servicio extra: Kit natural (" . $personas . "): <b>" . 40 * $personas . "€.</b></p></li>";
        }

        $transporte = false;
        if (isset($_POST['transporte'])) {
            $precioFinalTotal += (20 * $personas);
            echo "<li><p>servicio extra: Transporte (" . $personas . "): <b>" . 20 * $personas . "€.</b></p></li>";
        }

        $foto = false;
        if (isset($_POST['foto'])) {
            $precioFinalTotal += 150;
            echo "<li><p>servicio extra: Sesión de fotos: <b>150€.</b> <br></p></li>";
        }

        if ($periodo < 2) {
            echo "<li class='pintar_lista'><p>precio total para " . $personas . " personas: <b>" . $precioFinalTotal . "€.</b></p>
            </li></ul> </div>";
        } else {
            echo "<li class='pintar_lista'><p><b>Precio total</b> con descuentos y servicios extras para <b>" . $personas . " personas: " . $precioFinalTotal . "€.</b></p></li>";
        }

        echo "</ul>
        </div>";

        ?>

    </main>
    <?php
    include "footer.php";
    ?>

</body>

</html>