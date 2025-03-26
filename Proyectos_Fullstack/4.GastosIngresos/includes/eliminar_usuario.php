<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<?php
session_start();
include_once("./usuario.php");

if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];

    $usuario = new Usuario();
    $usuario->setId($id);

    if ($usuario->eliminarUsuario()) {
        session_destroy();
        echo "<div class='p-4 m-5 bg-success text-white'>&#9989; Usuario eliminado con éxito.</div>";
    } else {
        echo "<div class='p-4 m-5 bg-warning text-white'>Error al eliminar el usuario.</div>";
    }
} else {
    echo "<div class='p-4 m-5 bg-warning text-white'>No se ha iniciado sesión.</div>";
}

header("Refresh: 3; ../login.php");
exit();
?>