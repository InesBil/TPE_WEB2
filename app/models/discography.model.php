<?php

class DiscographyModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_discography;charset=utf8' , 'root', '');    
    }

    public function getAllDiscography() {       
        $query = $this->db->prepare("SELECT albums.id, albums.album, albums.year, albums.genre, albums.length, albums.img, records.fk_records_id, records.records FROM albums INNER JOIN records ON albums.id_records_fk = records.fk_records_id");
        $query->execute();
        
        $albums = $query->fetchAll(PDO::FETCH_OBJ);        
        return $albums;
    }

    function getRegisterById($id){
        $query = $this->db->prepare("SELECT * FROM albums where `id`=?");
        $query->execute([$id]);
        $albumRegister = $query->fetchAll(PDO::FETCH_OBJ);

        return $albumRegister;
    }

    public function insertAlbum($album, $year, $genre, $length, $studioOption, $imagen=null){
        $pathImg = null;
        if ($imagen){
            $pathImg = $this-> uploadImage($imagen);
        }
        $query = $this->db->prepare("INSERT INTO albums (album, year, genre, length, id_records_fk, img) VALUES (?, ?, ?, ?, ?, ? )");
        $query->execute([$album, $year, $genre, $length, $studioOption, $pathImg]);
         
         return $this->db->lastInsertId();
    }

    private function uploadImage($image){
        $target = 'images/' . uniqid() . '.jpg';
        move_uploaded_file($image, $target);
        return $target;
    }

    public function insertEditAlbum($album, $year, $genre, $length,$studioOption,$id){        
        $query = $this->db->prepare("UPDATE `albums` SET album=?, year=?, genre=?, length=?, id_records_fk=? WHERE id=?");
        $query->execute([$album, $year, $genre, $length, $studioOption, $id]);

    }
    
     function deleteDiscographyById($id) {
        $query = $this->db->prepare('DELETE FROM albums WHERE id = ?');
         $query->execute([$id]);

         header("Location: " . BASE_URL);
     }

    public function getFilter($id){
        $query = $this->db->prepare("SELECT * FROM albums WHERE id_records_fk = ?"); 
        $query->execute([$id]);
        $filter = $query->fetchAll(PDO::FETCH_OBJ);
        return $filter;
        
    }

}




