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

}