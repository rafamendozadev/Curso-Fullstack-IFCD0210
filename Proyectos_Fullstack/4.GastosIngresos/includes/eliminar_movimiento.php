<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<?php
include_once("./movimiento.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $movimiento = new Movimiento();
    $movimiento->setId($id);
    if ($movimiento->eliminarMovimiento($id)) {
        echo "<div class='p-4 m-5 bg-success text-white'>&#9989; Movimiento eliminado con éxito.</div>";
        header("Refresh: 3; ../index.php?");
        exit();
    } else {
        echo "<div class='p-4 m-5 bg-danger text-white'>Error al eliminar el movimiento.</div>";
        header("Refresh: 3; ../index.php?");
        exit();
    }
} else {
    echo "<div class='p-4 m-5 bg-danger text-white'>No se ha seleccionado ninguno movimiento.</div>";
    header("Refresh: 3; ../index.php?");
    exit();
}
