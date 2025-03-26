<?php

function mostrarCuentas()
{
    include("db_connection.php");
    $data = array();
    $query = "SELECT * FROM `cuenta`;";

    $result = mysqli_query($db, $query);
    if (!$result) {
        exit(mysqli_error($db));
    } else {
        $fila = mysqli_fetch_assoc($result);
        while ($fila) {
            $data[] = $fila;
            $fila = mysqli_fetch_assoc($result);
        }

        mysqli_free_result($result);
        mysqli_close($db);
        return $data;
    }
}

function mostrarCuentasUsuario()
{
    include("db_connection.php");
    session_start();
    $data = array();

    $query = "SELECT * FROM usuario JOIN cuenta ON usuario.id = cuenta.id_usuario WHERE usuario.id = '" . $_SESSION['id'] . "';";

    $result = mysqli_query($db, $query);
    if (!$result) {
        exit(mysqli_error($db));
    } else {
        $fila = mysqli_fetch_assoc($result);
        while ($fila) {
            $data[] = $fila;
            $fila = mysqli_fetch_assoc($result);
        }

        mysqli_free_result($result);
        mysqli_close($db);
        return $data;
    }
}

function mostrarCategoria($tipo)
{
    include("db_connection.php");
    $data = array();

    $query = "SELECT * FROM `categoria` WHERE tipo = '$tipo';";

    $result = mysqli_query($db, $query);
    if (!$result) {
        exit(mysqli_error($db));
    } else {
        $fila = mysqli_fetch_assoc($result);
        while ($fila) {
            $data[] = $fila;
            $fila = mysqli_fetch_assoc($result);
        }

        mysqli_free_result($result);
        mysqli_close($db);
        return $data;
    }
}

function mostrarSaldo($id_cuenta = null)
{
    include("db_connection.php");
    $id_usuario = $_SESSION['id'];

    $query = "SELECT
        c.id AS id_cuenta,
        c.nombre AS nombre_cuenta,
        ROUND(
            IFNULL(SUM(CASE WHEN m.tipo = 'ingreso' THEN m.cantidad ELSE 0 END), 0) -
            IFNULL(SUM(CASE WHEN m.tipo = 'gasto' THEN m.cantidad ELSE 0 END), 0),
        2) AS saldo
    FROM
        cuenta c
    LEFT JOIN movimiento m ON
        m.id_cuenta = c.id
    WHERE
        c.id_usuario = $id_usuario
        ".($id_cuenta ? " AND c.id = $id_cuenta" : "")."
    GROUP BY
        c.id, c.nombre";

    $result = mysqli_query($db, $query);
    if (!$result) {
        exit(mysqli_error($db));
    } else {
        if ($id_cuenta) {
            $fila = mysqli_fetch_assoc($result);
            mysqli_free_result($result);
            mysqli_close($db);
            return $fila;
        } else {
            $filas = array();
            while ($fila = mysqli_fetch_assoc($result)) {
                $filas[] = $fila;
            }
            mysqli_free_result($result);
            mysqli_close($db);
            return $filas;
        }
    }
}

function obtenerMovimiento()
{
    include("db_connection.php");
    $data = array();
    $id_usuario = $_SESSION['id'];

    $query = "SELECT movimiento.id,
       movimiento.tipo,
       movimiento.cantidad,
       movimiento.fecha_hora,
       movimiento.concepto,
       cuenta.nombre AS nombre_cuenta,
       categoria.nombre AS nombre_categoria,
       categoria.icono,
       categoria.color
FROM movimiento
JOIN cuenta ON movimiento.id_cuenta = cuenta.id
JOIN categoria ON movimiento.id_categoria = categoria.id
WHERE cuenta.id_usuario = $id_usuario
ORDER BY fecha_hora DESC";

    $result = mysqli_query($db, $query);
    if (!$result) {
        exit(mysqli_error($db));
    } else {
        $fila = mysqli_fetch_assoc($result);
        while ($fila) {
            $data[] = $fila;
            $fila = mysqli_fetch_assoc($result);
        }

        mysqli_free_result($result);
        mysqli_close($db);
        return $data;
    }
}

