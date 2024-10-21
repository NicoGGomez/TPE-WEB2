<?php 

require_once 'app/views/auth.view.php';
require_once 'app/models/auth.model.php';
require_once 'app/helper/auth.helper.php';

class authController {
    private $view;
    private $model;

    public function __construct() {
        $this->view = new authView();
        $this->model = new authModel();

    }

    public function showLogin(){
        $this->view->showLogin();
    }

    public function showLogout(){
        AuthHelper::logout();
        header('Location: ' . BASE_URL);  
    }

    public function auth(){

        $username = $_POST['usr'];
        $password = $_POST['con'];

        if (empty($username) || empty($password)) {
            $this->view->showLogin('Faltan completar datos');
            return;
        }

        // busco el usuario
        $user = $this->model->getByUser($username);
        
        if ($user && password_verify($password, $user->contraseña)) {
            // ACA LO AUTENTIQUE
            authHelper::login($user);
            header('Location: ' . BASE_URL);
        } else {
            $this->view->showLogin('Usuario inválido');
        }
    }

    // funcion de ejemplo

    // public function showAuth(){
    //     $this->view->show();
    // }

}