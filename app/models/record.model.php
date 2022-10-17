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

    function getRegisterRecordsById($id){
        $query = $this->db->prepare("SELECT * FROM records");
        $query->execute();
        $recordsRegister = $query->fetchAll(PDO::FETCH_OBJ);
        return $recordsRegister;
    }

    public function getRegisterRecordsById2($id){
        $query = $this->db->prepare("SELECT * FROM records where `fk_records_id`=$id");
        $query->execute();
        $recordsRegister = $query->fetchAll(PDO::FETCH_OBJ);
        return $recordsRegister;
    }

    function insertRecords($records, $producer, $studio) {         
        $query = $this->db->prepare("INSERT INTO records (records,producer, studio) VALUES (?, ?, ?)");
        $query->execute([$records, $producer, $studio]);        
        return $this->db->lastInsertId();

        header("Location: " . BASE_URL. 'showRecords');
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