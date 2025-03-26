<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O Jalinheiro | Registrar producción</title>
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
            <table class="tabla_produccion" border="1">
                <h2>Producción del dia:</h2>
                <tr>
                    <td>
                        <form class="secciones" action="includes/recoger_produccion.php" method="post">
                            <table>
                                <tr>
                                    <td><label for="fecha_recogida">Fecha:</label></td>
                                    <td><input type="date" name="fecha_recogida" id="fecha_recogida" value="<?php echo date("Y-m-d") ?>" max="<?php echo date("Y-m-d"); ?>"></td>
                                </tr>

                                <?php
                                include_once("includes/funciones.php");
                                $gallinas = mostrarGallinasVivas();
                                foreach ($gallinas as $gallina) {
                                ?>
                                    <tr>
                                        <td><label for="<?php echo $gallina->getId() ?>"><?php echo $gallina->getNombre(); ?>:</label></td>
                                        <td>
                                            <div class="tab_prod">
                                                <input type="radio" id="zero_<?php echo $gallina->getId() ?>" name="<?php echo $gallina->getId() ?>" value="0">
                                                <label for="zero_<?php echo $gallina->getId() ?>">0</label>
                                                <input type="radio" id="uno_<?php echo $gallina->getId() ?>" name="<?php echo $gallina->getId() ?>" value="1" required checked>
                                                <label for="uno_<?php echo $gallina->getId() ?>">1</label>
                                                <input type="radio" id="dos_<?php echo $gallina->getId() ?>" name="<?php echo $gallina->getId() ?>" value="2">
                                                <label for="dos_<?php echo $gallina->getId() ?>">2</label>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                            <input class="boton" type="submit" value="Enviar">
                        </form>
                    </td>
                </tr>
            </table>
            <br>
            <form class="secciones" action="includes/borrar_produccion.php" method="post">
                <div>
                    <label for="fecha_eliminar">borrar produccion:</label>
                    <input type="date" name="fecha_eliminar" id="fecha_eliminar" value="<?php echo date("Y-m-d") ?>" max="<?php echo date("Y-m-d"); ?>">
                    <button class="boton" type="submit"><span class="material-icons-sharp">
                            delete
                        </span></button>
                </div>
            </form>
        </div>

    </main>
    <footer class="contenedor cabecera">
        <p>Creado por Rafael Mendoza - 2024</p>
    </footer>
</body>

</html>