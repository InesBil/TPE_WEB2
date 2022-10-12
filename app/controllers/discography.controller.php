<?php
require_once './app/models/discography.model.php';
require_once './app/views/discography.view.php';

class DiscographyController {
    private $model;
    private $view;
    private $modelRecord;

    public function __construct() {
        $this->model = new DiscographyModel();
        $this->view = new DiscographyView();
        $this->modelRecord = new RecordModel();
    }

    public function showDiscography() {
        $albums = $this->model->getAllDiscography();
        $this->view->showDiscography($albums);
    }

    
    function addAlbum() {
         // TODO: validar entrada de datos

         $title = $_POST['title'];
         $description = $_POST['description'];
         $priority = $_POST['priority'];

         //$id = $this->model->insertTask($title, $description, $priority);

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