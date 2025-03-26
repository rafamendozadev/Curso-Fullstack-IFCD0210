<?php

function mostrarGallinas()
{
    include("db_connection.php");

    include_once("gallina.php");

    $data = array();

    $query = "SELECT * FROM gallina";

    $result = mysqli_query($db, $query);
    if (!$result) {
        exit(mysqli_error($db));
    } else {
        $fila = mysqli_fetch_assoc($result);

        while ($fila) {
            $gallina = new Gallina();
            $gallina->setId($fila['id']);
            $gallina->crearGallina($fila['nombre'], $fila['fecha_nacimiento'], $fila['nombre_raza']);

            $data[] = $gallina;

            $fila = mysqli_fetch_assoc($result);
        }
    }
    mysqli_free_result($result);

    mysqli_close($db);

    return $data;
}

function mostrarGallinasBorrar()
{
    include("db_connection.php");

    include_once("gallina.php");

    $data = array();

    $query = "SELECT gallina.*, produccion.*, baja.* FROM gallina LEFT JOIN produccion
ON gallina.id = produccion.id_gallina LEFT JOIN baja ON baja.id_gallina = gallina.id
WHERE produccion.id_gallina IS NULL AND baja.id_gallina IS NULL;";

    $result = mysqli_query($db, $query);
    if (!$result) {
        exit(mysqli_error($db));
    } else {
        $fila = mysqli_fetch_assoc($result);

        while ($fila) {
            $gallina = new Gallina();
            $gallina->setId($fila['id']);
            $gallina->crearGallina($fila['nombre'], $fila['fecha_nacimiento'], $fila['nombre_raza']);

            $data[] = $gallina;

            $fila = mysqli_fetch_assoc($result);
        }
    }
    mysqli_free_result($result);

    mysqli_close($db);

    return $data;
}

function mostrarGallinasVivas()
{
    include("db_connection.php");

    include_once("gallina.php");

    $data = array();

    $query = "SELECT gallina.* FROM gallina LEFT JOIN baja ON gallina.id = baja.id_gallina WHERE baja.id_gallina IS NULL;";

    $result = mysqli_query($db, $query);
    if (!$result) {
        exit(mysqli_error($db));
    } else {
        $fila = mysqli_fetch_assoc($result);

        while ($fila) {
            $gallina = new Gallina();
            $gallina->setId($fila['id']);
            $gallina->crearGallina($fila['nombre'], $fila['fecha_nacimiento'], $fila['nombre_raza']);

            $data[] = $gallina;

            $fila = mysqli_fetch_assoc($result);
        }
    }
    mysqli_free_result($result);

    mysqli_close($db);

    return $data;
}

function mostrarProduccionSemana()
{
    include("db_connection.php");

    include_once("produccion.php");

    $data = array();

    $query = "SELECT gallina.nombre, gallina.nombre_raza, SUM(produccion.cantidad) as total FROM gallina JOIN produccion ON gallina.id = produccion.id_gallina WHERE produccion.fecha_recogida BETWEEN DATE_SUB(curdate(),INTERVAL 1 WEEK) AND curdate() GROUP BY gallina.nombre, gallina.nombre_raza ORDER BY gallina.nombre_raza;";

    $result = mysqli_query($db, $query);
    if (!$result) {
        exit(mysqli_error($db));
    } else {
        $fila = mysqli_fetch_assoc($result);
        while ($fila) {
            $data[] = $fila;
            $fila = mysqli_fetch_assoc($result);
        }
    }
    mysqli_free_result($result);

    mysqli_close($db);

    return $data;
}

function mostrarMediaRazaMes()
{
    include("db_connection.php");

    include_once("produccion.php");

    $data = array();

    $query = "SELECT gallina.nombre_raza, AVG(produccion.cantidad) AS total FROM produccion JOIN gallina ON produccion.id_gallina = gallina.id WHERE produccion.fecha_recogida BETWEEN DATE_SUB(curdate(),INTERVAL 1 MONTH) AND curdate() GROUP BY gallina.nombre_raza ORDER BY total DESC;";

    $result = mysqli_query($db, $query);
    if (!$result) {
        exit(mysqli_error($db));
    } else {
        $fila = mysqli_fetch_assoc($result);
        while ($fila) {
            $data[] = $fila;
            $fila = mysqli_fetch_assoc($result);
        }
    }
    mysqli_free_result($result);

    mysqli_close($db);

    return $data;
}

