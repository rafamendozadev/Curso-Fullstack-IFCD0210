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
    <title>Compra Grupal</title>
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

        $precioBase = 30;
        $personas = $_POST['personas'];
        $periodo = $_POST['periodo'];
        $precioGrupo = $precioBase * $personas * $periodo;

        echo "<div class='tabla-comprar'>

        <h3>resumen de compra grupal:</h3>
        <ul>
        <li><p>precio <b>sin</b> descuento para <b>" . $personas . " personas: " . $precioGrupo . "€.</b></p></li>";

        if ($personas > 10) {
            $descuentoGrupo = 10;
        } elseif ($personas > 5) {
            $descuentoGrupo = 5;
        } else {
            $descuentoGrupo = 0;
        }

        if ($descuentoGrupo > 0) {
            $descuentoTotalGrupo = $personas * $descuentoGrupo * $periodo;
            $precioGrupo -= $descuentoTotalGrupo;
            echo "<li><p>El descuento por grupo es de: <b>" . $descuentoTotalGrupo . "€</b></p></li>";
        }

        if ($periodo >= 4) {
            $descuentoDuracion = 0.20;
            echo "<li><p>El descuento por duración es de: <b>" . ($descuentoDuracion * 100) . "%.</b></p></li>";
        } elseif ($periodo >= 2) {
            $descuentoDuracion = 0.10;
            echo "<li><p>El descuento por duración es de: <b>" . ($descuentoDuracion * 100) . "%.</b></p></li>";
        } else {
            $descuentoDuracion = 0;
        }

        if ($descuentoDuracion > 0) {
            $descuentoTotalDuracion = $precioGrupo * $descuentoDuracion;
            $precioGrupo -= $descuentoTotalDuracion;
        }

        $precioFinalTotal = $precioGrupo;

        $picnic = false;
        if (isset($_POST['picnic'])) {
            $precioExtra = 20 * $personas;
            $precioFinalTotal += $precioExtra;
            echo "<li><p>Servicio extra: Picnic natural (" . $personas . "): <b>" . $precioExtra . "€.</b></p></li>";
        }

        $kitNatural = false;
        if (isset($_POST['kitNatural'])) {
            $precioExtra = 40 * $personas;
            $precioFinalTotal += $precioExtra;
            echo "<li><p>Servicio extra: Kit natural (" . $personas . "): <b>" . $precioExtra . "€.</b></p></li>";
        }

        $transporte = false;
        if (isset($_POST['transporte'])) {
            $precioExtra = 20 * $personas;
            $precioFinalTotal += $precioExtra;
            echo "<li><p>Servicio extra: Transporte (" . $personas . "): <b>" . $precioExtra . "€.</b></p></li>";
        }

        $foto = false;
        if (isset($_POST['foto'])) {
            $precioExtra = 150;
            $precioFinalTotal += $precioExtra;
            echo "<li><p>Servicio extra: Sesión de fotos: <b>" . $precioExtra . "€.</b></p></li>";
        }

        if ($periodo < 2) {
            echo "<li class='pintar_lista><p>precio total para " . $personas . " personas: <b>" . $precioFinalTotal . "€.</b></p>
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