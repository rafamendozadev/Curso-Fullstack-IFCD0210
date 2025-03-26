<?php

// Función para mostrar todos los datos de los clientes
function mostrarClientes()
{
    // Abrimos conexión con la base de datos
    include("db_connection.php");

    // Agregamos la clase cliente para poder crear los objetos cliente más adelante
    include_once("cliente.php");

    // Inicializamos una variable $data a la que le indicamos que es un array vacío.
    $data = array();

    // Guardamos en una variable la sentencia SQL que queremos realizar
    $query = "SELECT * FROM cliente";

    // Guardamos en una variable $result el resultado de la consulta para después poder coger esos datos.
    // Además, comprobamos si tiene errores, viendo si el resultado es nulo o false.
    $result = mysqli_query($db, $query);
    if (!$result) {
        exit(mysqli_error($db));
    } else {
        // Si no tiene errores vamos recorriendo fila a fila el resultado
        // Primero guardamos el resultado de la primera fila como un array en la variable $fila
        $fila = mysqli_fetch_assoc($result);

        // Mientras la variable $fila tiene datos válidos:
        while ($fila) {
            // Creamos un objeto cliente con sus atributos que tenemos de resultado de la fila de la consulta
            $cliente = new cliente();
            $cliente->setId($fila['id']);
            $cliente->crearCliente($fila['nombre'], $fila['apellido1'], $fila['apellido2'], $fila['ciudad'], $fila['categoria']);

            // Añadimos ese objeto a un array. Ese array en la variable $data va a ser un array de objetos cliente
            $data[] = $cliente;

            // Guardamos en la variable el resultado de la siguiente fila
            $fila = mysqli_fetch_assoc($result);
        }
    }
    // Liberar el conjunto de resultados (recomendable sólo cuando hacemos un select)
    mysqli_free_result($result);

    // Cerramos conexión con la Base de Datos
    mysqli_close($db);

    // Devolvemos ese array de objetos para poder hacer con esos datos lo que queramos
    return $data;
}



// Función simplificada para mostrar los datos de los clientes que hicieron alguna compra
function mostrarClientesConPedidos()
{
    // Abrimos conexión con la base de datos
    include("db_connection.php");
    include_once("cliente.php");

    $data = array();

    $query = "SELECT DISTINCT c.* FROM cliente c JOIN pedido p ON c.id=p.id_cliente;";

    // En esta condición comprobamos si el resultado de la sentencia es null o false, si es así devolvemos el error, sino recorremos el resultado y lo guardamos en un array de objetos
    if (!$result = mysqli_query($db, $query)) {
        exit(mysqli_error($db));
    } else {
        while ($fila = mysqli_fetch_assoc($result)) {
            $cliente = new cliente();
            $cliente->setId($fila['id']);
            $cliente->crearCliente($fila['nombre'], $fila['apellido1'], $fila['apellido2'], $fila['ciudad'], $fila['categoria']);
            $data[] = $cliente;
        }
    }
    // Liberar el conjunto de resultados (recomendable sólo cuando hacemos un select)
    mysqli_free_result($result);

    // Cerramos conexión con la Base de Datos
    mysqli_close($db);

    return $data;
}


// ******************** Función mostrar comercial ***********************

function mostrarComercial()
{
    // Abrimos conexión con la base de datos
    include("db_connection.php");

    // Agregamos la clase comercial para poder crear los objetos comercial más adelante
    include_once("comercial.php");

    // Inicializamos una variable $data a la que le indicamos que es un array vacío.
    $data = array();

    // Guardamos en una variable la sentencia SQL que queremos realizar
    $query = "SELECT comercial.id, nombre, comercial.apellido1, comercial.apellido2, comision, COUNT(pedido.id) AS 'numeropedidos'
    FROM comercial JOIN pedido
    ON comercial.id = pedido.id
    GROUP BY nombre;";

    // Guardamos en una variable $result el resultado de la consulta para después poder coger esos datos.
    // Además, comprobamos si tiene errores, viendo si el resultado es nulo o false.
    $result = mysqli_query($db, $query);
    if (!$result) {
        exit(mysqli_error($db));
    } else {
        // Si no tiene errores vamos recorriendo fila a fila el resultado
        // Primero guardamos el resultado de la primera fila como un array en la variable $fila
        $fila = mysqli_fetch_assoc($result);

        // Mientras la variable $fila tiene datos válidos:
        while ($fila) {
            // Creamos un objeto cliente con sus atributos que tenemos de resultado de la fila de la consulta
            $comercial = new comercial();
            $comercial->setId($fila['id']);
            $comercial->crearComercial($fila['nombre'], $fila['apellido1'], $fila['apellido2'], $fila['comision'], $fila['numeropedidos']);

            // Añadimos ese objeto a un array. Ese array en la variable $data va a ser un array de objetos cliente
            $data[] = $comercial;

            // Guardamos en la variable el resultado de la siguiente fila
            $fila = mysqli_fetch_assoc($result);
        }
    }
    // Liberar el conjunto de resultados (recomendable sólo cuando hacemos un select)
    mysqli_free_result($result);

    // Cerramos conexión con la Base de Datos
    mysqli_close($db);

    // Devolvemos ese array de objetos para poder hacer con esos datos lo que queramos
    return $data;
}

