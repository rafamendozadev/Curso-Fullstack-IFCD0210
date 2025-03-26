<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/favicon.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel='stylesheet' href='./css/style.css'>
    <title>Login</title>
</head>

<body class="d-flex flex-column min-vh-100 bg-light">

    <header class="mb-5">
        <?php
        session_start();
        if (isset($_SESSION['id'])) {
            echo "<div class='p-4 m-5 bg-danger text-white'>Ya tienes sesión iniciada.</div>";
            header("Refresh: 3; index.php?");
            exit();
        }
        ?>
    </header>

    <main class="container flex-grow-1">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7 col-sm-10">
                <div class="card shadow p-4">
                    <div class="text-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" height="120px" viewBox="0 -960 960 960" width="120px" fill="#5f6368">
                            <path d="M480-481q-66 0-108-42t-42-108q0-66 42-108t108-42q66 0 108 42t42 108q0 66-42 108t-108 42ZM160-160v-94q0-38 19-65t49-41q67-30 128.5-45T480-420q62 0 123 15.5t127.92 44.69q31.3 14.13 50.19 40.97Q800-292 800-254v94H160Zm60-60h520v-34q0-16-9.5-30.5T707-306q-64-31-117-42.5T480-360q-57 0-111 11.5T252-306q-14 7-23 21.5t-9 30.5v34Zm260-321q39 0 64.5-25.5T570-631q0-39-25.5-64.5T480-721q-39 0-64.5 25.5T390-631q0 39 25.5 64.5T480-541Zm0-90Zm0 411Z" />
                        </svg>
                    </div>

                    <h3 class="text-center mb-4">Iniciar Sesión</h3>

                    <?php
                    if (isset($_GET["incorrecto"]) && $_GET["incorrecto"] == 'true') {
                        echo "<div class='alert alert-danger text-center'>Usuario o contraseña inválido.</div>";
                    }
                    ?>

                    <form action="./includes/comprobar_usuario.php" method="post">
                        <div class="mb-3">
                            <label for="correo" class="form-label"><b>Correo electrónico:</b></label>
                            <input type="email" class="form-control focus-ring focus-ring-warning border-warning" id="correo" name="correo" placeholder="Introducir correo electrónico" required>
                        </div>

                        <div class="mb-3">
                            <label for="clave" class="form-label"><b>Contraseña:</b></label>
                            <input type="password" class="form-control focus-ring focus-ring-warning border-warning" id="clave" name="clave" placeholder="Introducir contraseña" required>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Recuérdame</label>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-warning w-50" type="submit">Login</button>
                        </div>
                    </form>

                    <div class="text-center mt-3">
                        <p>¿Aún no tiene una cuenta? <a href="registrar_usuario.php" class="text-warning">Regístrate</a></p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer mt-auto bg-dark text-light py-4">
        <div class="container text-center">
            <p>Creado por Rafael Mendoza - 2024</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kytgKJtwwDr7f+W23vpxNq/ISMO5H55uzHJmKOVgZZmXlT5yoPguJZax7tqk4ERp" crossorigin="anonymous"></script>
</body>

</html>
