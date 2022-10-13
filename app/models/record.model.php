<?php

class RecordModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_discography;charset=utf8', 'root', '');
        
    }
    public function getAllRecords(){
        
        //1. Abro la conexion
        //$db = $this->connect();

        //2.Enviar la consulta(2 sub pasos: prepare y execte)
        $query = $this->db->prepare("SELECT * FROM records");
        $query->execute();

        //3. Obtengo la respuesta con un fetchAll(porque)
        $records = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos

        return $records;

    }
}