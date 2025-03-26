<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel='stylesheet' href='../css/style.css'>

<?php

session_start();

$_SESSION = array();


echo "<div class='p-4 m-5 bg-success text-white'>&#9989; sesión cerrada correctamente.</div>";
header("Refresh: 3; ../login.php");

session_destroy();
exit();
