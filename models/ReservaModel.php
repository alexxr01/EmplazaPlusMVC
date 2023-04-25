<?php
class ReservaModel {
    private $db;
    public function __construct() {
    // Traemos la única instancia de PDO
    $this->db = SPDO::singleton();
    }

    /*
    Función que nos permite consultar toda la lista de reservas que
    se ha realizado por parte del usuario que se encuentra logueado.
    */
    public function consultarReservas() {
        
        $query = "SELECT u.usuario, e.nombre, r.fecha_alta, r.fecha_baja, r.precio
        FROM usuarios u 
        JOIN reservas r ON u.id = r.id_usuario
        JOIN emplazamiento e ON r.id_emplazamiento = e.id
        WHERE u.usuario = :usuario";

        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':usuario' => $_SESSION['usuario']));

        $reservas = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $reservas[] = $row;
        }
        return $reservas;
    }


}

?>