<?php
class CuentaModel {

    private $db;
    public function __construct() {
        // Traemos la única instancia de PDO
        $this->db = SPDO::singleton();
    }

    /*
    Función para el logueo de un usuario existente.
    Consulta la BBDD y valida los datos proporcionados.
    */
    public function iniciarsesion($correo) {
        $query = "SELECT * FROM usuarios WHERE correo = :correo";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':correo' => $correo));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /*
    Función para el registro de un nuevo usuario.
    Ejecuta una consulta en la BBDD y añade un nuevo usuario.
    */
    public function registrar($data) {
        $usuario = $data['usuario'];
        $correo = $data['correo'];
        $contrasena = password_hash($data['contrasena'], PASSWORD_DEFAULT);

        // Obtenemos la fecha y hora actual
        $fechaAlta = date("Y-m-d H:i:s");

        $query = "INSERT INTO usuarios (usuario, correo, contrasena, descripcion, permisos, fecha_alta, avatar) VALUES (:usuario, :correo, :contrasena, 'Sin descripcion', 'usuario', :fecha_alta, null)";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':usuario' => $usuario, ':correo' => $correo, ':contrasena' => $contrasena, ':fecha_alta' => $fechaAlta));
    }

    /*
    Función que nos permitirá actualizar la contraseña de la cuenta de usuario
    que actualmente nos encontramos logueados.
    */
    public function reestablecer($data) {
        $correo = $data['correo'];
        $contrasenanueva = password_hash($data['contrasenanueva'], PASSWORD_DEFAULT);

        $query = "UPDATE usuarios SET contrasena=:contrasenanueva WHERE correo=:correo";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':correo' => $correo, ':contrasenanueva' => $contrasenanueva));
    }

    public function tablaMostrarUsuarios() {
        $query = "SELECT * FROM usuarios";
        $stmt = $this->db->query($query);
        $usuarios = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $usuarios[] = $row;
        }
        return $usuarios;
    }
}
?>