<?php

class Gallina
{
    private $id;
    private $nombre;
    private $fechaNacimiento;
    private $nombreRaza;

    function crearGallina($nombre, $fechaNacimiento, $nombreRaza)
    {
        $this->nombre = $nombre;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->nombreRaza = $nombreRaza;
    }

    function insertar()
    {
        include("db_connection.php");

        $query = "INSERT INTO gallina(`nombre`, `fecha_nacimiento`, `nombre_raza`) VALUES ('" . $this->nombre . "','" . $this->fechaNacimiento . "','" . $this->nombreRaza . "');";

        if (!mysqli_query($db, $query)) {
            exit(mysqli_error($db));
        }

        mysqli_close($db);

        return $query;
    }

    function borrar()
    {
        include("db_connection.php");

        $query = "DELETE FROM gallina WHERE id = '$this->id'";

        if (!mysqli_query($db, $query)) {
            exit(mysqli_error($db));
        }

        mysqli_close($db);

        return $query;
    }

    function obtenerGallina()
    {
        include("db_connection.php");

        $query = "SELECT * FROM gallina WHERE id=" . $this->id;

        if (!$result = mysqli_query($db, $query)) {
            exit(mysqli_error($db));
        } else {
            $fila = mysqli_fetch_assoc($result);
            $this->nombre = $fila['nombre'];
            $this->fechaNacimiento = $fila['fecha_nacimiento'];
            $this->nombreRaza = $fila['nombre_raza'];
        }
        mysqli_free_result($result);

        mysqli_close($db);

        return $data;
    }

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
     * Get the value of fechaNacimiento
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * Set the value of fechaNacimiento
     *
     * @return  self
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    /**
     * Get the value of nombreRaza
     */
    public function getNombreRaza()
    {
        return $this->nombreRaza;
    }

    /**
     * Set the value of nombreRaza
     *
     * @return  self
     */
    public function setNombreRaza($nombreRaza)
    {
        $this->nombreRaza = $nombreRaza;

        return $this;
    }
}
