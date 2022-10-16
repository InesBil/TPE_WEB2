<?php

class DiscographyModel {

    private $db;
    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_discography;charset=utf8', 'root', '');       
    }

    public function getAllDiscography() {
        // 1. abro conexión a la DB
        // ya esta abierta por el constructor de la clase
        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT albums.id, albums.album, albums.album, albums.year, albums.genre, albums.length, albums.img, records.fk_records_id, records.records FROM albums INNER JOIN records ON id_records_fk = records.fk_records_id");
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

    public function addAlbum($album, $year, $genre, $length, $id_records_fk, $imagen=null ) {
        $pathImg = null;
        if ($imagen)
        $pathImg = $this->uploadImage($imagen);

        $query = $this->db->prepare("INSERT INTO albums (album, year, genre, length, id_records_fk, img) VALUES (?, ?, ?, ?, ?, ?)");
        $query->execute([$album, $year, $genre, $length, $id_records_fk, $pathImg]);
        
        header("Location: " . BASE_URL . 'showDiscography');   

        return $this->db->lastInsertId();
    }

    private function uploadImage($image){
        $target = 'images/' . uniqid() . '.jpg';
        move_uploaded_file($image, $target);
        return $target;
    }

    public function insertEditALbum($album, $year, $genre, $length, $id_records_fk, $id){        
        $query = $this->db->prepare("UPDATE `albums` SET album=?, year=?, genre=?, length=?, id_records_fk=? WHERE id=?");
        $query->execute([$album, $year, $genre, $length, $$id_records_fk, $id]);

        header("Location: " . BASE_URL. 'showDiscography');
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
    
    public function getFilter($id){
        
    }
}




