<?php
include_once("./usuario.php");


if ($_POST['clave'] == '') {
    // NO CAMBIA CLAVE
    $hash = '';
} else {
    $clave = $_POST['clave'];
    $hash = password_hash($clave, PASSWORD_DEFAULT);
}

if ($_FILES['foto']['name'] == '') {
    // SIN FOTO O SIN CAMBIO DE FOTO
    $nombreArchivo = '';
    $archivoBinario = '';
    $tipoImagen = '';
} else {
    $nombreArchivo = $_FILES["foto"]["name"];
    $archivoBinario = addslashes(file_get_contents($_FILES["foto"]["tmp_name"]));
    $tipoImagen = $_FILES["foto"]["type"];
}

session_start();

$id = $_SESSION['id'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];

$usuario = new Usuario();
$usuario->rellenarUsuario($id, $nombre, $correo, $hash, $archivoBinario, $nombreArchivo, $tipoImagen);
$usuario->setId($id);
$usuario->modificarUsuario();

header("Location: ./destruir_sesion.php");
