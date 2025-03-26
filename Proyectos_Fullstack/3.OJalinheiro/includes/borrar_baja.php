<?php
// Incluímos el archivo de pedido.php para poder usar la clase de pedido.
include_once("../includes/baja.php");

// Guardamos en variables los valores que se escribieron en cada input del formulario
$idGallina = $_POST['id_gallina'];

// Creamos un objeto pedido con esos datos para poder utilizar el método que lo inserte la base de datos
$baja = new Baja();
$baja->setIdGallina($idGallina);
$baja->borrar();

// Redirigimos a la página principal
header("Location:  ../index.php");
