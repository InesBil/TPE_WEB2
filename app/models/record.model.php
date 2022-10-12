<?php

class RecordModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_discography;charset=utf8', 'root', '');
        
    }
}