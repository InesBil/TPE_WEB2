<?php

class HomeModel{
    private $db;

    public function  __construct(){
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_discography;charset=utf8' , 'root', '');
    }
    function getAllAlbumsHome(){
        $query = $this->db->prepare("SELECT albums.id, albums.album, albums.album, albums.year, albums.genre, albums.length, albums.img, records.fk_records_id, records.records FROM albums INNER JOIN records ON id_records_fk = records.fk_records_id");
        $query->execute();

        //3. Obtengo la respuesta con un fetchAll(porque)
        $albums = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos

        return $albums;
    }
}