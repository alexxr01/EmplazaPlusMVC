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
        JOIN emplazamientos e ON r.id_emplazamiento = e.id
        WHERE u.usuario = :usuario";

        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':usuario' => $_SESSION['usuario']));

        $reservas = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $reservas[] = $row;
        }
        return $reservas;
    }

    /*
    Método que nos permite realizar la consulta necesaria para realizar la reserva
    obteniendo los datos necesarios de la pestaña de pagos.
    */
    public function realizarReserva($data) {
        $nombreEmplazamiento = $data['nombreEmplazamiento'];
        $precio = $data['precio'];
        $fechaReserva = $data['fechaReserva'];

        $query = "INSERT INTO reservas (id_usuario, id_emplazamiento, fecha_alta, fecha_baja, precio)
        VALUES (
          (SELECT id FROM usuarios WHERE usuario = :usuario),
          (SELECT id FROM emplazamientos WHERE nombre = :nombreEmplazamiento),
          :fechaAlta, -- fecha de inicio de la reserva
          :fechaBaja, -- fecha de fin de la reserva
          :precio -- precio de la reserva
        )";

        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':usuario' => $_SESSION['usuario'], ':nombreEmplazamiento' => $nombreEmplazamiento, ':fechaAlta' => $fechaReserva, ':fechaBaja' => $fechaReserva, ':precio' => $precio));
    }


}

?>