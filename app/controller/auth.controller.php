<?php 

require_once 'app/views/auth.view.php';
require_once 'app/models/auth.model.php';

class authController {
    private $view;
    // private $model;

    public function __construct() {
        $this->view = new authView();
    }

    public function showAuth(){
        $this->view->show();
    }

}