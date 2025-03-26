<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/favicon.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel='stylesheet' href='./css/style.css'>

    <title>Registro Usuario</title>
</head>

<body class="d-flex flex-column min-vh-100 bg-light">

    <header class="mb-5">
        <?php
        session_start();
        if (isset($_SESSION['id'])) {
            echo "<div class='p-4 m-5 bg-danger text-white'>Ya tienes sesión iniciada.</div>";
            header("Refresh: 3; index.php");
            exit();
        }
        ?>
    </header>

    <main class="container flex-grow-1">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-12">
                <div class="card shadow p-4">
                    <div class="text-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" height="120px" viewBox="0 -960 960 960" width="120px" fill="#5f6368">
                            <path d="M730-400v-130H600v-60h130v-130h60v130h130v60H790v130h-60Zm-370-81q-66 0-108-42t-42-108q0-66 42-108t108-42q66 0 108 42t42 108q0 66-42 108t-108 42ZM40-160v-94q0-35 17.5-63.5T108-360q75-33 133.34-46.5t118.5-13.5Q420-420 478-406.5T611-360q33 15 51 43t18 63v94H40Zm60-60h520v-34q0-16-9-30.5T587-306q-71-33-120-43.5T360-360q-58 0-107.5 10.5T132-306q-15 7-23.5 21.5T100-254v34Zm260-321q39 0 64.5-25.5T450-631q0-39-25.5-64.5T360-721q-39 0-64.5 25.5T270-631q0 39 25.5 64.5T360-541Zm0-90Zm0 411Z" />
                        </svg>
                    </div>

                    <?php
                    include("includes/db_connection.php");
                    if (isset($_GET["incorrecto"]) && $_GET["incorrecto"] == 'true') {
                        echo "<div class='p-2 m-2 bg-danger text-white'> Correo electrónico ya registrado. Por favor, inicie sesión.</div>";
                    }
                    ?>

                    <h3 class="text-center mb-4">Registro de Usuario</h3>
                    <p class="text-center">Rellene este formulario para registrarte.</p>
                    <hr>

                    <form action="./includes/crear_usuario.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nombre" class="form-label"><b>Nombre:</b></label>
                            <input type="text" class="form-control focus-ring focus-ring-warning border-warning" id="nombre" name="nombre" placeholder="Introducir nombre" required>
                        </div>

                        <div class="mb-3">
                            <label for="correo" class="form-label"><b>Correo electrónico:</b></label>
                            <input type="email" class="form-control focus-ring focus-ring-warning border-warning" id="correo" name="correo" placeholder="Introducir correo" required pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$">
                        </div>

                        <div class="mb-3">
                            <label for="clave" class="form-label"><b>Contraseña:</b></label>
                            <input type="password" class="form-control focus-ring focus-ring-warning border-warning" id="clave" name="clave" placeholder="Introducir contraseña" required minlength="8">
                        </div>

                        <div class="mb-4">
                            <label for="foto" class="form-label"><b>Foto de perfil:</b></label>
                            <input type="file" class="form-control focus-ring focus-ring-warning border-warning" id="foto" name="foto">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-warning w-50">Registrar</button>
                        </div>
                    </form>

                    <div class="text-center mt-3">
                        <p>¿Ya tiene una cuenta? <a href="login.php" class="text-warning">Iniciar sesión</a></p>
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