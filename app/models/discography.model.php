<?php

class DiscographyModel {

    private $db;
    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_discography;charset=utf8', 'root', '');       
    }

    /**
     * Devuelve la lista de tareas completa.
     */
    public function getAllDiscography() {
        // 1. abro conexión a la DB
        // ya esta abierta por el constructor de la clase
        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT * FROM albums");
        $query->execute();

        // 3. obtengo los resultados
        $albums = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $albums;
    }

    function getRegisterAlbumById($id){
        $query = $this->db->prepare("SELECT * FROM albums where `id`=$id");
        $query->execute();
        $albumRegister = $query->fetchAll(PDO::FETCH_OBJ);
        return $albumRegister;
    }

     /**
      * Inserta una tarea en la base de datos.
      */
     public function insertAlbum($album, $year, $genre, $length, $imagen=null ) {
        $pathImg = null;
        if ($imagen)
        $pathImg = $this->uploadImage($imagen);

        $query = $this->db->prepare("INSERT INTO albums (album, year, genre, length) VALUES (?, ?, ?,?, ?)");
        $query->execute([$album, $year, $genre, $length, $pathImg]);
        
        header("Location: " . BASE_URL . 'album');         
         return $this->db->lastInsertId();
     }

     private function uploadImage($image){
        $target = 'images' . uniqid() . '.jpg';
        move_uploaded_file($image, $target);
        return $target;
    }


     /**
      * Elimina una tarea dado su id.
      */
     function deleteDiscographyById($id) {
        $query = $this->db->prepare('DELETE FROM albums WHERE id = ?');
         $query->execute([$id]);
     }

    public function finalize($id) {
        $query = $this->db->prepare('UPDATE task SET finalizada = 1 WHERE id = ?');
        $query->execute([$id]);
         // var_dump($query->errorInfo()); // y eliminar la redireccion
    }
}

