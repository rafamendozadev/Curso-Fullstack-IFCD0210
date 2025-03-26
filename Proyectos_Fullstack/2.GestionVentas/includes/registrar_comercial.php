<?php
// Incluímos el archivo de comercial.php para poder usar la clase de comercial.
include_once("../includes/comercial.php");

// Guardamos en variables los valores que se escribieron en cada input del formulario
$nombre=$_POST['nombre'];
$apellido1=$_POST['apellido1'];
$apellido2=$_POST['apellido2'];
$comision=$_POST['comision'];

// Creamos un objeto cliente con esos datos para poder utilizar el método que lo inserte la base de datos
$comercial=new comercial();
$comercial->crearComercial($nombre, $apellido1, $apellido2, $comision);
$comercial->insertar();

// Redirigimos a la página principal
header("Location: ../index.php");
