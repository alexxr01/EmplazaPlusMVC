<?php
//require 'phpo/Usuario.php';
class UsuarioModel {

    private $db;
    public function __construct() {
        // Traemos la única instancia de PDO
        //$this->db = SPDO::singleton();

        $this->db = new mysqli('localhost', 'root', '', 'emplazaplus');
            if ($this->db->connect_errno) {
            die("Error al conectar a la base de datos: " . $this->db->connect_error);
        }
    }

    /*
    Modelo para el logueo de un usuario existente.
    Consulta la BBDD y valida los datos proporcionados.
    */
    public function iniciarsesion($usuario, $contrasena) {
        $result = null;
        try {
            // Realizamos la consulta de todos los items
            $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE usuario = ?");
            $stmt->execute([$usuario]);
            $stmt->execute([$contrasena]);
            $stmt->setFetchMode(PDO::FETCH_CLASS, "Usuario");
            $usuario = $stmt->fetch();

        } catch(PDOException $pdoe) {
            echo $pdoe;
        }
        // Devolvemos la colección para que la vista la presente.
        return $usuario;
    }

    /*
    Modelo para el registro de un nuevo usuario.
    Ejecuta una consulta en la BBDD y añade un nuevo usuario.
    */
    public function registrar($data) {
        $usuario = $this->db->real_escape_string($data['usuario']);
        $correo = $this->db->real_escape_string($data['correo']);
        $contrasena = password_hash($data['contrasena'], PASSWORD_DEFAULT);

        $consultaRegistro = "INSERT INTO usuarios (usuario, correo, contrasena, permisos, descripcion) VALUES ('$usuario', '$correo', '$contrasena', 'null', 'null')";
            
        if (!$this->db->query($consultaRegistro)) {
            die("El usuario no se ha podido registrar: " . $this->db->error);
        }
    }
}
?>