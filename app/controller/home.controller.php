<?php 

require 'app/views/home.view.php';

class homeController {
    private $view;

    public function __construct(){
        // authHelper::verify();
        $this->view = new homeView();
    }

    public function showHome(){
        // session_start();
        $this->view->show();
    }
}

