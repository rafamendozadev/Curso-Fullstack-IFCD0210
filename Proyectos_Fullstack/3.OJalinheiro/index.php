<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O Jalinheiro | Inicio</title>
    <link rel="stylesheet" href="css/style-index.css">
    <link rel="shortcut icon" href="./img/chicken.png" type="image/x-icon">
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
                    <h2 class="cabecera">Mís Gallinas</h2>
                    <table>
                        <tr>
                            <th class="th_cabecera" colspan="3">Datos de Las gallinas 🐔</th>
                        </tr>
                        <tr>
                            <th>nombre</th>
                            <th>fecha nacimiento</th>
                            <th>raza</th>
                        </tr>
                        <?php
                        include_once("includes/funciones.php");
                        $gallinas = mostrarGallinas();
                        foreach ($gallinas as $gallina) {
                        ?>
                            <tr>
                                <td><?php echo $gallina->getNombre(); ?></td>
                                <td><?php echo $gallina->getFechaNacimiento(); ?></td>
                                <td><?php echo $gallina->getNombreRaza(); ?></td>
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
                    <h2 class="cabecera">Estadisticas fijas</h2>
                    <div style="display: flex;flex-wrap: wrap;justify-content: center;">
                        <div class="seccion">
                            <table>
                                <tr>
                                    <th class="th_cabecera" colspan="3">Gallinas más productivas 🏆 (Top 5)</th>
                                </tr>
                                <tr>
                                    <th>nombre</th>
                                    <th>cantidad producida</th>
                                </tr>
                                <?php
                                include_once("includes/funciones.php");
                                $filas = mostrarTop5();
                                foreach ($filas as $fila) {
                                ?>
                                    <tr>
                                        <td><?php echo $fila["nombre"]; ?></td>
                                        <td><?php echo $fila['total']; ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                        <div class="seccion">
                            <table>
                                <tr>
                                    <th class="th_cabecera" colspan="3">Dias más productivos 🏆 (Top 3)</th>
                                </tr>
                                <tr>
                                    <th>fecha recogida</th>
                                    <th>cantidad de huevos</th>
                                </tr>
                                <?php
                                include_once("includes/funciones.php");
                                $filas = mostrar3DiasProduccion();
                                foreach ($filas as $fila) {
                                ?>
                                    <tr>
                                        <td><?php echo $fila["fecha_recogida"]; ?></td>
                                        <td><?php echo $fila['huevos']; ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                    <div class="seccion">
                        <table>
                            <tr>
                                <th class="th_cabecera" colspan="3">Producción semanal 🥚 (gallina / raza)</th>
                            </tr>
                            <tr>
                                <th>nombre</th>
                                <th>raza</th>
                                <th>cantidad de Huevos</th>
                            </tr>
                            <?php
                            include_once("includes/funciones.php");
                            $filas = mostrarProduccionSemana();
                            foreach ($filas as $fila) {
                            ?>
                                <tr>
                                    <td><?php echo $fila["nombre"]; ?></td>
                                    <td><?php echo $fila["nombre_raza"]; ?></td>
                                    <td><?php echo $fila['total']; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                    <div class="seccion">
                        <table>
                            <tr>
                                <th class="th_cabecera" colspan="3">Producción 🥚 (última semana)</th>
                            </tr>
                            <tr>
                                <th>fecha recogida</th>
                                <th>huevos / dia </th>
                            </tr>
                            <?php
                            include_once("includes/funciones.php");
                            $filas = mostrarMediaSemanal();
                            foreach ($filas as $fila) {
                            ?>
                                <tr>
                                    <td><?php echo $fila["fecha_recogida"]; ?></td>
                                    <td><?php echo $fila['cantidad']; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                    <div class="seccion">
                        <table>
                            <tr>
                                <th class="th_cabecera" colspan="3">Producción media 🥚 (último mes)</th>
                            </tr>
                            <tr>
                                <th>raza</th>
                                <th>huevos / dia</th>
                            </tr>
                            <?php
                            include_once("includes/funciones.php");
                            $filas = mostrarMediaRazaMes();
                            foreach ($filas as $fila) {
                            ?>
                                <tr>
                                    <td><?php echo $fila["nombre_raza"]; ?></td>
                                    <td><?php echo $fila['total']; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                    <div class="seccion">
                        <table>
                            <tr>
                                <th class="th_cabecera" colspan="3">Sin producir 🥚</th>
                            </tr>
                            <tr>
                                <th>nombre</th>
                                <th>cantidad de dias</th>
                            </tr>
                            <?php
                            include_once("includes/funciones.php");
                            $filas = mostrarDiasSinProducir();
                            foreach ($filas as $fila) {
                            ?>
                                <tr>
                                    <td><?php echo $fila["nombre"]; ?></td>
                                    <td><?php echo $fila['dias_sin_producir']; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                    <div class="seccion">
                        <table>
                            <tr>
                                <th class="th_cabecera" colspan="3">Gallinas Mos encima de la media general</th>
                            </tr>
                            <tr>
                                <th>nombre</th>
                                <th>media huevos / diaria</th>
                            </tr>
                            <?php
                            include_once("includes/funciones.php");
                            $filas = mostrarMosEncimaMedia();
                            foreach ($filas as $fila) {
                            ?>
                                <tr>
                                    <td><?php echo $fila["nombre"]; ?></td>
                                    <td><?php echo $fila['AVG(produccion.cantidad)']; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card contenedor">
            <div class="secciones">
                <div class="seccion">
                    <h2 class="cabecera">Estadísticas de Producción</h2>
                    <div style="display: flex;flex-wrap: wrap;justify-content: center;">
                        <table>
                            <tr>
                                <th class="th_cabecera" colspan="3">🐔 Producción de Huevos 🥚</th>
                            </tr>
                            <tr>
                                <th>periodo</th>
                                <th>cantidad</th>
                            </tr>
                            <?php
                            include_once("includes/funciones.php");
                            $filas = mostrarEstadisticasHuevos();
                            foreach ($filas as $fila) {
                            ?>
                                <tr>
                                    <td><?php echo $fila["estadisticas"]; ?></td>
                                    <td><?php echo $fila['cantidad']; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                        <table>
                            <tr>
                                <th class="th_cabecera" colspan="3">🐔 Producción / razas 🥚</th>
                            </tr>
                            <tr>
                                <th>raza</th>
                                <th>cantidad</th>
                            </tr>
                            <?php
                            include_once("includes/funciones.php");
                            $filas = mostrarProduccionRaza();
                            foreach ($filas as $fila) {
                            ?>
                                <tr>
                                    <td><?php echo $fila["nombre_raza"]; ?></td>
                                    <td><?php echo $fila['SUM(produccion.cantidad)']; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                    <div style="display: flex;flex-wrap: wrap;justify-content: center;">
                        <table>
                            <tr>
                                <th class="th_cabecera" colspan="3">Producción más alta 🔝</th>
                            </tr>
                            <tr>
                                <th>mes</th>
                                <th>huevos</th>
                            </tr>
                            <?php
                            include_once("includes/funciones.php");
                            $filas = mostrarMesAlta();
                            foreach ($filas as $fila) {
                            ?>
                                <tr>
                                    <td><?php echo $fila["mes"]; ?></td>
                                    <td><?php echo $fila['total_produccion']; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                        <table>
                            <tr>
                                <th class="th_cabecera" colspan="3">Producción más baja ⬇️</th>
                            </tr>
                            <tr>
                                <th>mes</th>
                                <th>huevos</th>
                            </tr>
                            <?php
                            include_once("includes/funciones.php");
                            $filas = mostrarMesBaja();
                            foreach ($filas as $fila) {
                            ?>
                                <tr>
                                    <td><?php echo $fila["mes"]; ?></td>
                                    <td><?php echo $fila['total_produccion']; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                    <table>
                        <tr>
                            <th class="th_cabecera" colspan="3">🐔 Promedio de huevos / gallina 🥚</th>
                        </tr>
                        <tr>
                            <th>gallina</th>
                            <th>media</th>
                        </tr>
                        <?php
                        include_once("includes/funciones.php");
                        $filas = mostrarPromedio();
                        foreach ($filas as $fila) {
                        ?>
                            <tr>
                                <td><?php echo $fila["nombre"]; ?></td>
                                <td><?php echo $fila['media']; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                    <table>
                        <tr>
                            <th class="th_cabecera" colspan="3">🐔 Dia más productivo 🥚 (semana)</th>
                        </tr>
                        <tr>
                            <th>dia</th>
                            <th>cantidad huevos</th>
                        </tr>
                        <?php
                        include_once("includes/funciones.php");
                        $filas = mostrarDaySemana();
                        foreach ($filas as $fila) {
                        ?>
                            <tr>
                                <td><?php echo $fila["dia"]; ?></td>
                                <td><?php echo $fila['cantidad']; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="card_baja contenedor">
            <div class="secciones">
                <div class="seccion">
                    <h2 class="cabecera">Bajas gallinas ✝</h2>
                    <table class="table_baja">
                        <tr>
                            <th>nombre</th>
                            <th>fecha de obito</th>
                            <th>causa</th>
                        </tr>
                        <?php
                        include_once("includes/funciones.php");
                        $gallinas = mostrarBajas();
                        foreach ($gallinas as $gallina) {
                        ?>
                            <tr>
                                <td><?php echo $gallina->getIdGallina(); ?></td>
                                <td><?php echo $gallina->getFecha(); ?></td>
                                <td><?php echo $gallina->getCausa(); ?></td>
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
        <p>Creado por Rafael Mendoza - 2024</p>
    </footer>
</body>

</html>