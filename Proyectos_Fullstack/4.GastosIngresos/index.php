<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel="shortcut icon" href="./img/favicon.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel='stylesheet' href='./css/style.css'>

    <title>Mí cuenta</title>
</head>

<body>

    <header>
        <?php
        include_once('includes/comprobar_seguridad.php');
        include_once('includes/db_connection.php');
        include_once('includes/menu_nav.php');
        ?>
    </header>

    <main class="special-padding">

        <div class="d-flex p-2 container-fluid">
            <div id="chart-gastos-container" style="width:100%; height:400px;">

                <script>
                    <?php
                    include_once("includes/funciones.php");
                    $filas = obtenerGastosIngresos('gasto');
                    ?>

                    document.addEventListener('DOMContentLoaded', function() {
                        Highcharts.chart('chart-gastos-container', {
                            chart: {
                                type: 'pie'
                            },
                            title: {
                                text: 'Gastos'
                            },
                            tooltip: {
                                valueSuffix: '%'
                            },
                            subtitle: {
                                text: 'Source:<a href="https://www.mdpi.com/2072-6643/11/3/684/htm" target="_default">MDPI</a>'
                            },
                            plotOptions: {
                                series: {
                                    allowPointSelect: true,
                                    cursor: 'pointer',
                                    dataLabels: [{
                                        enabled: true,
                                        distance: 20
                                    }, {
                                        enabled: true,
                                        distance: -40,
                                        format: '{point.percentage:.1f}%',
                                        style: {
                                            fontSize: '1.2em',
                                            textOutline: 'none',
                                            opacity: 0.7
                                        },
                                        filter: {
                                            operator: '>',
                                            property: 'percentage',
                                            value: 10
                                        }
                                    }]
                                }
                            },
                            series: [{
                                name: 'Porcentage',
                                colorByPoint: true,
                                data: [
                                    <?php foreach ($filas as $fila) { ?> {
                                            name: '<?php echo $fila['nombre_categoria']; ?>',
                                            y: <?php echo $fila['porcentage']; ?>,
                                            //color: 'black'
                                        },
                                    <?php } ?>
                                ]
                            }]
                        });

                    });
                </script>

            </div>

            <div id="chart-ingreso-container" style="width:100%; height:400px;">

                <script>
                    <?php
                    include_once("includes/funciones.php");
                    $filas = obtenerGastosIngresos('ingreso');
                    ?>

                    document.addEventListener('DOMContentLoaded', function() {
                        Highcharts.chart('chart-ingreso-container', {
                            chart: {
                                type: 'pie'
                            },
                            title: {
                                text: 'Ingresos'
                            },
                            tooltip: {
                                valueSuffix: '%'
                            },
                            subtitle: {
                                text: 'Source:<a href="https://www.mdpi.com/2072-6643/11/3/684/htm" target="_default">MDPI</a>'
                            },
                            plotOptions: {
                                series: {
                                    allowPointSelect: true,
                                    cursor: 'pointer',
                                    dataLabels: [{
                                        enabled: true,
                                        distance: 20
                                    }, {
                                        enabled: true,
                                        distance: -40,
                                        format: '{point.percentage:.1f}%',
                                        style: {
                                            fontSize: '1.2em',
                                            textOutline: 'none',
                                            opacity: 0.7
                                        },
                                        filter: {
                                            operator: '>',
                                            property: 'percentage',
                                            value: 10
                                        }
                                    }]
                                }
                            },
                            series: [{
                                name: 'Porcentage',
                                colorByPoint: true,
                                data: [
                                    <?php foreach ($filas as $fila) { ?> {
                                            name: '<?php echo $fila['nombre_categoria']; ?>',
                                            y: <?php echo $fila['porcentage']; ?>,
                                            //color: 'black'
                                        },
                                    <?php } ?>
                                ]
                            }]
                        });

                    });
                </script>

            </div>
        </div>

         <!-- Saldos -->
         <div class="container mb-5">
            <div class="text-center">
                <?php 
                include_once("includes/funciones.php");
                // Obtener saldos de todas las cuentas
                $saldos = mostrarSaldo();
                
                if (!empty($saldos)) {
                    // Mostrar saldo total
                    $saldoTotal = 0;
                    foreach ($saldos as $saldo) {
                        $saldoTotal += $saldo['saldo'];
                    }
                    echo '<h2 class="mb-4">Saldo Total: <span class="text-'.($saldoTotal >= 0 ? 'success' : 'danger').'">'.number_format($saldoTotal, 2).' €</span></h2>';
                    
                    // Mostrar saldo por cada cuenta
                    echo '<div class="row justify-content-center">';
                    foreach ($saldos as $saldo) {
                        echo '<div class="col-md-4 col-lg-3 mb-3">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <h5 class="card-title">'.htmlspecialchars($saldo['nombre_cuenta']).'</h5>
                                    <p class="card-text h4 text-'.($saldo['saldo'] >= 0 ? 'success' : 'danger').'">'.number_format($saldo['saldo'], 2).' €</p>
                                </div>
                            </div>
                        </div>';
                    }
                    echo '</div>';
                } else {
                    echo '<p class="alert alert-info">No tienes cuentas registradas</p>';
                }
                ?>
            </div>
        </div>

        <div class="m-5">
            <table class="table table-striped border-warning">
                <tr class="table-warning">
                    <th style="text-align: center;" colspan="100%">
                        <h3>Todos movimientos</h3>
                    </th>
                </tr>
                <tr>
                    <th>categoria</th>
                    <th>cantidad</th>
                    <th class="text-end">fecha</th>
                    <th class="text-end">cuenta</th>
                    <th class="text-end">tipo</th>
                    <th class="text-end">concepto</th>
                    <th class="text-end">editar</th>
                    <th class="text-end">eliminar</th>
                </tr>

                <?php
                $filas = obtenerMovimiento();
                foreach ($filas as $fila) {
                ?>
                    <tr>
                        <td><i class="<?php echo $fila['icono']; ?>" style="font-size: 3rem; color: #fca323;"></i><i style="color: gray;"><br><?php echo " " . $fila['nombre_categoria']; ?></i></td>
                        <td><?php echo $fila['cantidad'] . " € "; ?></td>
                        <td style="text-align: right;"><?php echo $fila['fecha_hora']; ?></td>
                        <td style="text-align: right;"><?php echo $fila['nombre_cuenta']; ?></td>
                        <td style="text-align: right;"><?php echo $fila["tipo"]; ?></td>
                        <td style="text-align: right;"><?php echo $fila['concepto']; ?></td>
                        <td style="text-align: right;"><a href="./modificar_movimiento.php?id=<?php echo ($fila['id']); ?>"><i class="bi bi-pencil-square text-center" style="font-size: 2rem; color: #fca323"></i></a></td>
                        <td style="text-align: right;"><a href="./includes/eliminar_movimiento.php?id=<?php echo ($fila['id']); ?>"><i class="bi bi-trash3 text-center" style="font-size: 2rem; color: #fca323"></i></a></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>

        <div class="m-5">
            <table class="table table-striped">
                <tr class="table-warning">
                    <th style="text-align: center;" colspan="100%">
                        <h3>Movimientos ultimo mes</h3>
                    </th>
                </tr>
                <tr>
                    <th>categoria</th>
                    <th>cantidad</th>
                    <th class="text-end">fecha</th>
                    <th class="text-end">cuenta</th>
                    <th class="text-end">tipo</th>
                    <th class="text-end">concepto</th>
                </tr>

                <?php
                $filas = obtenerMovimientoMensual();
                foreach ($filas as $fila) {
                ?>
                    <tr>
                        <td><i class="<?php echo $fila['icono']; ?>" style="font-size: 3rem; color: #fca323;"></i><i style="color: gray;"><br><?php echo " " . $fila['nombre_categoria']; ?></i></td>
                        <td><?php echo $fila['cantidad'] . " € "; ?></td>
                        <td style="text-align: right;"><?php echo $fila['fecha_hora']; ?></td>
                        <td style="text-align: right;"><?php echo $fila['nombre_cuenta']; ?></td>
                        <td style="text-align: right;"><?php echo $fila["tipo"]; ?></td>
                        <td style="text-align: right;"><?php echo $fila['concepto']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>

        <div class="m-5">
            <table class="table table-striped">
                <tr class="table-warning">
                    <th style="text-align: center;" colspan="100%">
                        <h3>Todos los gastos</h3>
                    </th>
                </tr>
                <tr>
                    <th>categoria</th>
                    <th>cantidad</th>
                    <th class="text-end">fecha</th>
                    <th class="text-end">cuenta</th>
                    <th class="text-end">concepto</th>
                </tr>
                <?php
                $filas = obtenerMovimientos('gasto');
                foreach ($filas as $fila) {
                ?>
                    <tr>
                        <td><i class="<?php echo $fila['icono']; ?>" style="font-size: 3rem; color: #fca323;"></i><i style="color: gray;"><br><?php echo " " . $fila['nombre_categoria']; ?></i></td>
                        <td><?php echo $fila['cantidad'] . " € "; ?></td>
                        <td style="text-align: right;"><?php echo $fila['fecha_hora']; ?></td>
                        <td style="text-align: right;"><?php echo $fila['nombre_cuenta']; ?></td>
                        <td style="text-align: right;"><?php echo $fila['concepto']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>

        <div class="m-5">
            <table class="table table-striped">
                <tr class="table-warning">
                    <th style="text-align: center;" colspan="100%">
                        <h3>Todos los ingresos</h3>
                    </th>
                </tr>
                <tr>
                    <th>categoria</th>
                    <th>cantidad</th>
                    <th class="text-end">fecha</th>
                    <th class="text-end">cuenta</th>
                    <th class="text-end">concepto</th>
                </tr>
                <?php
                $filas = obtenerMovimientos('ingreso');
                foreach ($filas as $fila) {
                ?>
                    <tr>
                        <td><i class="<?php echo $fila['icono']; ?>" style="font-size: 3rem; color: #fca323;"></i><i style="color: gray;"><br><?php echo " " . $fila['nombre_categoria']; ?></i></td>
                        <td><?php echo $fila['cantidad'] . " € "; ?></td>
                        <td style="text-align: right;"><?php echo $fila['fecha_hora']; ?></td>
                        <td style="text-align: right;"><?php echo $fila['nombre_cuenta']; ?></td>
                        <td style="text-align: right;"><?php echo $fila['concepto']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>

    </main>

    <footer class="footer mt-auto bg-dark text-light py-4">
        <div class="container text-center">
            <p>Creado por Rafael Mendoza - 2024</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="./js/script.js"></script>

</body>

</html>