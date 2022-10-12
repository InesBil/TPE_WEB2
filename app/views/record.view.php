<?php
require_once './libs/smarty/libs/Smarty.class.php';

class RecordView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }
}