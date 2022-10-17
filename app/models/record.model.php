<?php

class RecordModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_discography;charset=utf8', 'root', '');
        
    }
    function getAllRecords(){                
        $query = $this->db->prepare("SELECT * FROM records");
        $query->execute();

        $records = $query->fetchAll(PDO::FETCH_OBJ);
        return $records;
    }

    public function getNameById($id){
        $query = $this->db->prepare("SELECT `records`FROM `records` WHERE `fk_records_id`= ?");
        $query->execute([$id]);
        $records = $query->fetch(PDO::FETCH_OBJ);
        return $records;
    }

    function getRegisterById($id){
        $query = $this->db->prepare("SELECT * FROM records");
        $query->execute();
        $recordsRegister = $query->fetchAll(PDO::FETCH_OBJ);
        return $recordsRegister;
    }

    public function getRegisterById2($id){
        $query = $this->db->prepare("SELECT * FROM records where `fk_records_id`=$id");
        $query->execute();
        $recordsRegister = $query->fetchAll(PDO::FETCH_OBJ);
        return $recordsRegister;
    }

    function insertRecords($records, $producer, $studio, $imagen = null) { 
        $pathImg = null;
        if ($imagen){
        $pathImg = $this->uploadImage($imagen);
        }
        $query = $this->db->prepare("INSERT INTO records (records, producer, studio, img) VALUES (?, ?, ?, ?)");
        $query->execute([$records, $producer, $studio, $pathImg]);
         return $this->db->lastInsertId();
     }

    // function insertRecords($records, $producer, $studio, $imagen=null) {
    //     $pathImg = null;
    //     if ($imagen)
    //     $pathImg = $this->uploadImage($imagen);

    //     $query = $this->db->prepare("INSERT INTO records (img, records,producer, studio) VALUES (?, ?, ?, ?)");
    //     $query->execute([$pathImg, $records, $producer, $studio]);
        
        
    //     return $this->db->lastInsertId();

    //     header("Location: " . BASE_URL. 'showRecords');
    // }


    private function uploadImage($image){
        $target = 'images/' . uniqid() . '.jpg';
        move_uploaded_file($image, $target);
        return $target;
    }

    public function insertEditRecords($records, $producer, $studio, $id){
        
        $query = $this->db->prepare("UPDATE `records` SET records=?, producer=?, studio=? WHERE fk_records_id=?");
        $query->execute([$records, $producer, $studio, $id]);

        header("Location: " . BASE_URL. 'showRecords');
    }

     function deleteRecordsById($id) {
        $query = $this->db->prepare('DELETE FROM records WHERE fk_records_id= ?');
        $query->execute([$id]);
        
        header("Location: " . BASE_URL. 'showRecords');
    }
}