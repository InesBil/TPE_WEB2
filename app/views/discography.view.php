<?php
require_once './libs/smarty/libs/Smarty.class.php';

class DiscographyView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }
    function showDiscography($albums) {
       // asigno variables al tpl smarty
        $this->smarty->assign('count', count($albums)); 
        $this->smarty->assign('albums',$albums);

        // mostrar el tpl
        $this->smarty->display('discographyView.tpl');
    }
} 