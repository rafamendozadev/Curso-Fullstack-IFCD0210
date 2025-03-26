<?php

class Produccion
{
    private $fechaRecogida;
    private $idGallina;
    private $cantidad;

    function crearProduccion($fechaRecogida, $idGallina, $cantidad)
    {
        $this->fechaRecogida = $fechaRecogida;
        $this->idGallina = $idGallina;
        $this->cantidad = $cantidad;
    }

    function insertar()
    {
        include("db_connection.php");

        $query = "INSERT INTO produccion(`fecha_recogida`, `id_gallina`, `cantidad`) VALUES ('" . $this->fechaRecogida . "','" . $this->idGallina . "','" . $this->cantidad . "');";

        if (!mysqli_query($db, $query)) {
            exit(mysqli_error($db));
        }

        mysqli_close($db);

        return $query;
    }

    function borrar()
{
    include("db_connection.php");

    $query = "DELETE FROM produccion WHERE fecha_recogida = '$this->fechaRecogida'";

    if (!mysqli_query($db, $query)) {
        exit(mysqli_error($db));
    }

    mysqli_close($db);

    return $query;
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
     * Get the value of fechaRecogida
     */
    public function getFechaRecogida()
    {
        return $this->fechaRecogida;
    }

    /**
     * Set the value of fechaRecogida
     *
     * @return  self
     */
    public function setFechaRecogida($fechaRecogida)
    {
        $this->fechaRecogida = $fechaRecogida;

        return $this;
    }

    /**
     * Get the value of cantidad
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set the value of cantidad
     *
     * @return  self
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }
}
