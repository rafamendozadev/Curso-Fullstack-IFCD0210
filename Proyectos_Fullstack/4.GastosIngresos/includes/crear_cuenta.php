
<?php
include_once("./cuenta.php");

$nombre = $_POST['nombre'];
$iban = $_POST['iban'];
$saldoInicial = $_POST['saldo'];
$idUsuario = $_POST['id_usuario'];

$cuenta = new Cuenta;
$cuenta->verificarCuenta();
$cuenta->rellenarCuenta($nombre, $iban, $saldoInicial, $idUsuario);
$cuenta->insertarCuenta();

header("Location: ../index.php");
