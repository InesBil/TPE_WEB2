<?php

class DiscographyModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tpeweb;charset=utf8', 'root', 'root');
       
    }

    /**
     * Devuelve la lista de tareas completa.
     */
    public function getAllDiscography() {
        // 1. abro conexión a la DB
        // ya esta abierta por el constructor de la clase

        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT * FROM Discographyale");
        $query->execute();

        // 3. obtengo los resultados
        $discography = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $discography;
    }

     /**
      * Inserta una tarea en la base de datos.
      */
     public function insertDiscography($type, $container, $stock, $price) {
        $query = $this->db->prepare("INSERT INTO beerSale (type, container, stock, price) VALUES (?, ?, ?, ?)");
         $query->execute([$id, $fk_id_name, $type, $container, $stock, $price]);
         
         return $this->db->lastInsertId();
     }


     /**
      * Elimina una tarea dado su id.
      */
     function deleteDiscographyById($id) {
        $query = $this->db->prepare('DELETE FROM beerSale WHERE id = ?');
         $query->execute([$id]);
     }

    public function finalize($id) {
        $query = $this->db->prepare('UPDATE task SET finalizada = 1 WHERE id = ?');
         $query->execute([$id]);
         // var_dump($query->errorInfo()); // y eliminar la redireccion
    }
}

