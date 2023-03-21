<?php
class Sesion {
    public $id;
    public $token;
    public $fecha_concesion;
    public $expira;

    public function __construct() {
    }

    // ID
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }
    // Token
    public function setToken($token)
    {
        $this->token = $token;
    }
    public function getToken()
    {
        return $this->token;
    }
    // Fecha Concesion
    public function setFechaConcesion($fecha_concesion)
    {
        $this->fecha_concesion = $fecha_concesion;
    }
    public function getFechaConcesion()
    {
        return $this->fecha_concesion;
    }
    // Expira
    public function setExpira($expira)
    {
        $this->expira = $expira;
    }
    public function getExpira()
    {
        return $this->expira;
    }

}
?>