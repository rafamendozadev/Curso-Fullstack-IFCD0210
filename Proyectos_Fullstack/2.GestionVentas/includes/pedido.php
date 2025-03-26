<?php

class pedido
{
    // Atributos privados de la clase comercial
    private $id;
    private $total;
    private $fecha;
    private $id_cliente;
    private $id_comercial;

    // Método para crear un objeto pedido que tenga asignados los datos necesarios.
    function crearPedido($total, $fecha, $id_cliente, $id_comercial)
    {
        $this->total = $total;
        $this->fecha = $fecha;
        $this->id_cliente = $id_cliente;
        $this->id_comercial = $id_comercial;
    }

    // Método para insertar a un pedido en la base de datos
    function insertar()
    {
        // Abrimos conexión con la base de datos
        include("db_connection.php");

        // Guardamos en una variable la sentencia SQL que queremos realizar
        $query = "INSERT INTO pedido(total,fecha,id_cliente,id_comercial) VALUES ('" . $this->total . "','" . $this->fecha . "','" . $this->id_cliente . "','" . $this->id_comercial . "');";

        // Como se trata de una sentencia que no devuelve un resultado, simplemente comprobamos si es null o false
        // Si es null o false significa que tiene un error, entonces mostramos con la función exit qué error dió.
        if (!mysqli_query($db, $query)) {
            exit(mysqli_error($db));
        }

        // Cerramos conexión con la Base de Datos
        mysqli_close($db);

        return $query;
    }


    // Método para mostrar la información de un pedido concreto a través de su id
    function obtenerPedido()
    {
        // Abrimos conexión con la base de datos
        include("db_connection.php");

        $query = "SELECT * FROM pedido WHERE id=" . $this->id;

        // En esta condición comprobamos si el resultado de la sentencia es null o false, si es así devolvemos el error, sino rellenamos los atributos restantes del objeto
        if (!$result = mysqli_query($db, $query)) {
            exit(mysqli_error($db));
        } else {
            $fila = mysqli_fetch_assoc($result);
                $this->id = $fila['id'];
                $this->total = $fila['total'];
                $this->fecha = $fila['fecha'];
                $this->id_cliente = $fila['id_cliente'];
                $this->id_comercial = $fila['id_comercial'];
        }
        // Liberar el conjunto de resultados (recomendable sólo cuando hacemos un select)
        mysqli_free_result($result);

        // Cerramos conexión con la Base de Datos
        mysqli_close($db);

        return $data;
    }

    // Getters y Setters de cada atributo de la clase.

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of total
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the value of total
     *
     * @return  self
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get the value of fecha
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of id_cliente
     */
    public function getId_cliente()
    {
        return $this->id_cliente;
    }

    /**
     * Set the value of id_cliente
     *
     * @return  self
     */
    public function setId_cliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;

        return $this;
    }

        /**
     * Get the value of id_comercial
     */
    public function getId_comercial()
    {
        return $this->id_comercial;
    }

    /**
     * Set the value of id_comercial
     *
     * @return  self
     */
    public function setId_comercial($id_comercial)
    {
        $this->id_comercial = $id_comercial;

        return $this;
    }


}
