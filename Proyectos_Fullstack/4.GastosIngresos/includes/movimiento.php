<link rel='stylesheet' href='../css/style.css'>

<?php

class Movimiento
{
    private $id;
    private $tipo;
    private $cantidad;
    private $fechaHora;
    private $concepto;
    private $cuenta;
    private $categoria;

    function rellenarMovimiento($tipo, $cantidad, $fechaHora, $concepto, $cuenta, $categoria)
    {
        $this->tipo = $tipo;
        $this->cantidad = $cantidad;
        $this->fechaHora = $fechaHora;
        $this->concepto = $concepto;
        $this->cuenta = $cuenta;
        $this->categoria = $categoria;
    }

    function insertarMovimiento()
    {
        include("db_connection.php");

        $query = "INSERT INTO `movimiento`(`tipo`, `cantidad`, `fecha_hora`, `concepto`, `id_cuenta`, `id_categoria`) VALUES ('" . $this->tipo . "','" . $this->cantidad . "','" . $this->fechaHora . "','" . $this->concepto . "','" . $this->cuenta . "','" . $this->categoria . "');";

        if (!mysqli_query($db, $query)) {
            exit(mysqli_error($db));
        }

        mysqli_close($db);
        return $query;
    }

    // function modificarMovimiento($id, $fecha_hora, $nombre_cuenta, $nombre_categoria, $tipo, $cantidad) {
    //     include("db_connection.php");
        
    //     $query = "UPDATE movimiento SET 
    //                 fecha_hora = '$fecha_hora', 
    //                 nombre_cuenta = '$nombre_cuenta', 
    //                 nombre_categoria = '$nombre_categoria',
    //                 tipo = '$tipo', 
    //                 cantidad = '$cantidad' 
    //               WHERE id = $id";

    //     if (mysqli_query($db, $query)) {
    //         mysqli_close($db);
    //         return true;
    //     } else {
    //         mysqli_close($db);
    //         return false;
    //     }

    function modificarMovimiento($id)
    {
        include("db_connection.php");

        $query = "UPDATE `movimiento` SET 
                  `tipo` = '" . $this->tipo . "', 
                  `cantidad` = '" . $this->cantidad . "', 
                  `fecha_hora` = '" . $this->fechaHora . "', 
                  `concepto` = '" . $this->concepto . "', 
                  `id_cuenta` = '" . $this->cuenta . "', 
                  `id_categoria` = '" . $this->categoria . "' 
                  WHERE `id` = '" . $id . "'";
                  
        if (!mysqli_query($db, $query)) {
            exit(mysqli_error($db));
        }

        mysqli_close($db);
        return $query;
    }

    function eliminarMovimiento($id)
    {
        include("db_connection.php");

        $query = "DELETE FROM movimiento WHERE id = $id";

        if (!mysqli_query($db, $query)) {
            exit(mysqli_error($db));
        }

        mysqli_close($db);
        return $query;
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
     * Get the value of tipo
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @return  self
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

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

    /**
     * Get the value of fechaHora
     */
    public function fechaHora()
    {
        return $this->fechaHora;
    }

    /**
     * Set the value of fechaHora
     *
     * @return  self
     */
    public function setfechaHora($fechaHora)
    {
        $this->fechaHora = $fechaHora;

        return $this;
    }

    /**
     * Get the value of concepto
     */
    public function getConcepto()
    {
        return $this->concepto;
    }

    /**
     * Set the value of concepto
     *
     * @return  self
     */
    public function setConcepto($concepto)
    {
        $this->concepto = $concepto;

        return $this;
    }

    /**
     * Get the value of cuenta
     */
    public function getCuenta()
    {
        return $this->cuenta;
    }

    /**
     * Set the value of cuenta
     *
     * @return  self
     */
    public function setCuenta($cuenta)
    {
        $this->cuenta = $cuenta;

        return $this;
    }

    /**
     * Get the value of categoria
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set the value of categoria
     *
     * @return  self
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }
}
