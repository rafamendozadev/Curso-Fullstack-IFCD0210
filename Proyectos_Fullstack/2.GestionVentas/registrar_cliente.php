<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión ventas | Registrar cliente</title>
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
            <h2>Indique los datos del cliente que quieres dar de alta</h2>
            <form class="secciones" action="includes/registrar_cliente.php" method="post">
                <div>
                    <label for="nombre">Nombre: </label>
                    <input type="text" name="nombre" id="nombre">
                </div>
                <div>
                    <label for="apellido1">Primer apellido: </label>
                    <input type="text" name="apellido1" id="apellido1">
                </div>
                <div>
                    <label for="apellido2">Segundo apellido: </label>
                    <input type="text" name="apellido2" id="apellido2">
                </div>
                <div>
                    <label for="ciudad">Ciudad: </label>
                    <input type="text" name="ciudad" id="ciudad">
                </div>
                <div>
                    <label for="nombre">Categoria: </label>
                    <select name="categoria" id="categoria">
                        <option value="100">100</option>
                        <option value="125">125</option>
                        <option value="200">225</option>
                        <option value="225">225</option>
                        <option value="300">300</option>
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