function mostrarMediaSemanal()
{
    include("db_connection.php");

    include_once("produccion.php");

    $data = array();

    $query = "SELECT fecha_recogida, SUM(cantidad) AS cantidad FROM `produccion` WHERE fecha_recogida BETWEEN DATE_SUB(curdate(),INTERVAL 1 WEEK) AND curdate() GROUP by fecha_recogida;";

    $result = mysqli_query($db, $query);
    if (!$result) {
        exit(mysqli_error($db));
    } else {
        $fila = mysqli_fetch_assoc($result);
        while ($fila) {
            $data[] = $fila;
            $fila = mysqli_fetch_assoc($result);
        }
    }
    mysqli_free_result($result);

    mysqli_close($db);

    return $data;
}

function mostrar3DiasProduccion()
{
    include("db_connection.php");

    include_once("produccion.php");

    $data = array();

    $query = "SELECT fecha_recogida, SUM(cantidad) AS huevos FROM produccion GROUP BY fecha_recogida ORDER BY `huevos` DESC LIMIT 3;";

    $result = mysqli_query($db, $query);
    if (!$result) {
        exit(mysqli_error($db));
    } else {
        $fila = mysqli_fetch_assoc($result);
        while ($fila) {
            $data[] = $fila;
            $fila = mysqli_fetch_assoc($result);
        }
    }
    mysqli_free_result($result);

    mysqli_close($db);

    return $data;
}

function mostrarDiasSinProducir()
{
    include("db_connection.php");

    include_once("produccion.php");

    $data = array();

    $query = "SELECT gallina.nombre, COUNT(produccion.cantidad) AS dias_sin_producir FROM produccion JOIN gallina ON produccion.id_gallina = gallina.id WHERE produccion.cantidad = 0 GROUP BY gallina.nombre ORDER BY dias_sin_producir DESC;";

    $result = mysqli_query($db, $query);
    if (!$result) {
        exit(mysqli_error($db));
    } else {
        $fila = mysqli_fetch_assoc($result);
        while ($fila) {
            $data[] = $fila;
            $fila = mysqli_fetch_assoc($result);
        }
    }
    mysqli_free_result($result);

    mysqli_close($db);

    return $data;
}

function mostrarMosEncimaMedia()
{
    include("db_connection.php");

    include_once("produccion.php");

    $data = array();

    $query = "SELECT gallina.nombre, AVG(produccion.cantidad) FROM gallina JOIN produccion ON gallina.id = produccion.id_gallina WHERE produccion.cantidad > (SELECT AVG(produccion.cantidad) FROM produccion) AND gallina.nombre_raza = 'Gallina de Mos' GROUP BY gallina.nombre ORDER BY AVG(produccion.cantidad) DESC;";

    $result = mysqli_query($db, $query);
    if (!$result) {
        exit(mysqli_error($db));
    } else {
        $fila = mysqli_fetch_assoc($result);
        while ($fila) {
            $data[] = $fila;
            $fila = mysqli_fetch_assoc($result);
        }
    }
    mysqli_free_result($result);

    mysqli_close($db);

    return $data;
}

