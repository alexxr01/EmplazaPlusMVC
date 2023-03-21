<?php
require 'phpo/Sesion.php';
class SesionModel {

    protected $db;
    public function __construct() {
        //Traemos la única instancia de PDO
        $this->db = SPDO::singleton();
    }

    public function insertarSesion($sesion) {
        $result = null;
        try {
            // Realizamos la consulta de todos los items
            $stmt = $this->db->prepare("INSERT INTO sesiones (`token`, `fecha_concesion`, `expira`) VALUES ('$token', '$fecha_concesion', '$expira');");
            $stmt->execute([$sesion]);
            $stmt->setFetchMode(PDO::FETCH_CLASS, "Sesion");
            $sesion = $stmt->fetch();
  
        } catch(PDOException $pdoe) {
            echo $pdoe;
        }
        //devolvemos la colección para que la vista la presente.
        return $sesion;
    }
}
?>