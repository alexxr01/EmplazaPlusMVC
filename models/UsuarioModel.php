<?php
require 'phpo/Usuario.php';
class UsuarioModel {

    protected $db;
    public function __construct() {
        //Traemos la única instancia de PDO
        $this->db = SPDO::singleton();
    }

    /*
    Modelo para el logueo de un usuario existente.
    Consulta la BBDD y valida los datos proporcionados.
    */
    public function iniciarsesion($usuario, $contrasena) {
        $result = null;
        try {
            // Realizamos la consulta de todos los items
            $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE usuario = ?");
            $stmt->execute([$usuario]);
            $stmt->execute([$contrasena]);
            $stmt->setFetchMode(PDO::FETCH_CLASS, "Usuario");
            $usuario = $stmt->fetch();

        } catch(PDOException $pdoe) {
            echo $pdoe;
        }
        //devolvemos la colección para que la vista la presente.
        return $usuario;
    }

    /*
    Modelo para el registro de un nuevo usuario.
    Ejecuta una consulta en la BBDD y añade un nuevo usuario.
    */
    public function registrar($usuario, $correo, $contrasena) {
        $result = null;
        try {
            $stmt = $this->db->prepare("INSERT INTO usuarios (`usuario`, `correo`, `contrasena`, `permisos`, `descripcion`) VALUES ('$usuario', '$correo', '$contrasena', 'Prueba', 'No hay descripcion');");
            $stmt->execute([$usuario]);
            $stmt->execute([$correo]);
            $stmt->execute([$contrasena]);
            $stmt->setFetchMode(PDO::FETCH_CLASS, "Usuario");
            $usuario = $stmt->fetch();
        } catch (PDOException $pdoe) {
            echo $pdoe;
        }
    }
}
?>