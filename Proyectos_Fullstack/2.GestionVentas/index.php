<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión ventas | Inicio</title>
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
    <?php include('cabecera.php'); ?>
    <main>
        <div class="card contenedor">
            <div class="secciones">
                <div class="seccion">
                    <h2 class="cabecera">Clientes</h2>
                    <table>
                        <tr>
                            <th>Nombre completo</th>
                            <th>Ciudad</th>
                            <th>Categoría</th>
                        </tr>
                        <?php
                        include_once("includes/funciones.php");
                        $clientes = mostrarClientes();
                        foreach ($clientes as $cliente) {
                            ?>
                            <tr>
                                <td><?php echo $cliente->getNombre() . " " . $cliente->getApellido1() . " " . $cliente->getApellido2() ?></td>
                                <td><?php echo $cliente->getCiudad() ?></td>
                                <td><?php echo $cliente->getCategoria() ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
                <div class="seccion">
                    <h2 class="cabecera">Clientes con pedidos</h2>
                    <table>
                        <tr>
                            <th>Nombre completo</th>
                            <th>Ciudad</th>
                            <th>Categoría</th>
                        </tr>
                        <?php
                        include_once("includes/funciones.php");
                        $clientes = mostrarClientesConPedidos();
                        foreach ($clientes as $cliente) {
                            ?>
                            <tr>
                                <td><?php echo $cliente->getNombre() . " " . $cliente->getApellido1() . " " . $cliente->getApellido2() ?></td>
                                <td><?php echo $cliente->getCiudad() ?></td>
                                <td><?php echo $cliente->getCategoria() ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="card contenedor">
            <div class="secciones">
                <div class="seccion">
                    <h2 class="cabecera">Comercial</h2>
                    <table>
                        <tr>
                            <th>Nombre completo</th>
                            <th>Comision</th>
                            <th>Numero de Pedidos</th>
                        </tr>
                        <?php
                        include_once("includes/funciones.php");
                        $comerciales = mostrarComercial();
                        foreach ($comerciales as $comercial) {
                        ?>
                            <tr>
                                <td><?php echo $comercial->getNombre() . " " . $comercial->getApellido1() . " " . $comercial->getApellido2() ?></th>
                                <td><?php echo $comercial->getComision() ?></td>
                                <td><?php echo $comercial->getNumeroPedidos() ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="card contenedor">
            <div class="secciones">
                <div class="seccion">
                    <h2 class="cabecera">Estadisticas Comercial</h2>
                    <table>
                        <tr>
                            <th>Nombre completo</th>
                            <th>Comision</th>
                            <th>Numero de Pedidos</th>
                            <th>Precio Medio</th>
                            <th>Beneficios</th>
                        </tr>
                        <?php
                        include_once("includes/funciones.php");
                        $comerciales = mostrarEstadisticasComercial();
                        foreach ($comerciales as $comercial) {
                            ?>
                            <tr>
                                <td><?php echo $comercial->getNombre() . " " . $comercial->getApellido1() . " " . $comercial->getApellido2() ?></th>
                                <td><?php echo $comercial->getComision() ?></td>
                                <td><?php echo $comercial->getNumeroPedidos() ?></td>
                                <td><?php echo $comercial->getPrecioMedio() ?></td>
                                <td><?php echo $comercial->getBeneficios() ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="card contenedor">
            <div class="secciones">
                <div class="seccion">
                    <h2 class="cabecera">Beneficios por ciudad</h2>
                    <table>
                        <tr>
                            <th>Ciudad</th>
                            <th>Beneficios</th>
                        </tr>
                        <?php
                        include_once("includes/funciones.php");
                        $gastos = mostrarGastosPorCiudad();
                        foreach ($gastos as $gasto) {
                        ?>
                            <tr>
                                <td><?php echo $gasto["ciudad"] ?></td>
                                <td><?php echo round($gasto["beneficios"],2) ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>

    </main>
    <footer class="contenedor cabecera">
        <p>David Pérez Piñeiro | IFCD0210 Desarrollo de aplicaciones con tecnologías web</p>
    </footer>
</body>

</html>