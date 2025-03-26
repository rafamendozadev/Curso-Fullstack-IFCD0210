<?php

$correo = $_POST['correo'];
$clave = $_POST['clave'];

include("db_connection.php");

$query = "SELECT * FROM usuario WHERE correo = '$correo'";

if (!$result = mysqli_query($db, $query)) {
    exit(mysqli_error($db));
} else {
    $fila = mysqli_fetch_assoc($result);
    $hash = $fila['clave'];

    if (password_verify($clave, $hash)) {
        session_start();
        $imagenBase64 = base64_encode($fila['imagen']);
        $tipoImagen = $fila['tipo_imagen'];
        $urlImagen = "data:$tipoImagen;base64,$imagenBase64";

        $_SESSION['id'] = $fila['id'];
        $_SESSION['imagen'] = $urlImagen;
        $_SESSION['nombre'] = $fila['nombre'];
        $_SESSION['apellidos'] = $fila['apellidos'];
        $_SESSION['correo'] = $fila['correo'];
        $_SESSION['clave'] = $fila['clave'];
        $_SESSION['foto'] = $fila['foto'];

        header("Location: ../index.php");
    } else {
        header("Location: ../login.php?incorrecto=true");
    }
}
