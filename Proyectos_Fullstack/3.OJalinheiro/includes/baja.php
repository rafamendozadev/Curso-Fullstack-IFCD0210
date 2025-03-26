<?php

class Baja
{
    private $idGallina;
    private $fecha;
    private $causa;

    function crearBaja($idGallina, $fecha, $causa)
    {
        $this->idGallina = $idGallina;
        $this->fecha = $fecha;
        $this->causa = $causa;
    }

    function insertar()
    {
        include("db_connection.php");

        $query = "INSERT INTO baja(id_gallina, fecha, causa) VALUES ('" . $this->idGallina . "','" . $this->fecha . "','" . $this->causa . "');";

        if (!mysqli_query($db, $query)) {
            exit(mysqli_error($db));
        }

        mysqli_close($db);

        return $query;
    }

    function borrar()
    {
        include("db_connection.php");

        $query = "DELETE FROM baja WHERE `baja`.`id_gallina` = $this->idGallina";

        if (!mysqli_query($db, $query)) {
            exit(mysqli_error($db));
        }

        mysqli_close($db);

        return $query;
    }


    function obtenerBaja()
    {
        include("db_connection.php");

        $query = "SELECT * FROM baja WHERE id_gallina=" . $this->idGallina;

        if (!$result = mysqli_query($db, $query)) {
            exit(mysqli_error($db));
        } else {
            $fila = mysqli_fetch_assoc($result);
            $this->idGallina = $fila['id_gallina'];
            $this->fecha = $fila['fecha'];
            $this->causa = $fila['causa'];
        }
        mysqli_free_result($result);

        mysqli_close($db);

        return $data;
    }

    /**
     * Get the value of idGallina
     */
    public function getIdGallina()
    {
        return $this->idGallina;
    }

    /**
     * Set the value of idGallina
     *
     * @return  self
     */
    public function setIdGallina($idGallina)
    {
        $this->idGallina = $idGallina;

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
     * Get the value of causa
     */
    public function getCausa()
    {
        return $this->causa;
    }

    /**
     * Set the value of causa
     *
     * @return  self
     */
    public function setCausa($causa)
    {
        $this->causa = $causa;

        return $this;
    }
}
