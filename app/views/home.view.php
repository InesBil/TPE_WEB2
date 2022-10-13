<?php
require_once './libs/smarty/libs/Smarty.class.php';

class HomeView{
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); //inicializo smarty
    }

    function showHome($albums) {
        //asigno variables al tpl smarty       
        $this->smarty->assign('albums', $albums);

        //mostrar el tpl
        $this->smarty->display('homeView.tpl');
    }
}