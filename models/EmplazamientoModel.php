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
        $query = "SELECT * FROM emplazamientos";
        $stmt = $this->db->query($query);
        $emplazamientos = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $emplazamientos[] = $row;
        }
        return $emplazamientos;
    }

    /*
    Método que nos permite obtener los detalles del emplazamiento
    en la zona de detalles, así como obtener más información.
    */
    public function obtenerDetallesEmplazamiento($idEmplazamiento) {
        $query = "SELECT * FROM emplazamientos WHERE id = :idEmplazamiento";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':idEmplazamiento' => $idEmplazamiento));
        $emplazamientos = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $emplazamientos[] = $row;
        }
        return $emplazamientos;
    }
}
?>