<?php
include_once('includes/comprobar_seguridad.php');
?>

<nav class="navbar navbar-expand-lg fixed-top bg-secondary rounded-bottom-4">
    <div class="container-fluid">
    <a class="navbar-brand text-white fs-3 me-2" href="index.php">
            Gastos y Ingresos
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav flex-grow-1 d-flex justify-content-evenly">
                    
                    <li class="nav-item">
                        <a class="nav-link active text-warning fs-5" aria-current="page" href="registrar_cuenta.php">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Cuentas</font>
                            </font>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning fs-5" href="registrar_movimiento.php?tipo=gasto">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Registrar movimientos</font>
                            </font>
                        </a>
                    </li>
                </ul>

            <ul class="navbar-nav ms-auto">
                <div class="d-flex justify-content-center align-items-end flex-column">
                    <!-- <li class="nav-item">
                        <p class="nav-link py-0 font-weight-bold fs-6"><?php echo $_SESSION['nombre']; ?></p>                   
                        <p class="nav-link py-0 font-weight-bold fs-6"><?php echo $_SESSION['correo']; ?></p>
                    </li> -->
                </div>
                <div class="d-flex flex-column align-items-end">
                    <li class="nav-item">

                        <a href="modificar_usuario.php" class="profile-edit-btn" style="position: relative; display: inline-block;">
                            <img src="<?php echo $_SESSION['imagen'] ?>" alt="Foto de perfil" style="width: 50px; height: 50px; border-radius: 50%;">
                            <svg class="edit-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" style="
        position: absolute;
        bottom: -5px;
        right: -5px;
        width: 20px;
        height: 20px;
        fill: #ffffff;
        opacity: 0.8;
        background-color: rgba(0,0,0,0.5);
        border-radius: 50%;
        padding: 3px;
    ">
                                <path d="M186.67-120q-27 0-46.84-19.83Q120-159.67 120-186.67v-586.66q0-27 19.83-46.84Q159.67-840 186.67-840h389L509-773.33H186.67v586.66h586.66v-324.66L840-578v391.33q0 27-19.83 46.84Q800.33-120 773.33-120H186.67ZM480-480ZM360-360v-170l377-377q10-10 22.33-14.67 12.34-4.66 24.67-4.66 12.67 0 25.04 5 12.38 5 22.63 15l74 75q9.4 9.97 14.53 22.02 5.13 12.05 5.13 24.51 0 12.47-4.83 24.97-4.83 12.5-14.83 22.5L530-360H360Zm499-424.67-74.67-74.66L859-784.67Zm-432.33 358H502l246-246L710-710l-38.33-37.33-245 244.33v76.33ZM710-710l-38.33-37.33L710-710l38 37.33L710-710Z" />
                            </svg>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning icon-link icon-link-hover text-warning" style="--bs-icon-link-transform: translate3d(0, -.250rem, 0);" id="cerrar_sesion" href="includes/destruir_sesion.php"><i class="bi bi-box-arrow-right h3" style="float: right"></i></a>
                    </li>
                </div>
            </ul>
        </div>
    </div>
</nav>