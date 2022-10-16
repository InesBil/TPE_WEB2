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
    
    public function showDetail($id){
        $detail = $this->modelRecord->getRegisterRecordsById($id);
        $this->view->showDetail($detail);

    }
    
    function addAlbum() {                
        $album = $_POST['album'];
        $year = $_POST['year'];
        $genre = $_POST['genre'];
        $length = $_POST['length'];
        $id_records_fk = $_POST['id_records_fk'];

        if ($_FILES['input_name']['type'] =="image/jpg" ||
            $_FILES['input_name']['type'] =="image/jpeg"||
            $_FILES['input_name']['type'] =="image/png" ){
            $this->model->addAlbum($album, $year, $genre, $length, $id_records_fk, $_FILES['input_name']['tmp_name']);
            }
        else{
            $id = $this->model->addAlbum($album, $year, $genre, $length, $id_records_fk);
            }

         header("Location: " . BASE_URL . 'showDiscography'); 
    } 
    function showEditAlbum($id){
        $album = $this->model->getRegisterAlbumById($id);
        $records = $this->modelAuthor->getRegisterAuthorById($id);
        $this->view->showEditAlbums($album, $records);
}


    function insertEditAlbum($id){
        if((isset($_POST['album'])&&isset($_POST['year']))&&isset($_POST['genre'])&&isset($_POST['length'])&&isset($_POST['studioOption'])&&!empty($_POST['album'])&&!empty($_POST['year'])&&!empty($_POST['genre'])&&!empty($_POST['length'])&&!empty($_POST['studioOption'])){      
            $album = $_POST['album'];
            $year = $_POST['year'];
            $genre = $_POST['genre'];
            $length = $_POST['length'];
            $fk_records_id = $_POST['studioOption'];
            $this->model->insertEditAlbum($album, $year, $genre, $length, $fk_records_id, $id);
        }
    }
    
    function deleteDiscography($id) {
        $this->model->deleteDiscographyById($id);
        header("Location: " . BASE_URL);
    }

    function finalizeTask($id) {
       $this->model->finalize($id);
    header("Location: " . BASE_URL); 
   }

    /*function deleteBooks($id) {
        $this->model->deleteBookById($id);
    }*/

    public function filterCategory($id){

    }



}