function mostrarEstadisticasHuevos()
{
    include("db_connection.php");

    include_once("produccion.php");

    $data = array();

    $query = "SELECT 'diario' AS estadisticas, SUM(cantidad) AS cantidad FROM gallina JOIN produccion ON gallina.id=produccion.id_gallina WHERE fecha_recogida BETWEEN DATE_SUB(curdate(),INTERVAL 1 DAY) AND curdate() UNION SELECT 'semanal' AS estadisticas, SUM(cantidad) AS cantidad FROM gallina JOIN produccion ON gallina.id=produccion.id_gallina WHERE fecha_recogida BETWEEN DATE_SUB(curdate(),INTERVAL 1 WEEK) AND curdate() UNION SELECT 'mensual' AS estadisticas, SUM(cantidad) AS cantidad FROM gallina JOIN produccion ON gallina.id=produccion.id_gallina WHERE fecha_recogida BETWEEN DATE_SUB(curdate(),INTERVAL 1 MONTH) AND curdate() UNION SELECT 'total' AS estadisticas, SUM(cantidad) AS cantidad FROM gallina JOIN produccion ON gallina.id=produccion.id_gallina;";

    $result = mysqli_query($db, $query);
    if (!$result) {
        exit(mysqli_error($db));
    } else {
        $fila = mysqli_fetch_assoc($result);
        while ($fila) {
            $data[] = $fila;
            $fila = mysqli_fetch_assoc($result);
        }
    }
    mysqli_free_result($result);

    mysqli_close($db);

    return $data;
}

function mostrarProduccionRaza()
{
    include("db_connection.php");

    include_once("produccion.php");

    $data = array();

    $query = "SELECT gallina.nombre_raza, SUM(produccion.cantidad) FROM produccion JOIN gallina ON produccion.id_gallina = gallina.id GROUP BY gallina.nombre_raza ORDER BY SUM(produccion.cantidad) DESC;";

    $result = mysqli_query($db, $query);
    if (!$result) {
        exit(mysqli_error($db));
    } else {
        $fila = mysqli_fetch_assoc($result);
        while ($fila) {
            $data[] = $fila;
            $fila = mysqli_fetch_assoc($result);
        }
    }
    mysqli_free_result($result);

    mysqli_close($db);

    return $data;
}

function mostrarMesAlta()
{
    include("db_connection.php");

    include_once("produccion.php");

    $data = array();

    $query = "SELECT DATE_FORMAT(fecha_recogida, '%Y-%m') AS mes, SUM(cantidad) AS total_produccion FROM produccion GROUP BY mes ORDER BY total_produccion DESC LIMIT 1;";

    $result = mysqli_query($db, $query);
    if (!$result) {
        exit(mysqli_error($db));
    } else {
        $fila = mysqli_fetch_assoc($result);
        while ($fila) {
            $data[] = $fila;
            $fila = mysqli_fetch_assoc($result);
        }
    }
    mysqli_free_result($result);

    mysqli_close($db);

    return $data;
}

function mostrarMesBaja()
{
    include("db_connection.php");

    include_once("produccion.php");

    $data = array();

    $query = "SELECT DATE_FORMAT(fecha_recogida, '%Y-%m') AS mes, SUM(cantidad) AS total_produccion FROM produccion GROUP BY mes ORDER BY total_produccion ASC LIMIT 1;";

    $result = mysqli_query($db, $query);
    if (!$result) {
        exit(mysqli_error($db));
    } else {
        $fila = mysqli_fetch_assoc($result);
        while ($fila) {
            $data[] = $fila;
            $fila = mysqli_fetch_assoc($result);
        }
    }
    mysqli_free_result($result);

    mysqli_close($db);

    return $data;
}

function mostrarDaySemana()
{
    include("db_connection.php");

    include_once("produccion.php");

    $data = array();

    $query = "SELECT ELT(FIELD(DAYNAME(fecha_recogida), 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'), 'Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado') as dia, COUNT(*) as cantidad FROM produccion GROUP BY dia ORDER BY COUNT(*) DESC;";

    $result = mysqli_query($db, $query);
    if (!$result) {
        exit(mysqli_error($db));
    } else {
        $fila = mysqli_fetch_assoc($result);
        while ($fila) {
            $data[] = $fila;
            $fila = mysqli_fetch_assoc($result);
        }
    }
    mysqli_free_result($result);

    mysqli_close($db);

    return $data;
}

function mostrarPromedio()
{
    include("db_connection.php");

    include_once("produccion.php");

    $data = array();

    $query = "SELECT gallina.nombre, AVG(produccion.cantidad) AS media FROM gallina JOIN produccion ON produccion.id_gallina = gallina.id GROUP BY gallina.nombre ORDER BY media DESC;";

    $result = mysqli_query($db, $query);
    if (!$result) {
        exit(mysqli_error($db));
    } else {
        $fila = mysqli_fetch_assoc($result);
        while ($fila) {
            $data[] = $fila;
            $fila = mysqli_fetch_assoc($result);
        }
    }
    mysqli_free_result($result);

    mysqli_close($db);

    return $data;
}

