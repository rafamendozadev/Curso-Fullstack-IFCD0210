<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O Jalinheiro | Registrar gallina</title>
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
    <!-- Incluímos la página cabecera.php que incluye el código con la cabecera y los enlaces entre páginas -->
    <?php include('cabecera.php'); ?>
    <main>
        <div class="card contenedor">
            <h2>Añadir una nueva gallina:</h2>
            <form class="secciones" action="includes/recoger_gallina.php" method="post">
                <div>
                    <label for="nombre">Nombre: </label>
                    <input type="text" name="nombre" id="nombre" required>
                </div>
                <div>
                    <label for="fecha_nacimiento">Fecha nacimiento:</label>
                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" required>
                </div>
                <div>
                    <label for="nombre">Raza: </label>
                    <select name="nombre_raza" id="nombre">
                        <?php
                        include_once("includes/funciones.php");
                        $razas = mostrarRazas();
                        foreach ($razas as $raza) {
                        ?>
                            <option value="<?php echo $raza->getNombre() ?>"><?php echo $raza->getNombre() ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <input class="boton" type="submit" value="Enviar">
                </div>
            </form>
            <br>
            <form class="secciones" action="includes/borrar_gallina.php" method="post">
                <div>
                    <label for="id_borrar">borrar gallina:</label>
                    <select name="id" id="id_borrar">
                        <?php
                        include_once("includes/funciones.php");
                        $gallinas = mostrarGallinasBorrar();
                        foreach ($gallinas as $gallina) {
                        ?>
                            <option value="<?php echo $gallina->getId(); ?>"><?php echo $gallina->getNombre(); ?></option>
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