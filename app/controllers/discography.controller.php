<?php
require_once './app/models/discography.model.php';
require_once './app/views/discography.view.php';

class DiscographyController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new DiscographyModel();
        $this->view = new DiscographyView();
    }

    public function showDiscography() {
        $albums = $this->model->getAllDiscography();
        $this->view->showDiscography($albums);
    }

    
     /*function addDiscography() {
         // TODO: validar entrada de datos

         $title = $_POST['title'];
         $description = $_POST['description'];
         $priority = $_POST['priority'];

         $id = $this->model->insertTask($title, $description, $priority);

         header("Location: " . BASE_URL); 
     }*/
   
     function deleteDiscography($id) {
         $this->model->deleteDiscographyById($id);
         header("Location: " . BASE_URL);
     }

     function finalizeTask($id) {
        $this->model->finalize($id);
     header("Location: " . BASE_URL); 
    }

}