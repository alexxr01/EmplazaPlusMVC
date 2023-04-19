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

        $query = "INSERT INTO usuarios (usuario, correo, contrasena, permisos, descripcion) VALUES (:usuario, :correo, :contrasena, 'null', 'null')";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':usuario' => $usuario, ':correo' => $correo, ':contrasena' => $contrasena));
    }

    /*
    Función que nos permitirá actualizar la contraseña de la cuenta de usuario
    que actualmente nos encontramos logueados.
    */
    public function reestablecer($data) {
        // ACTUALMENTE EN DESARROLLO.
        $usuario = $data['usuario'];
        $contrasenanueva = password_hash($data['contrasenanueva'], PASSWORD_DEFAULT);

        $query = "UPDATE usuarios SET contrasena=':contrasenanueva' WHERE usuario=':usuario'";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':usuario' => $usuario, ':contrasenanueva' => $contrasenanueva));
    }

    public function darBaja($data) {
        // Para desarrollar más tarde...
    }
}
?>