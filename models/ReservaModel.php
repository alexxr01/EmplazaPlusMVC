<?php
class ReservaModel {
    private $db;
    public function __construct() {
    // Traemos la única instancia de PDO
    $this->db = SPDO::singleton();
    }

    /*
    Función que nos permite consultas todas las reservas que el usuario
    tiene pendiente en un futuro.
    */
    public function consultarReservasFuturas() {
        $query = "SELECT u.usuario, e.nombre, r.fecha_alta, r.fecha_baja, r.precio
        FROM usuarios u 
        JOIN reservas r ON u.id = r.id_usuario
        JOIN emplazamientos e ON r.id_emplazamiento = e.id
        WHERE r.fecha_alta > CURDATE() && u.usuario = :usuario";

        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':usuario' => $_SESSION['usuario']));

        $reservas = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $reservas[] = $row;
        }
        return $reservas;
    }

    /*
    Función que nos permite consultar todas las reservas que un usuario
    ya ha reservado en un pasado en el sistema.
    */
    public function consultarReservasPasadas() {
        $query = "SELECT u.usuario, e.nombre, r.fecha_alta, r.fecha_baja, r.precio
        FROM usuarios u 
        JOIN reservas r ON u.id = r.id_usuario
        JOIN emplazamientos e ON r.id_emplazamiento = e.id
        WHERE r.fecha_alta < CURDATE() && u.usuario = :usuario";

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