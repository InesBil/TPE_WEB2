<?php
require_once './app/models/discography.model.php';
require_once './app/views/discography.view.php';
require_once './app/helpers/auth.helper.php';

class DiscographyController {
    private $model;
    private $view;
    private $modelRecord;

    public function __construct() {
        $this->model = new DiscographyModel();
        $this->view = new DiscographyView();
        $this->modelRecord = new RecordModel();
        //$authHelper = new AuthHelper();
       // $authHelper->checkLoggedIn();
    }

    public function showDiscography() {
        
        $albums = $this->model->getAllDiscography();
        $modelRecord = $this->modelRecord->getAllRecords();        
        $this->view->showDiscography($albums, $modelRecord);
    }
    
    public function showDetail($id){
        $detail = $this->modelRecord->getRegisterRecordsById2($id);
        $this->view->showDetail($detail);

    }
    
    function addAlbum() {
        if((isset($_POST['album'])&&isset($_POST['year'])&&isset($_POST['genre'])&&isset($_POST['length'])&&isset($_POST['id_records_fk']))&&!empty($_POST['album'])&&!empty($_POST['year'])&&!empty($_POST['genre'])&&!empty($_POST['length'])&&!empty($_POST['id_records_fk'])){
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

    public function filterCategory($id){
        $name = $this->modelRecord->getNameById($id);
        $filters = $this->model->getFilter($id);
        $records = $this->modelRecord->getAllRecords();
        $this->view->showFilter($filters, $name, $records);

    }



}