function obtenerMovimientoMensual()
{
    include("db_connection.php");
    $data = array();
    $id_usuario = $_SESSION['id'];

    $query = "SELECT m.id,
       m.tipo,
       m.cantidad,
       m.fecha_hora,
       m.concepto,
       c.nombre AS nombre_cuenta,
       cat.nombre AS nombre_categoria,
       cat.icono,
       cat.color
FROM movimiento m
JOIN cuenta c ON m.id_cuenta = c.id
JOIN categoria cat ON m.id_categoria = cat.id
WHERE c.id_usuario = $id_usuario
  AND m.fecha_hora BETWEEN DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH) AND NOW()
ORDER BY fecha_hora DESC";

    $result = mysqli_query($db, $query);
    if (!$result) {
        exit(mysqli_error($db));
    } else {
        $fila = mysqli_fetch_assoc($result);
        while ($fila) {
            $data[] = $fila;
            $fila = mysqli_fetch_assoc($result);
        }

        mysqli_free_result($result);
        mysqli_close($db);
        return $data;
    }
}

function obtenerMovimientos($tipo)
{
    include("db_connection.php");
    $data = array();
    $id_usuario = $_SESSION['id'];

    $query = "SELECT m.id,
       m.tipo,
       m.cantidad,
       m.fecha_hora,
       m.concepto,
       c.nombre AS nombre_cuenta,
       cat.nombre AS nombre_categoria,
       cat.icono,
       cat.color
FROM movimiento m
JOIN cuenta c ON m.id_cuenta = c.id
JOIN categoria cat ON m.id_categoria = cat.id
WHERE c.id_usuario = $id_usuario
  AND m.tipo = '$tipo'
ORDER BY fecha_hora DESC";

    $result = mysqli_query($db, $query);
    if (!$result) {
        exit(mysqli_error($db));
    } else {
        $fila = mysqli_fetch_assoc($result);
        while ($fila) {
            $data[] = $fila;
            $fila = mysqli_fetch_assoc($result);
        }

        mysqli_free_result($result);
        mysqli_close($db);
        return $data;
    }
}

function obtenerMovimientoPorId($id)
{
    include("db_connection.php");

    $query = "SELECT * FROM movimiento WHERE id = $id";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    } else {
        return false;
    }

    mysqli_close($db);
}

function obtenerGastosIngresos($tipo)
{
    include("db_connection.php");
    $data = array();
    $id_usuario = $_SESSION['id'];

    $query = "SELECT grupo_categoria.id_categoria,
            grupo_categoria.nombre_categoria,
            grupo_categoria.soma_categoria /
        (SELECT SUM(cantidad)
        FROM movimiento
        WHERE tipo = '$tipo'
        GROUP BY tipo) * 100 as porcentage
        FROM
        (SELECT movimiento.id_categoria,
                categoria.nombre AS nombre_categoria,
                SUM(movimiento.cantidad) AS soma_categoria
        FROM movimiento
        JOIN cuenta ON movimiento.id_cuenta = cuenta.id
        JOIN categoria ON movimiento.id_categoria = categoria.id
        WHERE cuenta.id_usuario = $id_usuario
            AND movimiento.tipo = '$tipo'
        GROUP BY movimiento.id_categoria,
                    categoria.nombre
        ORDER BY fecha_hora DESC) grupo_categoria
    ";

    $result = mysqli_query($db, $query);
    if (!$result) {
        exit(mysqli_error($db));
    } else {
        $fila = mysqli_fetch_assoc($result);
        while ($fila) {
            $data[] = $fila;
            $fila = mysqli_fetch_assoc($result);
        }

        mysqli_free_result($result);
        mysqli_close($db);
        return $data;
    }

    function estadisticasCuentas($id,$tipo){
        include("db_connection.php");
    
        $query = "SELECT c.nombre AS cuenta,
        c.saldo_inicial,
        SUM(cantidad) AS cantidad
    FROM movimiento m
JOIN cuenta c
    ON m.id_cuenta=c.id
    WHERE m.tipo='$tipo'
        AND c.id_usuario=$id
    GROUP BY  c.nombre;";

        $data = array();
    
        if (!$result = mysqli_query($db, $query)) {
            exit(mysqli_error($db));
        } else {
            while ($fila = mysqli_fetch_assoc($result)) {
                $data[] = $fila;
            }
        }
        mysqli_free_result($result);
    
        mysqli_close($db);
    
        return $data;
    }
}