function mostrarRazas()
{
    include("db_connection.php");

    include_once("raza.php");

    $data = array();

    $query = "SELECT * FROM raza";

    $result = mysqli_query($db, $query);
    if (!$result) {
        exit(mysqli_error($db));
    } else {
        $fila = mysqli_fetch_assoc($result);

        while ($fila) {
            $raza = new Raza();
            $raza->setNombre($fila['nombre']);
            $raza->crearRaza($fila['nombre'], $fila['descripcion']);

            $data[] = $raza;

            $fila = mysqli_fetch_assoc($result);
        }
    }
    mysqli_free_result($result);

    mysqli_close($db);

    return $data;
}

function mostrarRazasBorrar()
{
    include("db_connection.php");

    include_once("raza.php");

    $data = array();

    $query = "SELECT raza.nombre FROM raza LEFT JOIN gallina ON raza.nombre = gallina.nombre_raza WHERE gallina.id IS NULL;";

    $result = mysqli_query($db, $query);
    if (!$result) {
        exit(mysqli_error($db));
    } else {
        $fila = mysqli_fetch_assoc($result);

        while ($fila) {
            $raza = new Raza();
            $raza->setNombre($fila['nombre']);
            $raza->crearRaza($fila['nombre'], $fila['descripcion']);

            $data[] = $raza;

            $fila = mysqli_fetch_assoc($result);
        }
    }
    mysqli_free_result($result);

    mysqli_close($db);

    return $data;
}

function mostrarBajas()
{
    include("db_connection.php");

    include_once("baja.php");

    $data = array();

    $query = "SELECT  baja.fecha, gallina.nombre, baja.causa FROM baja JOIN gallina ON gallina.id = baja.id_gallina;";

    $result = mysqli_query($db, $query);
    if (!$result) {
        exit(mysqli_error($db));
    } else {
        $fila = mysqli_fetch_assoc($result);

        while ($fila) {
            $baja = new Baja();
            $baja->setIdGallina($fila['nombre']);
            $baja->crearBaja($fila['nombre'], $fila['fecha'], $fila['causa']);

            $data[] = $baja;

            $fila = mysqli_fetch_assoc($result);
        }
    }
    mysqli_free_result($result);

    mysqli_close($db);

    return $data;
}

function mostrarBajasBorrar()
{
    include("db_connection.php");

    include_once("baja.php");

    $data = array();

    $query = "SELECT gallina.* FROM gallina LEFT JOIN baja ON gallina.id = baja.id_gallina WHERE baja.id_gallina IS NOT NULL;";

    $result = mysqli_query($db, $query);
    if (!$result) {
        exit(mysqli_error($db));
    } else {
        $fila = mysqli_fetch_assoc($result);

        while ($fila) {
            $gallina = new Gallina();
            $gallina->setId($fila['id']);
            $gallina->crearGallina($fila['nombre'], $fila['fecha_nacimiento'], $fila['nombre_raza']);

            $data[] = $gallina;

            $fila = mysqli_fetch_assoc($result);
        }
    }
    mysqli_free_result($result);

    mysqli_close($db);

    return $data;
}

function mostrarTop5()
{
    include("db_connection.php");

    include_once("produccion.php");

    $data = array();

    $query = "SELECT gallina.nombre, SUM(produccion.cantidad) AS total FROM produccion JOIN gallina ON gallina.id = produccion.id_gallina GROUP BY gallina.nombre ORDER BY total DESC LIMIT 5;";

    $result = mysqli_query($db, $query);
    if (!$result) {
        exit(mysqli_error($db));
    } else {
        $fila = mysqli_fetch_assoc($result);
        while ($fila) {
            $data[] = $fila;
            $fila = mysqli_fetch_assoc($result);
        }
    }
    mysqli_free_result($result);

    mysqli_close($db);

    return $data;
}
