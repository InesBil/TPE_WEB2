<?php
require_once './app/models/record.model.php';
require_once './app/views/record.view.php';
//require_once './app/helpers/auth.helper.php';

class RecordController{
   private $model;
   private $view;

   public function __construct(){
    $this->model = new RecordModel();
    $this->view = new RecordView();    
    //$authHelper = new AuthHelper();
    //$authHelper->checkLoggedIn();
    }

    function showRecords(){        
        $records = $this->model->getAllRecords();        
        $this->view->showRecords($records);
    }

    function addRecords() {   
        $records = $_POST['records'];
        $producer = $_POST['producer'];
        $studio = $_POST['studio'];
        $this->model->insertRecords($records, $producer, $studio);
    
        header("Location: " . BASE_URL . 'showRecords'); 
    }

    function  showEditRecords($id){
        //$authHelper = new AuthHelper();
       // $authHelper->checkLoggedIn();
    
        $records = $this->model->getRegisterById2($id);
        $this->view->showEditRecords($records);
    }
    
    function insertEditRecords($id){
        //$authHelper = new AuthHelper();
        //$authHelper->checkLoggedIn();
    
        if((isset($_POST['records'])&&isset($_POST['producer'])&&isset($_POST['studio'])&&isset($_POST['img']))&&!empty($_POST['records'])&&!empty($_POST['producer'])&&!empty($_POST['studio'])&&!empty($_POST['img'])){      
            $records = $_POST['records'];
            $producer = $_POST['producer'];
            $studio = $_POST['studio'];            
            $img = $_POST['img'];
    
            $this->model->insertEditRecords($records, $producer, $studio, $img, $id);
            header("Location: " . BASE_URL. 'showRecords');
        }
    }

    // function  showEditRecords($id){
    //     $records = $this->model->getRegisterById2($id);
    //     $this->view->showEditRecords($records);
    // }

    // function insertEditRecords($id){
    //     if((isset($_POST['records'])&&isset($_POST['producer'])&&isset($_POST['studio']))&&!empty($_POST['records'])&&!empty($_POST['producer'])&&!empty($_POST['studio'])){      
    //         $records = $_POST['records'];
    //         $producer = $_POST['producer'];
    //         $studio = $_POST['studio'];
               
    //         $this->model->insertEditRecords($records, $producer, $studio, $id);
            
    //     }
    // }
    
    function deleteRecords($id) {
        $this->model->deleteRecordsById($id);
    }

}