function mostrarEstadisticasComercial()
{
    // Abrimos conexión con la base de datos
    include("db_connection.php");

    // Agregamos la clase comercial para poder crear los objetos comercial más adelante
    include_once("comercial.php");

    // Inicializamos una variable $data a la que le indicamos que es un array vacío.
    $data = array();

    // Guardamos en una variable la sentencia SQL que queremos realizar
    $query = "SELECT comercial.id, nombre, apellido1, apellido2, comision, COUNT(pedido.id) AS numeropedidos, AVG(pedido.total) AS media, SUM(total)*comision AS beneficio
                FROM comercial LEFT JOIN pedido
                ON comercial.id=pedido.id_comercial
                GROUP BY comercial.id, nombre, apellido1, apellido2, comision;";

    // Guardamos en una variable $result el resultado de la consulta para después poder coger esos datos.
    // Además, comprobamos si tiene errores, viendo si el resultado es nulo o false.
    $result = mysqli_query($db, $query);
    if (!$result) {
        exit(mysqli_error($db));
    } else {
        // Si no tiene errores vamos recorriendo fila a fila el resultado
        // Primero guardamos el resultado de la primera fila como un array en la variable $fila
        $fila = mysqli_fetch_assoc($result);

        // Mientras la variable $fila tiene datos válidos:
        while ($fila) {
            // Creamos un objeto cliente con sus atributos que tenemos de resultado de la fila de la consulta
            $comercial = new comercial();
            $comercial->setId($fila['id']);
            $comercial->crearComercial($fila['nombre'], $fila['apellido1'], $fila['apellido2'], $fila['comision'], $fila['numeropedidos'], round($fila['media'], 2), round($fila['beneficio'], 2));

            // Añadimos ese objeto a un array. Ese array en la variable $data va a ser un array de objetos cliente
            $data[] = $comercial;

            // Guardamos en la variable el resultado de la siguiente fila
            $fila = mysqli_fetch_assoc($result);
        }
    }
    // Liberar el conjunto de resultados (recomendable sólo cuando hacemos un select)
    mysqli_free_result($result);

    // Cerramos conexión con la Base de Datos
    mysqli_close($db);

    // Devolvemos ese array de objetos para poder hacer con esos datos lo que queramos
    return $data;
}

// ******************** Función mostrar pedido ***********************

function mostrarPedido()
{
    // Abrimos conexión con la base de datos
    include("db_connection.php");

    // Agregamos la clase pedido para poder crear los objetos pedido más adelante
    include_once("pedido.php");

    // Inicializamos una variable $data a la que le indicamos que es un array vacío.
    $data = array();

    // Guardamos en una variable la sentencia SQL que queremos realizar
    $query = "SELECT * FROM pedido";

    // Guardamos en una variable $result el resultado de la consulta para después poder coger esos datos.
    // Además, comprobamos si tiene errores, viendo si el resultado es nulo o false.
    $result = mysqli_query($db, $query);
    if (!$result) {
        exit(mysqli_error($db));
    } else {
        // Si no tiene errores vamos recorriendo fila a fila el resultado
        // Primero guardamos el resultado de la primera fila como un array en la variable $fila
        $fila = mysqli_fetch_assoc($result);

        // Mientras la variable $fila tiene datos válidos:
        while ($fila) {
            // Creamos un objeto cliente con sus atributos que tenemos de resultado de la fila de la consulta
            $pedido = new pedido();
            $pedido->setId($fila['id']);
            $pedido->crearPedido($fila['total'], $fila['fecha'], $fila['id_cliente'], $fila['id_comercial']);

            // Añadimos ese objeto a un array. Ese array en la variable $data va a ser un array de objetos cliente
            $data[] = $pedido;

            // Guardamos en la variable el resultado de la siguiente fila
            $fila = mysqli_fetch_assoc($result);
        }
    }
    // Liberar el conjunto de resultados (recomendable sólo cuando hacemos un select)
    mysqli_free_result($result);

    // Cerramos conexión con la Base de Datos
    mysqli_close($db);

    // Devolvemos ese array de objetos para poder hacer con esos datos lo que queramos
    return $data;
}

// ******************** Función mostrarGastosPorCiudad ***********************

function mostrarGastosPorCiudad()
{
    include("db_connection.php");

    include_once("comercial.php");

    $data = array();

    $query = "SELECT ciudad, SUM(total) AS beneficios FROM cliente JOIN pedido ON cliente.id = pedido.id_cliente GROUP BY ciudad ORDER BY beneficios DESC;";

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

function mostrarPedidosFechas()
{
    include("db_connection.php");

    include_once("comercial.php");

    $data = array();

    $query = "SELECT COUNT(pedido.id) AS cantidad_pedidos, cliente.nombre AS nombre_cliente, comercial.nombre AS nombre_comercial, pedido.fecha
FROM pedido JOIN comercial ON pedido.id_comercial = comercial.id
JOIN cliente ON cliente.id = pedido.id_comercial
GROUP BY comercial.nombre;";

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