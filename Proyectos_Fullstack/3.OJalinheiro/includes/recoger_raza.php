<?php
// Incluímos el archivo de cliente.php para poder usar la clase de cliente.
include_once("../includes/raza.php");

// Guardamos en variables los valores que se escribieron en cada input del formulario
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];

// Creamos un objeto gallina con esos datos para poder utilizar el método que lo inserte la base de datos
$raza = new Raza();
$raza->crearRaza($nombre, $descripcion);
$raza->insertar();

// Redirigimos a la página principal
header("Location: ../index.php");
