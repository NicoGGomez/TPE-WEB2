<?php 

class authView {
    
    public function ShowLogin($error=null){
        $mensaje = $error;
        require 'templates/login.phtml';
    }

    function showLogout(){
        echo 'hola estas en usuario';
    }

    // funcion de ejemplo

    // function show(){
    //     echo 'hola estas en usuario';
    // }

}