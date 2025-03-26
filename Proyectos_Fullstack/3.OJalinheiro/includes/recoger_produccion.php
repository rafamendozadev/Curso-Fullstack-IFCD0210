<?php
include_once("../includes/produccion.php");
include_once("funciones.php");

$fechaRecogida = $_POST['fecha_recogida'];

$gallinas = mostrarGallinasVivas();

foreach ($gallinas as $gallina) {
    $idGallina = $gallina->getId();
    $cantidad = $_POST[$idGallina];

    $produccion = new Produccion();
    $produccion->crearProduccion($fechaRecogida, $idGallina, $cantidad);
    $produccion->insertar();
}

header("Location: ../index.php");
