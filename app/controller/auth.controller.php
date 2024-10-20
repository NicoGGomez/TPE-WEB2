<?php 

require_once 'app/views/auth.view.php';
require_once 'app/models/auth.model.php';
require_once 'app/helper/auth.helper.php';

class authController {
    private $view;
    private $model;

    public function __construct() {
        $this->view = new authView();
    }

    public function showLogin(){
        $this->view->showLogin();
    }

    public function showLogout(){
        AuthHelper::logout();
        header('Location: ' . BASE_URL);  
    }

    public function auth(){

        if (empty($user) || empty($password)) {
            $this->view->showLogin('Faltan completar datos');
            return;
        }

        $user = $_POST['usuario'];
        $password = $_POST['contraseña'];

        // busco el usuario
        $usuario = $this->model->getByUser($user);
        
        if ($usuario && password_verify($password, $usuario->password)) {
            // ACA LO AUTENTIQUE
            
            authHelper::login($usuario); 
            
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