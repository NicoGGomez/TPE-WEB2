<?php
// funcion extra de login, no cuenta como controller ni model
class authHelper {
    
    public static function init() {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public static function login($user) {
        authHelper::init();
        $_SESSION['USER_ID'] = $user->id_user;
        $_SESSION['USER_USERNAME'] = $user->username; 
    }

    public static function logout() {
        AuthHelper::init();
        session_destroy();
    }

    public static function verify() {
        authHelper::init();
        if (!isset($_SESSION['USER_ID'])) {
            header('Location: ' . BASE_URL . 'login');
            die();
        }
    }

}