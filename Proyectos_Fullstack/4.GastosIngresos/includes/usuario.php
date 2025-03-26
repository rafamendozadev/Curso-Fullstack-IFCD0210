<link rel='stylesheet' href='../css/style.css'>

<?php

class Usuario
{
    private $id;
    private $nombre;
    private $correo;
    private $clave;
    private $nombreImagen;
    private $imagen;
    private $tipoImagen;

    function rellenarUsuario($id, $nombre, $correo, $clave, $imagen, $nombreImagen, $tipoImagen)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->clave = $clave;
        $this->imagen = $imagen;
        $this->nombreImagen = $nombreImagen;
        $this->tipoImagen = $tipoImagen;
    }

    function insertarUsuario()
    {
        include("db_connection.php");

        $query = "INSERT INTO `usuario`(`nombre`, `correo`, `clave`, `nombre_imagen`, `imagen`, `tipo_imagen`) VALUES ('" . $this->nombre . "','" . $this->correo . "','" . $this->clave . "','" . $this->nombreImagen . "','" . $this->imagen . "','" . $this->tipoImagen . "');";

        if (!mysqli_query($db, $query)) {
            exit(mysqli_error($db));
        }

        mysqli_close($db);
        return $query;
    }

    function eliminarUsuario()
    {
        include("db_connection.php");

        $query = "DELETE FROM usuario WHERE id = '$this->id'";

        if (!mysqli_query($db, $query)) {
            exit(mysqli_error($db));
        }

        mysqli_close($db);
        return $query;
    }

    function verificarCorreo()
    {
        include("db_connection.php");

        $correo = $_POST['correo'];

        $query = "SELECT COUNT(id) AS count FROM usuario WHERE correo = '$correo'";

        if (!mysqli_query($db, $query)) {
            exit(mysqli_error($db));
        }

        $result = mysqli_query($db, $query);

        $fila = mysqli_fetch_assoc($result);
        $count = $fila['count'];

        if ($count > 0) {
            header("Location: ../registrar_usuario.php?incorrecto=true");
            exit();

            mysqli_close($db);
            return $count;
        }
    }

    function modificarUsuario()
    {
        include("db_connection.php");

        $modificarClave = "";

        if ($this->clave <> '') {
            $modificarClave = ",clave = '$this->clave'";
        }

        $modificarFoto = "";

        if ($this->nombreImagen <> '') {
            $modificarFoto = ",`nombre_imagen`='$this->nombreImagen' ,`imagen`='$this->imagen' ,`tipo_imagen`='$this->tipoImagen'";
        }

        $query = "UPDATE `usuario` SET `nombre`='$this->nombre',`correo`='$this->correo' $modificarClave $modificarFoto WHERE `id`='$this->id';";

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
     */
    public function setId($id): self
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
     */
    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of correo
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set the value of correo
     */
    public function setCorreo($correo): self
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get the value of clave
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * Set the value of clave
     */
    public function setClave($clave): self
    {
        $this->clave = $clave;

        return $this;
    }

    /**
     * Get the value of nombreImagen
     */
    public function getNombreImagen()
    {
        return $this->nombreImagen;
    }

    /**
     * Set the value of nombreImagen
     */
    public function setNombreImagen($nombreImagen): self
    {
        $this->nombreImagen = $nombreImagen;

        return $this;
    }

    /**
     * Get the value of imagen
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     */
    public function setImagen($imagen): self
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get the value of tipoImagen
     */
    public function getTipoImagen()
    {
        return $this->tipoImagen;
    }

    /**
     * Set the value of tipoImagen
     */
    public function setTipoImagen($tipoImagen): self
    {
        $this->tipoImagen = $tipoImagen;

        return $this;
    }
}
