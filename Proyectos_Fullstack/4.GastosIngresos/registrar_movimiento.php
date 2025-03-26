<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel="shortcut icon" href="./img/favicon.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel='stylesheet' href='./css/style.css'>

    <title>Registrar movimiento</title>
</head>

<body class="d-flex flex-column min-vh-100 bg-light">

    <header>
        <?php
        include_once('includes/comprobar_seguridad.php');
        include_once('includes/menu_nav.php');
        ?>
    </header>

    <main class="special-padding container flex-grow-1 d-flex justify-content-center align-items-center">
        <div class="card p-4 shadow-lg" style="width: 100%; max-width: 600px;">

            <form action="./includes/crear_movimiento.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="tipo" value='<?php echo $_GET['tipo'] ?>'>
                <?php
                if (isset($_GET["incorrecto"]) && $_GET["incorrecto"] == 'true') {
                    echo "<div class='alert alert-danger'>&#10060 correo electrónico ya registrado. Por favor, inicie sesión.</div>";
                }
                ?>
                <h1 class="text-center text-warning">Registrar movimiento</h1>

                <!-- Radio buttons para seleccionar tipo de movimiento -->
                <div class="mb-4 text-center">
                    <div class="btn-group" role="group" aria-label="Tipo de movimiento">
                        <input type="radio" class="btn-check" name="tipo" id="gasto" autocomplete="off" 
                               value="gasto" <?= ($_GET['tipo'] ?? 'gasto') === 'gasto' ? 'checked' : '' ?>
                               onchange="cambiarTipoMovimiento(this.value)">
                        <label class="btn btn-outline-warning" for="gasto">Gasto</label>
                        
                        <input type="radio" class="btn-check" name="tipo" id="ingreso" autocomplete="off" 
                               value="ingreso" <?= ($_GET['tipo'] ?? 'gasto') === 'ingreso' ? 'checked' : '' ?>
                               onchange="cambiarTipoMovimiento(this.value)">
                        <label class="btn btn-outline-warning" for="ingreso">Ingreso</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="cuenta" class="form-label text-warning">Cuenta:</label>
                    <select name="cuenta" id="cuenta" class="form-select border-warning" required>
                        <?php
                        include_once("includes/funciones.php");
                        $cuentas = mostrarCuentasUsuario();
                        foreach ($cuentas as $cuenta) {
                        ?>
                            <option value="<?php echo $cuenta["id"] ?>"><?php echo $cuenta["nombre"] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="categoria" class="form-label text-warning">Categoría:</label>
                    <select name="categoria" id="categoria" class="form-select border-warning" required>
                        <?php
                        $categorias = mostrarCategoria($_GET['tipo'] ?? 'gasto');
                        foreach ($categorias as $categoria) {
                        ?>
                            <option value="<?php echo $categoria["id"] ?>"><?php echo $categoria["nombre"] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="cantidad" class="form-label text-warning">Cantidad:</label>
                    <input type="number" class="form-control focus-ring focus-ring-warning border-warning" placeholder="€" name="cantidad" id="cantidad" step="0.01" required>
                </div>

                <div class="mb-3">
                    <label for="fecha_hora" class="form-label text-warning">Fecha y hora:</label>
                    <input type="datetime-local" class="form-control focus-ring focus-ring-warning border-warning" name="fecha_hora" id="fecha_hora"
                        value="<?php echo date('Y-m-d\TH:i'); ?>" max="<?php echo date('Y-m-d\TH:i'); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="concepto" class="form-label text-warning">Concepto:</label>
                    <textarea class="form-control focus-ring focus-ring-warning border-warning" rows="5" name="concepto" id="concepto"></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-warning w-50">Registrar</button>
                </div>
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