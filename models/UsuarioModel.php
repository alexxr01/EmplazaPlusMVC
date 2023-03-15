<?php
require 'phpo/Usuario.php';
class UsuarioModel {

    protected $db;
    public function __construct() {
        //Traemos la única instancia de PDO
        $this->db = SPDO::singleton();
    }

    public function iniciarsesion($usuario) {
        $result = null;
        try {
            // Realizamos la consulta de todos los items
            $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE usuario = ?");
            $stmt->execute([$usuario]);
            $stmt->setFetchMode(PDO::FETCH_CLASS, "Usuario");
            $usuario = $stmt->fetch();

        } catch(PDOException $pdoe) {
            echo $pdoe;
        }
        //devolvemos la colección para que la vista la presente.
        return $usuario;
    }
}
?>