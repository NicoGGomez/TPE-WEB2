<?php 

class productoView {

    function showProducto($prods){
        $productos = $prods;
        require 'templates/producto.phtml';
    }

    function showFormEdit(){
        require 'templates/producto.phtml';
    }

}