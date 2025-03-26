<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O Jalinheiro | Registrar baja</title>
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
            <h2>Registro de Bajas:</h2>
            <form class="secciones" action="includes/recoger_baja.php" method="post">
                <div>
                    <label for="fecha">Fecha de baja: </label>
                    <input type="date" name="fecha" id="fecha" value="<?php echo date("Y-m-d") ?>" max="<?php echo date("Y-m-d"); ?>">
                </div>
                <div>
                    <div>
                        <label for="nombre">Nombre gallina: </label>
                        <select name="nombre" id="nombre">
                            <?php
                            include_once("includes/funciones.php");
                            $gallinas = mostrarGallinasVivas();
                            foreach ($gallinas as $gallina) {
                            ?>
                                <option value="<?php echo $gallina->getId() ?>"><?php echo $gallina->getNombre() ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label for="causa">causa:</label>
                        <input type="radio" name="causa" id="sacrificada" value="sacrificada" required>
                        <label for="sacrificada">sacrificada</label>
                        <input type="radio" name="causa" id="muerte_natural" value="muerte_natural" required>
                        <label for="muerte_natural">muerte natural</label>
                    </div>
                </div>
                <div>
                    <input class="boton" type="submit" value="Enviar">
                </div>
            </form>
            <br>
            <form class="secciones" action="includes/borrar_baja.php" method="post">
                <div>
                    <label for="id_borrar">borrar baja:</label>
                    <select name="id_gallina" id="id_borrar">
                        <?php
                        include_once("includes/funciones.php");
                        $gallinas = mostrarBajasBorrar();
                        foreach ($gallinas as $gallina) {
                        ?>
                            <option value="<?php echo $gallina->getId() ?>"><?php echo $gallina->getNombre() ?></option>
                        <?php
                        }
                        ?>
                    </select>
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