<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel="shortcut icon" href="./img/favicon.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel='stylesheet' href='./css/style.css'>
    <title>Modificar movimiento</title>
</head>

<body class="d-flex flex-column min-vh-100 bg-light">

    <header>
        <?php
        include_once('includes/comprobar_seguridad.php');
        include_once('includes/menu_nav.php');
        include_once("./includes/movimiento.php");

        if (isset($_POST['tipo'])) {
            $tipo = $_POST['tipo'];
            $cantidad = $_POST['cantidad'];
            $fechaHora = $_POST['fecha_hora'];
            $concepto = $_POST['concepto'];
            $cuenta = $_POST['id_cuenta'];
            $categoria = $_POST['id_categoria'];

            $movimiento = new Movimiento();
            $movimiento->rellenarMovimiento($tipo, $cantidad, $fechaHora, $concepto, $cuenta, $categoria);
            $movimiento->modificarMovimiento($_GET['id']);
        }

        include_once("includes/funciones.php");
        $id = $_GET['id'];
        $fila = obtenerMovimientoPorId($id);
        ?>
    </header>

    <main class="special-padding container flex-grow-1 d-flex justify-content-center align-items-center">
        <div class="card p-4 shadow-lg" style="width: 100%; max-width: 600px;">
            <form action="?id=<?php echo $_GET['id'] ?>" method="post" enctype="multipart/form-data">
                <h1 class="text-center text-warning">Modificar movimiento</h1>
                <i class="bi bi-pencil-square text-warning fs-1 d-block text-center mb-3"></i>

                <div class="mb-3">
                    <label for="cuenta" class="form-label text-warning">Cuenta:</label>
                    <select name="id_cuenta" id="cuenta" class="form-select border-warning" required>
                        <?php
                        $cuentas = mostrarCuentasUsuario();
                        foreach ($cuentas as $cuenta) {
                            $selected = $cuenta["id"] == $fila['id_cuenta'] ? 'selected' : '';
                            echo "<option value='{$cuenta["id"]}' {$selected}>{$cuenta["nombre"]}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="categoria" class="form-label text-warning">Categoría:</label>
                    <select name="id_categoria" id="categoria" class="form-select border-warning" required>
                        <?php
                        $categorias = mostrarCategoria($fila['tipo']);
                        foreach ($categorias as $categoria) {
                            $selected = $categoria["id"] == $fila["id_categoria"] ? 'selected' : '';
                            echo "<option value='{$categoria["id"]}' {$selected}>{$categoria["nombre"]}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="cantidad" class="form-label text-warning">Cantidad:</label>
                    <input type="number" class="form-control focus-ring focus-ring-warning border-warning" placeholder="€" name="cantidad" id="cantidad" step="0.01" value="<?php echo $fila["cantidad"] ?>" required>
                </div>

                <div class="mb-3">
                    <label for="fecha_hora" class="form-label text-warning">Fecha y hora:</label>
                    <input type="datetime-local" class="form-control focus-ring focus-ring-warning border-warning" name="fecha_hora" id="fecha_hora"
                        value="<?php echo $fila["fecha_hora"] ?>"
                        max="<?php echo date('Y-m-d\TH:i'); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="concepto" class="form-label text-warning">Concepto:</label>
                    <textarea class="form-control focus-ring focus-ring-warning border-warning" rows="5" name="concepto" id="concepto"><?php echo $fila["concepto"] ?></textarea>
                </div>

                <input type="hidden" name="tipo" value="<?php echo $fila['tipo'] ?>">

                <button type="submit" class="btn btn-warning w-100">Modificar movimiento</button>
            </form>
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