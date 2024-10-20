<?php
// funcion extra de login, no cuenta como controller ni model
class authHelper {
    
    public static function init() {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function login($user) {
        authHelper::init();
        $_SESSION['usuario'] = $user->id_usuario;
    }

    public static function logout() {
        AuthHelper::init();
        session_destroy();
    }


    public static function verify() {
        authHelper::init();
        if (!isset($_SESSION['usuario'])) {
            header('Location: ' . BASE_URL . 'login');
            die();
        }
    }

}