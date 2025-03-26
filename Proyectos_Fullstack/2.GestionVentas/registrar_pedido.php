<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión ventas | Registrar pedido</title>
    <link rel="stylesheet" href="css/style-index.css">
    <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
    <!-- Iconos Sharp -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@300;700&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Incluímos la página cabecera.php que incluye el código con la cabecera y los enlaces entre páginas -->
    <?php include('cabecera.php'); ?>
    <main>
        <div class="card contenedor">
            <h2>Nuevo Pedido</h2>
            <form class="secciones" action="includes/registrar_pedido.php" method="post">
                <div>
                    <label for="fecha">Fecha del pedido: </label>
                    <input type="date" name="fecha" id="fecha" value="<?php echo date("Y-m-d") ?>">
                </div>
                <div>
                    <label for="total">Total: </label>
                    <input type="number" name="total" id="total" min="0">
                </div>
                <div>
                    <label for="id_cliente">ID Cliente: </label>
                    <select name="id_cliente" id="id_cliente">
                        <?php
                        include_once("includes/funciones.php");
                        $clientes = mostrarClientes();
                        foreach ($clientes as $cliente) {
                        ?>
                            <option value=<?php echo $cliente->getId() ?>><?php echo $cliente->getNombre() . " " . $cliente->getApellido1() . " " . $cliente->getApellido2() ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="id_comercial">ID Comercial: </label>
                    <select name="id_comercial" id="id_comercial">
                        <?php
                        include_once("includes/funciones.php");
                        $comerciales = mostrarComercial();
                        foreach ($comerciales as $comercial) {
                        ?>
                            <option value=<?php echo $comercial->getId() ?>><?php echo $comercial->getNombre() . " " . $comercial->getApellido1() . " " . $comercial->getApellido2() ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <input class="boton" type="submit" value="Enviar">
                </div>
            </form>
        </div>

    </main>
    <footer class="contenedor cabecera">
        <p>David Pérez Piñeiro | IFCD0210 Desarrollo de aplicaciones con tecnologías web</p>
    </footer>
</body>

</html>