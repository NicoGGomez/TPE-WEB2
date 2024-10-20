<?php 

class productoView {

    function showProducto($prods){
        $productos = $prods;
        require 'templates/producto.phtml';
    }

    function showFormEdit($prods){
        $productos = $prods;
        require 'templates/formEdit.phtml';
    }

    function showError($error){
        $errores = $error;
        require_once "templates/errores.phtml";
    }

    function showDetails($prods){
        $productos = $prods;
        require 'templates/detalle.phtml';
    }

}