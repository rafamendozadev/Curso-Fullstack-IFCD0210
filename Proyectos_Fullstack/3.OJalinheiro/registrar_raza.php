<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O Jalinheiro | Registrar raza</title>
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
            <h2>Añadir una nueva raza:</h2>
            <form class="secciones" action="includes/recoger_raza.php" method="post">
                <div>
                    <label for="nombre">Nombre: </label>
                    <input type="text" name="nombre" id="nombre" required>
                </div>
                <div>
                    <label for="descripcion">Descripcion:</label>
                    <textarea rows="6" name="descripcion" id="descripcion"></textarea>
                </div>
                <div>
                    <input class="boton" type="submit" value="Enviar">
                </div>
            </form>
            <br>
            <form class="secciones" action="includes/borrar_raza.php" method="post">
                <div>
                    <label for="nombre_eliminar">borrar raza:</label>
                    <select name="nombre" id="nombre_eliminar">
                        <?php
                        include_once("includes/funciones.php");
                        $razas = mostrarRazasBorrar();
                        foreach ($razas as $raza) {
                        ?>
                            <option value="<?php echo $raza->getNombre(); ?>"><?php echo $raza->getNombre(); ?></option>
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