<?php
require_once './libs/smarty/libs/Smarty.class.php';

class RecordView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
    }

    function showRecords($records) {      
        $this->smarty->assign('records', $records);
        $this->smarty->display('recordsList.tpl');
    }

    function showEditRecords($records){
        $this->smarty->assign('records', $records); 
        $this->smarty->display('showEditRecords.tpl');
    }
}
