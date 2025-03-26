<?php

class comercial
{
    // Atributos privados de la clase comercial
    private $id;
    private $nombre;
    private $apellido1;
    private $apellido2;
    private $comision;
    private $numeroPedidos;
    private $precioMedio;
    private $beneficios;


    // Método para crear un objeto comercial que tenga asignados los datos necesarios.
    function crearComercial($nombre, $apellido1, $apellido2, $comision = 0, $numeroPedidos = 0, $precioMedio = 0, $beneficios = 0)
    {
        $this->nombre = $nombre;
        $this->apellido1 = $apellido1;
        $this->apellido2 = $apellido2;
        $this->comision = $comision;
        $this->numeroPedidos = $numeroPedidos;
        $this->precioMedio = $precioMedio;
        $this->beneficios = $beneficios;
    }

    // Método para insertar a un comercial en la base de datos
    function insertar()
    {
        // Abrimos conexión con la base de datos
        include("db_connection.php");

        // Guardamos en una variable la sentencia SQL que queremos realizar
        $query = "insert into comercial(nombre,apellido1,apellido2,comision) values ('" . $this->nombre . "','" . $this->apellido1 . "','" . $this->apellido2 . "'," . $this->comision . ");";

        // Como se trata de una sentencia que no devuelve un resultado, simplemente comprobamos si es null o false
        // Si es null o false significa que tiene un error, entonces mostramos con la función exit qué error dió.
        if (!mysqli_query($db, $query)) {
            exit(mysqli_error($db));
        }

        // Cerramos conexión con la Base de Datos
        mysqli_close($db);

        return $query;
    }


    // Método para mostrar la información de un comercial concreto a través de su id
    function obtenerComercial()
    {
        // Abrimos conexión con la base de datos
        include("db_connection.php");

        $query = "select * FROM comercial WHERE id=" . $this->id;

        // En esta condición comprobamos si el resultado de la sentencia es null o false, si es así devolvemos el error, sino rellenamos los atributos restantes del objeto
        if (!$result = mysqli_query($db, $query)) {
            exit(mysqli_error($db));
        } else {
            $fila = mysqli_fetch_assoc($result);
                $this->nombre = $fila['nombre'];
                $this->apellido1 = $fila['apellido1'];
                $this->apellido2 = $fila['apellido2'];
                $this->comision = $fila['comision'];
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
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of apellido1
     */
    public function getApellido1()
    {
        return $this->apellido1;
    }

    /**
     * Set the value of apellido1
     *
     * @return  self
     */
    public function setApellido1($apellido1)
    {
        $this->apellido1 = $apellido1;

        return $this;
    }

    /**
     * Get the value of apellido2
     */
    public function getApellido2()
    {
        return $this->apellido2;
    }

    /**
     * Set the value of apellido2
     *
     * @return  self
     */
    public function setApellido2($apellido2)
    {
        $this->apellido2 = $apellido2;

        return $this;
    }

    /**
     * Get the value of ciudad
     */
    public function getComision()
    {
        return $this->comision;
    }

    /**
     * Set the value of ciudad
     *
     * @return  self
     */
    public function setComision($comision)
    {
        $this->comision = $comision;

        return $this;
    }

    /**
     * Get the value of numeroPedidos
     */ 
    public function getNumeroPedidos()
    {
        return $this->numeroPedidos;
    }

    /**
     * Set the value of numeroPedidos
     *
     * @return  self
     */ 
    public function setNumeroPedidos($numeroPedidos)
    {
        $this->numeroPedidos = $numeroPedidos;

        return $this;
    }

    /**
     * Get the value of precioMedio
     */ 
    public function getPrecioMedio()
    {
        return $this->precioMedio;
    }

    /**
     * Set the value of precioMedio
     *
     * @return  self
     */ 
    public function setPrecioMedio($precioMedio)
    {
        $this->precioMedio = $precioMedio;

        return $this;
    }

    /**
     * Get the value of beneficios
     */ 
    public function getBeneficios()
    {
        return $this->beneficios;
    }

    /**
     * Set the value of beneficios
     *
     * @return  self
     */ 
    public function setBeneficios($beneficios)
    {
        $this->beneficios = $beneficios;

        return $this;
    }
}
