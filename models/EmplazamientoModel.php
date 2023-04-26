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

    public function obtenerDetallesEmplazamiento($nombreEmplazamiento) {
        $query = "SELECT * FROM emplazamientos WHERE nombre = :nombreEmplazamiento";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':nombreEmplazamiento' => $nombreEmplazamiento));
        $emplazamientos = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $emplazamientos[] = $row;
        }
        return $emplazamientos;
    }

    public function nuevoEmplazamiento($data) {
        $nombre = $data['nombre'];
        $descripcion_corta = $data['descripcion_corta'];
        $descripcion_larga = $data['descripcion_larga'];
        $categoria = $data['categoria'];
        $precio = $data['precio'];

        $query = "INSERT INTO emplazamientos (nombre, descripcion_corta, descripcion_larga, categoria, precio) VALUES (:nombre, :descripcion_corta, :descripcion_larga, :categoria, :precio)";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':nombre' => $nombre, ':descripcion_corta' => $descripcion_corta, ':descripcion_larga' => $descripcion_larga, ':categoria' => $categoria, ':precio' => $precio));
    }
}
?>