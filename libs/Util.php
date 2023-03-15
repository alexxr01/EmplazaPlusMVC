<?php
class Util{
    public static function subirImagenEmplazamiento():string{
        if(isset($_POST["submit"])){
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false){
                $image = $_FILES['image']['tmp_name'];
                $imgContent = addslashes(file_get_contents($image));
                //Traemos la única instancia de PDO
                $this->db = SPDO::singleton();
                $dataTime = date("Y-m-d H:i:s");
                $stmt = $this->db->prepare("INSERT INTO emplazamiento (image, created)
                VALUES ('$imgContent', '$dataTime')");
                $result = $stmt->execute();
                if($result){
                    return "Se ha subido la imagen correctamente!";
                }else{
                    return  "Error al subir la imagen!";
                } 
            }else{
                return  "Seleccione una imagen a subir";
            }
        }
    }
}
?>