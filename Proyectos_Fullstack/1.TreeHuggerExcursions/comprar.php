<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&family=Hind+Madurai&family=Libre+Baskerville&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Elige tu sesión</title>
</head>

<body>
    <header>
        <?php
        include "header.php"
        ?>

    </header>
    <main>
        <section class="align_tablas">
            <h1>elige tu sesión</h1>
            <h3>sesion individual:</h3>
            <div class="tabla-comprar">
                <table cellpadding="4" cellspacing="8">
                    <tr>
                        <th colspan="2" bgcolor="#F7DCB9">Tarifa base: 35€ ⇾ cada 30 min.</th>
                    </tr>
                    <th colspan="2">Descuentos por duración
                    </th>
                    <tr>
                    <tr>
                        <td>1h</td>
                        <td align="right" bgcolor="#d8d8d8">dto: 5%</td>
                    </tr>
                    <tr>
                        <td>1h30</td>
                        <td align="right" bgcolor="#d8d8d8">dto: 10%</td>
                    </tr>
                    <tr>
                        <td>2h o más</td>
                        <td align="right" bgcolor="#d8d8d8">dto: 20%</td>
                    </tr>
                </table>

                <a href="./calcularIndividual.php">
                    <button class="style_button">Comprar Sesión Individual</button></a>

            </div>
            <h3>sesion grupal (mínimo 3 personas):</h3>
            <div class="tabla-comprar">
                <table cellpadding="8" cellspacing="8">
                    <tr>
                        <th colspan="2" bgcolor="#F7DCB9">Tarifa base: 30€ ⇾ cada 30 min.</th>
                    </tr>
                    <th colspan="2">Descuentos por tamaño del grupo
                    </th>
                    <tr>
                    <tr>
                        <td>6-10 personas</td>
                        <td align="right" bgcolor="#d8d8d8">dto: 5€ (persona / hora)</td>
                    </tr>
                    <tr>
                        <td>10 o más personas</td>  
                        <td align="right" bgcolor="#d8d8d8">dto: 10€ (persona / hora)</td>
                    </tr>
                    <th colspan="2">Descuentos por duración
                    </th>
                    <tr>
                    <tr>
                        <td>2h o más</td>
                        <td align="right" bgcolor="#d8d8d8">dto: 10%</td>
                    </tr>
                    <tr>
                        <td>4h o más</td>
                        <td align="right" bgcolor="#d8d8d8">dto: 20%</td>
                    </tr>
                </table>

                <a href="./calcularGrupo.php">
                    <button class="style_button">Comprar Sesión Grupal</button></a>
            </div>
        </section>

    </main>

    <?php
    include "footer.php";
    ?>

</body>

</html>