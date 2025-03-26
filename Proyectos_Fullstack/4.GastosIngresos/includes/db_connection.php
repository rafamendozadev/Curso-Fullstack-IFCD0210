<?php
$host = "localhost:3306";
$user = "root";
$password = "";
$database = "gastos_ingresos";

$db = mysqli_connect($host, $user, $password, $database);

if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}

mysqli_set_charset($db, "utf8");
