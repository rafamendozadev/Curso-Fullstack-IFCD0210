<?php
// Incluímos el archivo de pedido.php para poder usar la clase de pedido.
include_once("../includes/pedido.php");

// Guardamos en variables los valores que se escribieron en cada input del formulario
$total=$_POST['total'];
$fecha=$_POST['fecha'];
$id_cliente=$_POST['id_cliente'];
$id_comercial=$_POST['id_comercial'];

// Creamos un objeto pedido con esos datos para poder utilizar el método que lo inserte la base de datos
$pedido=new pedido();
$pedido->crearPedido($total, $fecha, $id_cliente, $id_comercial);
$pedido->insertar();

// Redirigimos a la página principal
header("Location:  ../index.php");
