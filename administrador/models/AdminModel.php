<?php
class AdminModel {

    private $db;
    public function __construct() {
        // Traemos la única instancia de PDO
        $this->db = SPDO::singleton();
    }

    /*
    Función para el logueo de un usuario existente.
    Consulta la BBDD y valida los datos proporcionados.
    */
    public function iniciarsesionAdministrador($correo) {
        $query = "SELECT * FROM usuarios WHERE correo = :correo";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':correo' => $correo));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /* FUNCIÓN QUE NOS PERMITE MOSTRAR TODOS LOS USUARIOS EN FORMATO TABLA */
    public function tablaMostrarUsuarios() {
        $query = "SELECT * FROM usuarios";
        $stmt = $this->db->query($query);
        $usuarios = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $usuarios[] = $row;
        }
        return $usuarios;
    }

    /* FUNCIÓN QUE NOS PERMITE ELIMINAR EL USUARIO QUE QUEREMOS */
    public function eliminarUsuario($data) {
        $id = $data['id'];

        // Finalizamos con la consulta preparada
        $query = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':id' => $id));
    }

    /* FUNCIÓN QUE NOS PERMITE MOSTRAR TODOS LOS EMPLAZAMIENTOS EN UNA TABLA */
    public function tablaEmplazamientos() {
        $query = "SELECT * FROM emplazamientos";
        $stmt = $this->db->query($query);
        $emplazamientos = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $emplazamientos[] = $row;
        }
        return $emplazamientos;
    }

    /* FUNCIÓN QUE NOS PERMITE EDITAR EMPLAZAMIENTO DESDE EL PANEL */
    public function editarUsuario($data) {
        $id = $data['id'];
        $usuario = $data['usuario'];
        $correo = $data['correo'];
        $contrasena = password_hash($data['contrasena'], PASSWORD_DEFAULT);
        $descripcion = $data['descripcion'];
        $permisos = $data['permisos'];

        // Continuamos y finalizamos con la inserción de los datos

        // Comprobamos si la contraseña también se actualiza, ya que no es obligatoria y muchas veces el
        // usuario quiere conservar la que puso desde un principio.

        // Si está vacía se realiza lo siguiente, es decir, el campo contraseña no se tocaría:
        if (empty($contrasena)) {
            $query = "UPDATE usuarios SET usuario = :usuario, correo = :correo, descripcion = :descripcion, permisos = :permisos WHERE id = :id;";
            $stmt = $this->db->prepare($query);
            $stmt->execute(array(':usuario' => $usuario, ':correo' => $correo, ':descripcion' => $descripcion, ':permisos' => $permisos, ':id' => $id));
        } else {
            // Si no está vacía porque se haya rellenado, se realiza la siguiente consulta:
            $query = "UPDATE usuarios SET usuario = :usuario, correo = :correo, contrasena = :contrasena, descripcion = :descripcion, permisos = :permisos WHERE id = :id;";
            $stmt = $this->db->prepare($query);
            $stmt->execute(array(':usuario' => $usuario, ':correo' => $correo, ':contrasena' => $contrasena, ':descripcion' => $descripcion, ':permisos' => $permisos, ':id' => $id));
        }
    }

    /* FUNCIÓN QUE NOS PERMITE REGISTRAR UN NUEVO EMPLAZAMIENTO DESDE EL PANEL */
    public function nuevoEmplazamiento($data) {
        $nombre = $data['nombre'];
        $descripcion_corta = $data['descripcion_corta'];
        $descripcion_larga = $data['descripcion_larga'];
        $categoria = $data['categoria'];
        $precio = $data['precio'];

        // Gestionamos la imagen a insertar en la BBDD
        if ($_FILES["imagen"]["error"] === UPLOAD_ERR_OK) {
            $imagen = $_FILES['imagen']['tmp_name'];
            $comprobacion = getimagesize($imagen);

            // Si la comprobacion es correcta, realizamos lo siguiente:
            if ($comprobacion !== false) {
                // Cargamos el contenido de la imagen
                $contenidoImagen = file_get_contents($imagen);
                // Generamos una variable que almacenará la fecha y hora actual
                $fechaCreacion = date("Y-m-d H:i:s");

                // Continuamos y finalizamos con la inserción de los datos
                $query = "INSERT INTO emplazamientos (nombre, descripcion_corta, descripcion_larga, categoria, precio, fecha_registro, imagenes) VALUES (:nombre, :descripcion_corta, :descripcion_larga, :categoria, :precio, :fecha_registro, :imagenes)";
                $stmt = $this->db->prepare($query);
                $stmt->execute(array(':nombre' => $nombre, ':descripcion_corta' => $descripcion_corta, ':descripcion_larga' => $descripcion_larga, ':categoria' => $categoria, ':precio' => $precio, ':fecha_registro' => $fechaCreacion, ':imagenes' => $contenidoImagen));
            }
        }        
    }

    /*
    Función que nos permite consultar toda la lista de reservas realizadas.
    */
    public function consultarTotalReservas() {
        $query = "SELECT r.id, u.usuario, e.nombre, r.fecha_alta, r.fecha_baja, r.precio
        FROM usuarios u 
        JOIN reservas r ON u.id = r.id_usuario
        JOIN emplazamientos e ON r.id_emplazamiento = e.id";

        $stmt = $this->db->query($query);

        $reservas = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $reservas[] = $row;
        }
        return $reservas;
    }

    /* FUNCIÓN QUE NOS PERMITE EDITAR EMPLAZAMIENTO DESDE EL PANEL */
    public function editarEmplazamiento($data) {
        $id = $data['id'];
        $nombre = $data['nombre'];
        $descripcion_corta = $data['descripcion_corta'];
        $descripcion_larga = $data['descripcion_larga'];
        $categoria = $data['categoria'];
        $precio = $data['precio'];

        // Continuamos y finalizamos con la inserción de los datos
        $query = "UPDATE emplazamientos SET nombre = :nombre, descripcion_corta = :descripcion_corta, descripcion_larga = :descripcion_larga, categoria = :categoria, precio = :precio WHERE id = :id;";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':nombre' => $nombre, ':descripcion_corta' => $descripcion_corta, ':descripcion_larga' => $descripcion_larga, ':categoria' => $categoria, ':precio' => $precio, ':id' => $id));     
    }

    /* FUNCIÓN QUE NOS PERMITE ELIMINAR EL EMPLAZAMIENTO QUE QUEREMOS */
    public function eliminarEmplazamiento($data) {
        $id = $data['id'];

        // Finalizamos con la consulta preparada
        $query = "DELETE FROM emplazamientos WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':id' => $id));
    }
}
?>