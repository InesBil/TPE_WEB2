<?php
require_once './app/models/discography.model.php';
require_once './app/views/discography.view.php';

class DiscographyController {
    private $model;
    private $view;
    private $modelRecord; //para vincular los modelos de las dos tablas

    public function __construct() {
        $this->model = new DiscographyModel();
        $this->view = new DiscographyView();
        $this->modelRecord = new RecordModel();
    }

    public function showDiscography() {
        //obtiene las tareas del modelo
        $albums = $this->model->getAllDiscography();
        $modelRecord = $this->modelRecord->getAllRecords();
        //actualizo la vista
        $this->view->showDiscography($albums, $modelRecord);
    }
    
    function addAlbum() {
         // TODO: validar entrada de datos
         $album = $_POST['album'];
         $year = $_POST['year'];
         $genre = $_POST['genre'];
         $length = $_POST['length'];

         if ($_FILES['input_name']['type'] =="image/jpg" ||
            $_FILES['input_name']['type'] =="image/jpeg"||
            $_FILES['input_name']['type'] =="image/png" ){
            $this->model->insertAlbum($album, $year, $genre, $length, $_FILES['input_name']['tmp_name']);
            }
            else{
                $id = $this->model->insertAlbum($album, $year, $genre, $length);
            }

         header("Location: " . BASE_URL); 
    }
   
     function deleteDiscography($id) {
         $this->model->deleteDiscographyById($id);
         header("Location: " . BASE_URL);
     }

     function finalizeTask($id) {
        $this->model->finalize($id);
     header("Location: " . BASE_URL); 
    }

}