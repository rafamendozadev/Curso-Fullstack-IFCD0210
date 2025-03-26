<?php
include_once("./movimiento.php");

$tipo = $_POST['tipo'];
$cantidad = $_POST['cantidad'];
$concepto = $_POST['concepto'];
$categoria = $_POST['categoria'];
$fechaHora = $_POST['fecha_hora'];
$cuenta = $_POST['cuenta'];

$movimiento = new Movimiento;
$movimiento->rellenarMovimiento($tipo, $cantidad, $fechaHora, $concepto, $cuenta, $categoria);
$movimiento->insertarMovimiento();

header("Location: ../index.php");
