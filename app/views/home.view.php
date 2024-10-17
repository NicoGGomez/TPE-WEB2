<?php

use Smarty\Smarty;

require_once '../../libs/smarty/libs/Smarty.class.php';

class homeView {
    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
    }

    function showHome(){
        $this->smarty->assign('home');
        $this->smarty->display('../../templates/home.tpl');
    }

}