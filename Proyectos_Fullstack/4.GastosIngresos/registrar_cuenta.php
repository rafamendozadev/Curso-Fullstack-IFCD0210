<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel="shortcut icon" href="./img/favicon.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel='stylesheet' href='./css/style.css'>

    <title>Registrar cuenta</title>
</head>

<body class="d-flex flex-column min-vh-100 bg-light">

    <header>
        <?php
        include_once('includes/comprobar_seguridad.php');
        include_once('includes/db_connection.php');
        include_once('includes/menu_nav.php');
        ?>
    </header>

    <main class="special-padding container flex-grow-1 d-flex justify-content-center align-items-center">
        <div class="card p-4 shadow-lg" style="width: 100%; max-width: 600px;">
            <form action="./includes/crear_cuenta.php" method="post" enctype="multipart/form-data">
                <?php
                if (isset($_GET["incorrecto"]) && $_GET["incorrecto"] == 'true') {
                    echo "<div class='alert alert-danger'>&#10060; Esta cuenta ya existe. Por favor, cambie el nombre.</div>";
                }
                ?>
                <h1 class="text-center text-warning">Cuentas</h1>
                <i class="bi bi-bank text-warning fs-1 d-block text-center mb-3"></i>

                <div class="border rounded-2 p-3">
                    <div class="mb-3">
                        <label for="nombre" class="form-label text-warning">Nombre de la cuenta:</label>
                        <input type="text" class="form-control focus-ring focus-ring-warning border-warning" placeholder="Introducir nombre" name="nombre" id="nombre" required>
                    </div>

                    <div class="mb-3">
                        <label for="iban" class="form-label text-warning">IBAN:</label>
                        <input type="text" class="form-control focus-ring focus-ring-warning border-warning" placeholder="Introducir IBAN" name="iban" id="iban">
                    </div>

                    <div class="mb-3">
                        <label for="saldo" c>Saldo Inicial:</label>
                        <input type="number" class="form-control focus-ring focus-ring-warning border-warning" placeholder="€" name="saldo" id="saldo" step="0.01">
                    </div>

                    <input type="hidden" name="id_usuario" value='<?php echo $_SESSION['id'] ?>'>
                    <div class="text-center">
                    <button type="submit" class="btn btn-warning w-50">Crear cuenta</button>
                    </div>
                </div>
            </form>

            <!-- ELIMINAR CUENTA -->
            <div class="contenedor">
                <form id="formEliminarCuenta" action="includes/eliminar_cuenta.php" method="post">
                    <?php
                    include_once('includes/db_connection.php');

                    $id_usuario = $_SESSION['id'];

                    $query = "SELECT id, nombre FROM cuenta WHERE id_usuario = $id_usuario";

                    $result = mysqli_query($db, $query);

                    if (!$result) {
                        echo "Error en la consulta: " . mysqli_error($db);
                        mysqli_close($db);
                        exit;
                    }

                    if (mysqli_num_rows($result) > 0) {
                    ?>
                        <div class="select border rounded-2 p-3 mt-5">
                            <label for="id" class="form-label text-warning">Nombre de la cuenta:</label>
                            <select name="id" id="id" class="form-select border-warning mb-3" required>
                                <?php while ($cuenta = mysqli_fetch_assoc($result)) { ?>
                                    <option value="<?php echo ($cuenta['id']); ?>">
                                        <?php echo ($cuenta['nombre']); ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <div class="text-center">
                        <input class="btn btn-danger w-50" type="button" value="Eliminar cuenta" onclick="confirmaEliminarCuenta()">
                        </div>
                    </div>
                        
                    <?php
                    } else {
                        echo 'No se encontraron cuentas para este usuario.';
                    }

                    mysqli_free_result($result);
                    mysqli_close($db);
                    ?>
                </form>
            </div>
            <!-- ELIMINAR CUENTA -->

        </div>
    </main>

    <footer class="footer mt-auto bg-dark text-light py-4">
        <div class="container text-center">
            <p>Creado por Rafael Mendoza - 2024</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="./js/script.js"></script>

</body>

</html>