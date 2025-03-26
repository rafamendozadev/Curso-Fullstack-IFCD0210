<?php

class Raza
{
    private $nombre;
    private $descripcion;

    function crearRaza($nombre, $descripcion)
    {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }

    function insertar()
    {
        include("db_connection.php");

        $query = "INSERT INTO raza(`nombre`, `descripcion`) VALUES ('" . $this->nombre . "','" . $this->descripcion . "');";

        if (!mysqli_query($db, $query)) {
            exit(mysqli_error($db));
        }

        mysqli_close($db);

        return $query;
    }

    function borrar()
    {
        include("db_connection.php");

        $query = "DELETE FROM raza WHERE nombre = '$this->nombre'";

        if (!mysqli_query($db, $query)) {
            exit(mysqli_error($db));
        }

        mysqli_close($db);

        return $query;
    }

    function obtenerRaza()
    {
        include("db_connection.php");

        $query = "SELECT * FROM raza WHERE id=" . $this->nombre;

        if (!$result = mysqli_query($db, $query)) {
            exit(mysqli_error($db));
        } else {
            $fila = mysqli_fetch_assoc($result);
            $this->nombre = $fila['nombre'];
            $this->descripcion = $fila['descripcion'];
        }
        mysqli_free_result($result);

        mysqli_close($db);

        return $data;
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
     * Get the value of descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }
}
