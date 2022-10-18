<?php
require_once './app/models/discography.model.php';
require_once './app/views/discography.view.php';
require_once './app/models/record.model.php';
require_once './app/helpers/auth.helper.php';

class DiscographyController {
    private $model;
    private $view;
    private $modelRecord;
    

    public function __construct() {
        $this->model = new DiscographyModel();
        $this->view = new DiscographyView();
        $this->modelRecord = new RecordModel();
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }       
    }

    public function showDiscography() {
        
        $albums = $this->model->getAllDiscography();
        $modelRecord = $this->modelRecord->getAllRecords();        
        $this->view->showDiscography($albums, $modelRecord);
    }
    
    public function showDetail($id){
        
        $detail = $this->modelRecord->getRegisterById2($id);
        $this->view->showDetail($detail);

    }

    function addAlbum() {
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
        
        // if ((isset($_POST['album'])&&isset($_POST['year'])&&isset($_POST['genre'])&&isset($_POST['length'])&&isset($_POST['id_records_fk']))&&!empty($_POST['album'])&&!empty($_POST['year'])&&!empty($_POST['genre'])&&!empty($_POST['length'])&&!empty($_POST['id_records_fk'])){
            $album = $_POST['album'];
            $year = $_POST['year'];
            $genre = $_POST['genre'];
            $length = $_POST['length'];
            $studioOption = $_POST['id_records_fk'];
            if ($_FILES['input_name']['type'] =="image/jpg" ||
                $_FILES['input_name']['type'] =="image/jpeg"||
                $_FILES['input_name']['type'] =="image/png" ){
                    $this->model->insertAlbum($album, $year, $genre, $length, $studioOption, $_FILES['input_name']['tmp_name']);
            }
            else{
                $this->model->insertAlbum($album, $year, $genre, $length, $studioOption);
            }
        //}
        header("Location: " . BASE_URL);

    }

    function  showEditAlbum($id){
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();     
        $album = $this->model->getRegisterById($id);
        $records = $this->modelRecord->getRegisterById($id);
        $this->view->showEditAlbum($album, $records);
    }

    function insertEditAlbum($id){
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
        if((isset($_POST['album'])&&isset($_POST['year'])&&isset($_POST['genre'])&&isset($_POST['length'])&&isset($_POST['id_records_fk']))&&!empty($_POST['album'])&&!empty($_POST['year'])&&!empty($_POST['genre'])&&!empty($_POST['length'])&&!empty($_POST['id_records_fk'])){      
            $album = $_POST['album'];
            $studioOption = $_POST['id_records_fk'];
            $year = $_POST['year'];
            $genre = $_POST['genre'];
            $length = $_POST['length'];
               
            $this->model->insertEditAlbum($album, $year, $genre, $length,$studioOption,$id);
            header("Location: " . BASE_URL );
        }
    }
    
    function deleteDiscography($id) {
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
        
        $this->model->deleteDiscographyById($id);            
    }

    public function filterCategory($id){
        
        $name = $this->modelRecord->getNameById($id);
        $filters = $this->model->getFilter($id);
        $records = $this->modelRecord->getAllRecords();
        $this->view->showFilter($filters, $name, $records);

    }



}