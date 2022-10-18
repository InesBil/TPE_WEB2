<?php
require_once './app/models/record.model.php';
require_once './app/views/record.view.php';
require_once './app/helpers/auth.helper.php';

class RecordController{
   private $model;
   private $view;   

   public function __construct(){
        $this->model = new RecordModel();
        $this->view = new RecordView();    
        if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
        } 
   
    }

    function showRecords(){  
             
        $records = $this->model->getAllRecords();        
        $this->view->showRecords($records);
    }

    function addRecords() {  
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
        $records = $_POST['records'];
        $producer = $_POST['producer'];
        $studio = $_POST['studio'];
        $this->model->insertRecords($records, $producer, $studio);
    
        header("Location: " . BASE_URL . 'showRecords'); 
    }

    function  showEditRecords($id){
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();   
        $records = $this->model->getRegisterById2($id);
        $this->view->showEditRecords($records);
    }
    
    function insertEditRecords($id){
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();  
        if((isset($_POST['records'])&&isset($_POST['producer'])&&isset($_POST['studio']))&&!empty($_POST['records'])&&!empty($_POST['producer'])&&!empty($_POST['studio'])){      
            $records = $_POST['records'];
            $producer = $_POST['producer'];
            $studio = $_POST['studio'];           
    
            $this->model->insertEditRecords($records, $producer, $studio, $id);

            header("Location: " . BASE_URL. 'showRecords');
        }
    }
    
    function deleteRecords($id) {
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();    
        $this->model->deleteRecordsById($id);
    }

}