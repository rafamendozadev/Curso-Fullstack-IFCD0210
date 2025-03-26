<?php
// Incluímos el archivo de cliente.php para poder usar la clase de cliente.
include_once("../includes/cliente.php");

// Guardamos en variables los valores que se escribieron en cada input del formulario
$nombre=$_POST['nombre'];
$apellido1=$_POST['apellido1'];
$apellido2=$_POST['apellido2'];
$ciudad=$_POST['ciudad'];
$categoria=$_POST['categoria'];

// Creamos un objeto cliente con esos datos para poder utilizar el método que lo inserte la base de datos
$cliente=new cliente();
$cliente->crearCliente($nombre, $apellido1, $apellido2, $ciudad, $categoria);
$cliente->insertar();

// Redirigimos a la página principal
header("Location: ../index.php");
