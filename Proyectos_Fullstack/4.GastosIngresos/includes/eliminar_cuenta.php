<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<?php
include_once("./cuenta.php");

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);

    $cuenta = new Cuenta();
    $cuenta->setId($id);

    if ($cuenta->eliminarCuenta($id)) {
        echo "<div class='p-4 m-5 bg-success text-white'>&#9989; Cuenta eliminada con éxito.</div>";
    } else {
        echo "<div class='p-4 m-5 bg-danger text-white'>Error al eliminar la cuenta.</div>";
    }
} else {
    echo "<div class='p-4 m-5 bg-warning text-white'>No se ha seleccionado ninguna cuenta.</div>";
}

header("Refresh: 3; ../index.php");
include_once("./destruir_sesion.php");
