<?php
require_once './libs/smarty/libs/Smarty.class.php';

class DiscographyView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }
    function showDiscography($albums, $records) {
       // asigno variables al tpl smarty
        $this->smarty->assign('records', $records);  
        $this->smarty->assign('albums',$albums);
        $this->smarty->display('discographyView.tpl');
    }
    function showEditAlbum ($albums, $records){
        $this->smarty->assign('records', $records);
        $this->smarty->assign('albums', $albums);
        $this->smarty->display('showEditAlbums.tpl');
    }
    function showDetail($detail){
        $this->smarty->assign('detail', $detail);
        $this->smarty->display('showDetail.tpl');
    }

    function showFilter($filters, $name, $records){
        $this->smarty->assign('name', $name); 
        $this->smarty->assign('filters', $filters);
        $this->smarty->assign('records', $records);
        $this->smarty->display('filterView.tpl');
        
    }
} 