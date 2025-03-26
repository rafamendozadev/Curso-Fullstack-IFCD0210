<?php
// Incluímos el archivo de pedido.php para poder usar la clase de pedido.
include_once("../includes/baja.php");

// Guardamos en variables los valores que se escribieron en cada input del formulario
$nombre = $_POST['nombre'];
$fecha = $_POST['fecha'];
$causa = $_POST['causa'];

// Creamos un objeto pedido con esos datos para poder utilizar el método que lo inserte la base de datos
$baja = new Baja();
$baja->crearBaja($nombre, $fecha, $causa);
$baja->insertar();

// Redirigimos a la página principal
header("Location:  ../index.php");
