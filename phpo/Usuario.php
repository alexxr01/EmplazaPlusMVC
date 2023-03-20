<?php
class Usuario
{
    //public $id;
    public $usuario;
    public $correo;
    public $contrasena;
    public $permisos;
    public $descripcion;

    public function __construct() {}

    // ID
    /*
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }
    */
    // Usuario
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }
    public function getUsuario()
    {
        return $this->usuario;
    }
    // Correo
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }
    public function getCorreo()
    {
        return $this->correo;
    }
    // Contrasena
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }
    public function getContrasena()
    {
        return $this->correo;
    }
    // Permisos
    public function setPermisos($permisos)
    {
        $this->permisos = $permisos;
    }
    public function getPermisos()
    {
        return $this->correo;
    }
    // Descripcion
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }
}
