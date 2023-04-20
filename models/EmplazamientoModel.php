<?php
class EmplazamientoModel {

    private $db;
    public function __construct() {
        // Traemos la única instancia de PDO
        $this->db = SPDO::singleton();
    }

    /*
    Función que nos permitirá mostrar toda la lista de emplazamientos
    disponibles en el inicio de la web.
    */
    public function obtenerEmplazamientos() {
        $query = "SELECT * FROM emplazamiento";
        $stmt = $this->db->query($query);
        $emplazamientos = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $emplazamientos[] = $row;
        }
        return $emplazamientos;
    }
}
?>