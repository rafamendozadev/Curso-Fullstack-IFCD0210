<?php
include_once("./usuario.php");

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$clave = $_POST['clave'];

$hash = password_hash($clave, PASSWORD_DEFAULT);

if ($_FILES['foto']['name'] == '') {
    // CREAR USUARIO SIN FOTO
    $nombreArchivo = '';
    $archivoBinario = '';
    $tipoImagen = '';
} else {
    $nombreArchivo = $_FILES["foto"]["name"];
    $archivoBinario = addslashes(file_get_contents($_FILES["foto"]["tmp_name"]));
    $tipoImagen = $_FILES["foto"]["type"];
}

$usuario = new Usuario;
$usuario->verificarCorreo();
$usuario->rellenarUsuario($id, $nombre, $correo, $hash, $archivoBinario, $nombreArchivo, $tipoImagen);
$usuario->insertarUsuario();

header("Location: ../index.php");
