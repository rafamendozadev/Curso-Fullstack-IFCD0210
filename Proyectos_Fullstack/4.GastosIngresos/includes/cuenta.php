<link rel='stylesheet' href='./css/style.css'>

<?php

class Cuenta
{
    private $id;
    private $nombre;
    private $iban;
    private $saldoInicial;
    private $idUsuario;

    function rellenarCuenta($nombre, $iban, $saldoInicial, $idUsuario)
    {
        $this->nombre = $nombre;
        $this->iban = $iban;
        $this->saldoInicial = $saldoInicial;
        $this->idUsuario = $idUsuario;
    }

    function insertarCuenta()
    {
        include("db_connection.php");

        $query = "INSERT INTO `cuenta`(`nombre`, `iban`, `saldo_inicial`, `id_usuario`) VALUES ('" . $this->nombre . "','" . $this->iban . "','" . $this->saldoInicial . "','" . $this->idUsuario . "');";

        if (!mysqli_query($db, $query)) {
            exit(mysqli_error($db));
        }

        mysqli_close($db);

        return $query;
    }

    function eliminarCuenta($id)
    {
        include("db_connection.php");

        $id = intval($this->id);
        $query = "DELETE FROM cuenta WHERE id = $id";

        if (!mysqli_query($db, $query)) {
            exit(mysqli_error($db));
        }

        mysqli_close($db);
        return $query;
    }

    function verificarCuenta()
    {
        include("db_connection.php");

        $nombre = $_POST['nombre'];

        $query = "SELECT COUNT(id) AS count FROM cuenta WHERE nombre = '$nombre'";

        if (!mysqli_query($db, $query)) {
            exit(mysqli_error($db));
        }

        $result = mysqli_query($db, $query);

        $fila = mysqli_fetch_assoc($result);
        $count = $fila['count'];

        if ($count > 0) {
            header("Location: ../registrar_cuenta.php?incorrecto=true");
            exit();

            mysqli_close($db);

            return $count;
        }
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
     * Get the value of iban
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * Set the value of iban
     *
     * @return  self
     */
    public function setIban($iban)
    {
        $this->iban = $iban;

        return $this;
    }

    /**
     * Get the value of saldo
     */
    public function getSaldoInicial()
    {
        return $this->saldoInicial;
    }

    /**
     * Set the value of saldo
     *
     * @return  self
     */
    public function setSaldoInicial($saldoInicial)
    {
        $this->saldoInicial = $saldoInicial;

        return $this;
    }

    /**
     * Get the value of idUsuario
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set the value of idUsuario
     *
     * @return  self
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }
}
