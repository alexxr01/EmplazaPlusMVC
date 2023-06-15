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
        $query = "SELECT u.usuario, e.nombre, r.fecha_hora, r.precio, r.anotaciones
        FROM usuarios u 
        JOIN reservas r ON u.id = r.id_usuario
        JOIN emplazamientos e ON r.id_emplazamiento = e.id
        WHERE r.fecha_hora > CURDATE() && u.usuario = :usuario";

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
        $query = "SELECT u.usuario, e.nombre, r.fecha_hora, r.precio, r.anotaciones
        FROM usuarios u 
        JOIN reservas r ON u.id = r.id_usuario
        JOIN emplazamientos e ON r.id_emplazamiento = e.id
        WHERE r.fecha_hora < CURDATE() && u.usuario = :usuario";

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
        $fechaHoraReserva = $data['fechaHoraReserva'];
        $anotaciones = $data['anotaciones'];

        // Comprobamos si la reserva ya existe
        $query = "SELECT COUNT(*) as count FROM reservas WHERE id_emplazamiento = (SELECT id FROM emplazamientos WHERE nombre = :nombreEmplazamiento) AND fecha_hora = :fechaHoraReserva";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':nombreEmplazamiento' => $nombreEmplazamiento, ':fechaHoraReserva' => $fechaHoraReserva));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result['count'] > 0) {
            // La fecha y hora de reserva ya está ocupada, muestra un mensaje de error
            echo "<br><b><center>La fecha y hora ya se encuentra en uso.</center></b>";
            echo "<center>Prueba a cambiar la hora o el día.</center>";
            if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {
                header("refresh: 3; url=" . $_SERVER['HTTP_REFERER']);
            } else {
                // Si la URL de referencia no está disponible, redirigir a una página predeterminada o realizar alguna otra acción.
                header("refresh: 3; url='index'"); // Ejecución
            }            
            return;

        } else {
            $query = "INSERT INTO reservas (id_usuario, id_emplazamiento, fecha_hora, precio, anotaciones)
            VALUES (
                (SELECT id FROM usuarios WHERE usuario = :usuario),
                (SELECT id FROM emplazamientos WHERE nombre = :nombreEmplazamiento),
                :fechaHoraReserva, -- fecha y hora de la reserva
                :precio, -- precio de la reserva
                :anotaciones -- anotacion aportada por el usuario
            )";

            $stmt = $this->db->prepare($query);
            $stmt->execute(array(':usuario' => $_SESSION['usuario'], ':nombreEmplazamiento' => $nombreEmplazamiento, ':fechaHoraReserva' => $fechaHoraReserva, ':precio' => $precio, ':anotaciones' => $anotaciones));
        
            // En caso correcto enviamos un mensaje.
            echo "<br><b><center>La reserva se ha realizado correctamente.</center></b>";
            echo "<center>Te enviaremos al panel de usuario.</center>";
            // Redireccionar al principio.
            header("refresh: 3; url='panel'"); // Ejecución
        }
    }


}

?>